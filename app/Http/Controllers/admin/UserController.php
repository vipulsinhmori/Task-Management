<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->role_id == 2) {
                $users = collect([$user]);
            } else {
                $users = User::all();
            }
            return view('admin.user.index', compact('users'));
        }
        return redirect()->route('login');
    }

    public function create()
    {
        if (Auth::user()->role_id === 1) {
            $users = Role::all();
            return view('admin.user.create', compact('users'));
        }
        return redirect()->route('user.index')->with('error', 'Access Denied: Employees cannot create User');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'address' => 'required',
            'number' => 'required',
            'image' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'language' => 'required'

        ]);
        $image = $request->file('image');
        $img_name = time() . '_' . rand(100000, 999999) . '_' . $request->image->getClientOriginalName();
        $image->move('user/', $img_name);
        $img_name = "user/" . $img_name;

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role_id = $request->input('role_id');
        $user->address = $request->input('address');
        $user->number = $request->input('number');
        $user->state = $request->input('state');
        $user->zipcode = $request->input('zipcode');
        $user->country = $request->input('country');
        $user->language = $request->input('language');
        $user->status = 1;
        $user->image = isset($img_name) ? $img_name : null;
        $user->password = bcrypt($request->input('password'));
        // dd($user->toArray());
        $user->save();
        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }
    public function edit($encodedId)
    {
        $id = Crypt::decrypt($encodedId);
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }
    public function update(Request $request, $encodedId)
    {
        $id = Crypt::decrypt($encodedId);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        $user = User::findOrFail($id);
        $image = $request->file('image');
        if ($image) {
            if ($user->image && file_exists($user->image)) {
                unlink($user->image);
            }
            $img_name = time() . '_' . rand(100000, 999999) . '_' . $request->image->getClientOriginalName();
            $image->move('user/', $img_name);
            $img_name = "user/" . $img_name;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        $user->language = $request->language;

        $user->image = isset($img_name) ? $img_name : $user->image;
        $user->save();
        return redirect()->route('user.index')->with('success', 'User Updated Successfully');
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User Deleted Successfully!');
    }

    public function status(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1',
        ]);
        $user = User::findOrFail($id);
        if ($user) {
            $user->status = $request->input('status');
            $user->save();
            if ($request->ajax()) {
                return response()->json(['success' => true, 'message' => 'User Status Updated Successfully.']);
            }
            return redirect()->back()->with('success', 'User Status Updated Successfully.');
        }
        return response()->json(['success' => false, 'message' => 'User not found.'], 404);
    }


    public function profile_edit($encodedId)
    {
        $id = Crypt::decrypt($encodedId);
        $user = User::findOrFail($id);
        return view('admin.auth.profile', compact('user'));
    }
    public function Profile_update(Request $request, $encodedId)
    {
        $id = Crypt::decrypt($encodedId);
        $request->validate([
            'name' => 'required|string',
            'email' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg',
        ]);
        $user = User::findOrFail($id);
        $image = $request->file('image');
        if ($image) {
            if ($user->image && file_exists($user->image)) {
                unlink($user->image);
            }
            $img_name = time() . '_' . rand(100000, 999999) . '_' . $request->image->getClientOriginalName();
            $image->move('user/', $img_name);
            $img_name = "user/" . $img_name;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->image = isset($img_name) ? $img_name : $user->image;
        $user->save();
        return redirect()->route('dashboard/profile')->with('success', 'Updated  Successfully');
    }

   public function trashed()
{
    $deletedUsers = User::onlyTrashed()->get();
    return view('admin.user.trashed', compact('deletedUsers'));
}

public function restore($id)
{
    $user = User::withTrashed()->findOrFail($id);
    $user->restore();

    return redirect()->route('user.index')->with('success', 'User restored successfully!');
}

public function permanentDelete($id)
{
    $user = User::withTrashed()->findOrFail($id);

    if ($user->image && file_exists(public_path($user->image))) {
        unlink(public_path($user->image)); 
    }

    $user->delete();
    return redirect()->route('user.index')->with('success', 'User permanently deleted successfully!');
}


}
