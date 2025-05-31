<?php

namespace App\Http\Controllers\admin;

use Illuminate\Database\Eloquent\Model;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskComplate;
use App\Mail\TaskassigneEmail;
use Illuminate\Support\Facades\Log; // Make sure this is at the top
class TaskController extends Controller
{
   

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date|after_or_equal:start_date',
            'start_date' => 'required|date',
            'project_id' => 'required|integer|exists:projects,id',
            'assigned_to' => 'required|integer|exists:users,id',
        ]);
        $task = new Task();
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->start_date = $request->input('start_date');
        $task->project_id = $request->input('project_id');
        $task->status = 1;
        $task->assigned_to = $request->input('assigned_to');
        $task->created_by = Auth::id();
        $task->save();
        $task->load(['project', 'creator']);
        $assignedUser = User::find($request->input('assigned_to'));
        if ($assignedUser && $assignedUser->email) {
            $subject = "New Task Assigned: " . $task->title;
            Mail::to($assignedUser->email)->send(new TaskassigneEmail($task, $subject));
        }
        return redirect()->route('task.index')->with('success', 'Successfully created a Task');
    }



    //  public function status(Request $request, $id)
    // {
    //     $request->validate([
    //         'status' => 'required|in:1,2,3,4',
    //     ]);

    //     $task = Task::findOrFail($id);
    //     $task->status = $request->input('status');
    //     $task->save();
    //     if ($request->ajax()) {

    //         if (Auth::user()->role_id == 2) {
                
    //             $user = Auth::user();

    //             $subject = "Complate Task";
    //             Mail::to($user->email)->send(new TaskComplate($task, $subject));
    //         }

    //         return response()->json(['success' => true, 'message' => 'Task status updated successfully.']);

    //     }
    //     return redirect()->back()->with('success', 'Task status updated successfully.');
    // }
    
 public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Access Denied: Please log in.');
        }
        $user = Auth::user();
        $statues = TaskStatus::all();
        if ($user->role_id == 2) {
            $taskes = Task::with(['project', 'assignedTo', 'creator', 'status'])
                ->where('assigned_to', $user->id)
                ->get();
        } else {
            $taskes = Task::with(['project', 'assignedTo', 'creator', 'status'])->get();
        }
        return view('admin.task.index', compact('taskes', 'statues'));
    }
    public function create()
    {
        if (Auth::user()->role_id === 1) {
            $projects = Project::where('status', 2)->get();
            $status = TaskStatus::all();
            $users = User::where('role_id', 2)->get();
            $created_by = Auth::user();
            return view('admin.task.create', compact('projects', 'users', 'created_by', 'status'));
        }
        return redirect()->route('task.index')->with('error', 'Access Denied: Employees cannot create Task');
    }
    public function edit($encodedId)
    {
        $id = Crypt::decrypt($encodedId);
        $task = Task::findOrFail($id);
        $projects = Project::all();
        $users = User::where('role_id', 2)->get();
        $creators = User::where('role_id', 1)->get();
        return view('admin.task.edit', compact('task', 'projects', 'users', 'creators'));
    }
    public function update(Request $request, $encodedId)
    {
        $id = Crypt::decrypt($encodedId);
        $task = Task::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'start_date' => 'required',
            'project_id' => 'required|integer',
            'assigned_to' => 'required|integer'
        ]);
        $task->title = $request->input('title');
        $task->description = $request->input('description');
        $task->due_date = $request->input('due_date');
        $task->start_date = $request->input('start_date');
        $task->project_id = $request->input('project_id');
        $task->assigned_to = $request->input('assigned_to');
        $task->save();
        return redirect()->route('task.index')->with('success', 'Task updated successfully.');
    }
    public function delete($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->route('task.index')->with('success', 'Task Deleted Successfully!');
    }
   
    public function show($encodedId)
    {
        $id = Crypt::decrypt($encodedId);
        $task = Task::with(['project', 'assignedTo', 'creator', 'status'])->findOrFail($id);
        return view('admin.task._view_modal', compact('task'));
    }

//  public function status(Request $request, $id)
// {
//     $request->validate([
//         'status' => 'required|in:1,2,3,4',
//     ]);

//     $task = Task::with('creator')->findOrFail($id);
//     $previousStatus = $task->status;
//     $newStatus = $request->input('status');

//     $task->status = $newStatus;
//     $task->save();

//     if ($previousStatus != 4 && $newStatus == 4) {
//         $user = $task->creator; 
//         if ($user && $user->email) {
//             $subject = "Task Complete";
//             Mail::to($user->email)->send(new TaskComplate($task, $subject));
//         }
//     }

//     if ($request->ajax()) {
//         return response()->json(['success' => true, 'message' => 'Task status updated successfully.']);
//     }

//     return redirect()->back()->with('success', 'Task status updated successfully.');
// }




public function status(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:1,2,3,4',
    ]);

    $task = Task::with('creator')->findOrFail($id);
    $previousStatus = $task->status;
    $newStatus = $request->input('status');

    $task->status = $newStatus;
    $task->save();

    // Log the status update
    Log::info("Task ID {$task->id} status updated from {$previousStatus} to {$newStatus} by User ID " . auth()->id());

    // Only send email when status changes to 4 (completed)
    if ($previousStatus != 4 && $newStatus == 4) {
        $user = $task->creator; // Assuming 'creator' relationship
        if ($user && $user->email) {
            $subject = "Task Complete";
            Mail::to($user->email)->send(new TaskComplate($task, $subject));

            // Log the email sending
            Log::info("Task completion email sent to {$user->email} for Task ID {$task->id}");
        }
    }

    if ($request->ajax()) {
        return response()->json(['success' => true, 'message' => 'Task status updated successfully.']);
    }

    return redirect()->back()->with('success', 'Task status updated successfully.');
}

    
}
