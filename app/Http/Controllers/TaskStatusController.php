<?php

namespace App\Http\Controllers;
use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
  public function index()
  {
    $status = TaskStatus::all();
    return view('admin.task.task-status-index', compact('status'));
  }
  public function create()
  {
    return view('admin.task.task-status-create');
  }
  public function store(Request $request)
  {
    $request->validate(['name' => 'required']);
    $status = new TaskStatus();
    $status->name = $request->input('name');
    // dd($status->toArray());
    $status->save();
    return redirect()->route('task-status.index')->with('success', 'Successfull create a Task Status');
  }
  public function edit($id)
  {
    $status = TaskStatus::findOrFail($id);
    return view('admin.task.task-status-edit', compact('status'));
  }
  public function update(Request $request, $id)
  {
    $request->validate(['name' => 'required']);
    $status = TaskStatus::findOrFail($id);
    $status->name = $request->name;
    $status->save();
    return redirect()->route('task-status.index', compact('status'))->with('success', 'Update task status Seccusfully');
  }
  public function destroy($id)
  {
    $status = TaskStatus::findOrFail($id);
    $status->delete();
    return redirect()->route('task-status.index')->with('warning', 'Delete Task Status Successfully');
  }
}
