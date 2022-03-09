<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function loginForm()
    {
        return view('adminLogin.login');
    }

    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect('/hotel');
        } else {
            return back()->with('error', 'invalid email ');;
        }
    }

    public function index()
    {
        $admins = admin::get();
        return view('dashboard.admin.index', ['admins' => $admins]);
    }

    public function create()
    {
        return view('dashboard.admin.create');
    }

    public function store(Request $request)
    {
        //validation
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|min:3|max:50',
            'password' => 'required|min:6',
            'national_id' => 'required|max:14',
            'avatar_img' => 'required|image|mimes:jpeg,png',
        ]);

        $img = $request->file('avatar_img');
        $ext = $img->getClientOriginalExtension();
        $image = "admin -" . uniqid() . ".$ext";
        $img->move(public_path("uploads/admin/"), $image);
        admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'national_id' => $request->national_id,
            'avatar_img' => $image,
        ]);

        return redirect(route('admin.index'));
    }

    public function show($id)
    {
        $admin = admin::findOrFail($id);
        return view('dashboard.admin.show', compact('admin'));
    }

    public function edit($id)
    {
        $admin = admin::findOrFail($id);
        return view('dashboard.admin.edit', compact('admin'));
    }

    public function update(Request $request, $id)
    {

        //validation
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|min:3|max:50',
            'password' => 'required|min:6',
            'avatar_img' => 'image|mimes:jpeg,png',
        ]);
        
        $admin = admin::findOrFail($id);
        $name = $admin->avatar_img;
        if ($request->hasFile('avatar_img')) {
            if ($name !== null) {
                unlink(public_path('uploads/admin/' . $name));
            }
            $img = $request->file('avatar_img');
            $ext = $img->getClientOriginalExtension();
            $name = "admin -" . uniqid() . ".$ext";
            $img->move(public_path("uploads/admin/"), $name);
        }

        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'national_id' => $admin->national_id,
            'avatar_img' => $name,
        ]);

        return redirect(route('admin.index', $id));
    }

    public function destroy($id)
    {
        $admin = admin::findOrFail($id);
        $admin->delete();
        $img_name = $admin->img;
        if ($img_name !== null) {
            unlink(public_path('uploads/admin/' . $img_name));
        }
        return redirect(route('admin.index'));
    }

    public function logout(Request $request)
    {

        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
