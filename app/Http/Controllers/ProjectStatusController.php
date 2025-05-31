<?php

namespace App\Http\Controllers;
use App\Models\ProjectStatus;
use Illuminate\Http\Request;

class ProjectStatusController extends Controller
{
    public function Index()
    {
        $project_status = ProjectStatus::all();
        return view('admin.project.project-status', compact('project_status'));
    }
    public function create()
    {
        return view('admin.project.project-status-create');
    }
    public function store(Request $request)
    {
        $request->validate(['name' => 'required',]);
        $status = new ProjectStatus();
        $status->name = $request->input('name');
        $status->save();
        return redirect()->route('project-status.index')->with('success', 'Project status created successfully.');
    }
    public function edit($id)
    {
        $status = ProjectStatus::findOrFail($id);
        return view('admin.project.project-status-edit', compact('status'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $status = ProjectStatus::findOrFail($id);
        $status->name = $request->name;
        $status->save();
        return redirect()->route('project-status.index')->with('success', 'Project status Update successfully.');
    }
    public function destroy($id)
    {
        $status = ProjectStatus::findOrFail($id);
        $status->delete();
        return redirect()->route('project-status.index')->with('warning', 'Project status deleted successfully.');
    }

}
