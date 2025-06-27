<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        return view('admin.module.index');
    }

    public function project()
    {
        return view('admin.module.project');
    }

    public function employee()
    {
        $users = User::all();
        return view('admin.module.employee', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.module.show', compact('user'));
    }
   
}





