<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class AuthenticationController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
         
            return redirect()->route('dashboard/index' );
        }
        return view('admin.Auth.login');
    }
    public function registe()
    {
        return view('admin.Auth.register');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();
        return redirect('/')->with('success', 'User created successfully!');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->status === 1) {
                return redirect()->intended('dashboard/index')
                    ->withSuccess(['success' => 'You have successfully logged in']);
            } else {
                Auth::logout();
                return redirect()->back()->withErrors(['access' => 'Your Acount is Inctive']);
            }
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
    public function dashboard()
    {
           $users =  User::all();
        return view('index',compact('users'));
    }
    public function logout()
    {
        if (!Auth::check() && !Auth::logout()) {

            return redirect()->route('dashboard/index');
        } else {
            Auth::logout();
            return Redirect('/');
        }
    }
    public function profile()
    {
        $user = auth()->user();
        return view('admin.auth.profile', compact('user'));
    }
    public function edit()
    {
        $user = Auth::user();
        return view('admin.auth.profile', compact('user'));
    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'address' => 'nullable|string|max:255',
            'number' => 'nullable|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:800',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'language' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($user->image && file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }

            $img_name = time() . '_' . rand(100000, 999999) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('user'), $img_name);
            $user->image = 'user/' . $img_name;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->number = $request->number;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        $user->language = $request->language;
        $user->save();
        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
    public function reset_password()
    {
        return view('admin.auth.reset_password');
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);
        $user = Auth::user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
        $user->password = Hash::make($request->new_password);
        $user->save();
        return redirect()->route('dashboard/index')->with('status', 'Password reset successfully.');
    }
}


