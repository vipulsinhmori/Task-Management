<?php
namespace App\Http\Controllers\admin;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\User;
use App\Models\Meta;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProjectController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 3) {
            $statuses = ProjectStatus::all();
            $meta = Meta::where('page_name', 'Project')->get();
            $projects = Project::with('creator')->get();
            
            return view('admin.project.index', compact('projects', 'statuses',  'meta'));
        }
        return redirect()->route('dashboard/index')->with('error', 'Access Denied');
    }
    public function create()
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 3 ) {
            $admin = Auth::user();
            return view('admin.project.create', compact('admin'));
        }
        return redirect()->route('project.index')->with('error', 'Access Denied: Employees cannot create projects');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required'
        ]);
        $project = new Project();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->created_by = Auth::id();
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->status = 1;
        $project->save();
        return redirect()->route('project.index')->with('success', 'project secessfully created');
    }
    public function edit($encodedId)
    {
        if (Auth::user()->role_id === 1 || Auth::user()->role_id === 3) {
            $id = Crypt::decrypt($encodedId);
            $project = Project::findOrFail($id);
            $created_by = User::whereIn('role_id', [1,3])->get();
            return view('admin.project.edit', compact('project', 'created_by'));
        }
    }
    public function update(Request $request, $encodedId)
    {
        $id = Crypt::decrypt($encodedId);

        $request->validate([
            'name' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required'
        ]);
        $user = Project::findOrFail($id);
        $user->name = $request->name;
        $user->start_date = $request->start_date;
        $user->end_date = $request->end_date;
        $user->description = $request->description;
        $user->save();
        return redirect()->route('project.index')->with('success', 'Project Updated Successfully');
    }
    public function delete($id)
    {
        $user = Project::findOrFail($id);
        $user->delete();
        return redirect()->route('project.index')->with('success', 'Project Deleted Successfully!');
    }
    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:1,2,3,4',
        ]);
        $project = Project::findOrFail($id);
        $project->status = $request->input('status');
        $project->save();
        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Project status updated successfully.']);
        }
        return redirect()->back()->with('success', 'Project status updated successfully.');
    }
}
