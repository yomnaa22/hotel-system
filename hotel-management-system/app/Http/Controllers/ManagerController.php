<?php

namespace App\Http\Controllers;

use App\Models\manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{

    public function loginForm()
    {
        return view('managerLogin.login');
    }
    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('manager')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect('/hotel');
        } else {
            return back()->with('error', 'invalid email ');;
        }
    }

    public function logout(Request $request)
    {

        Auth::guard('manager')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
   
    }

    public function index()
    {
        $managers = manager::get();
        return view('dashboard.manager.index', ['managers' => $managers]);
    }



    public function create()
    {
        return view('dashboard.manager.create');
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
        $image = "man -" . uniqid() . ".$ext";
        $img->move(public_path("uploads/manager/"), $image);

        manager::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'national_id' => $request->national_id,
            'avatar_img' => $image,
        ]);

        return redirect()->route('manager.index');
    }


    public function show($id)
    {
        $manager = manager::findOrFail($id);
        return view('dashboard.manager.show', compact('manager'));
    }

    public function edit($id)
    {
        $manager = manager::findOrFail($id);
        return view('dashboard.manager.edit', compact('manager'));
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

        $manager = manager::findOrFail($id);

        $name = $manager->avatar_img;
        if ($request->hasFile('avatar_img')) {
            if ($name !== null) {
                unlink(public_path('uploads/manager/' . $name));
            }
            $img = $request->file('avatar_img');
            $ext = $img->getClientOriginalExtension();
            $name = "man -" . uniqid() . ".$ext";
            $img->move(public_path("uploads/manager/"), $name);
        }

        $manager->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'national_id' => $manager->national_id,
            'avatar_img' => $name,
        ]);

        return redirect()->route('manager.index', $id);
    }


    public function destroy($id)
    {
        $manager = manager::findOrFail($id);
        $manager->delete();
        $img_name = $manager->img;
        if ($img_name !== null) {
            unlink(public_path('uploads/manager/' . $img_name));
        }
        return redirect()->route('manager.index');
    }
}
