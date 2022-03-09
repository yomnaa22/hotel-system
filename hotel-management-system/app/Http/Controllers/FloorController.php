<?php

namespace App\Http\Controllers;


use App\Models\floor;
use App\Models\manager;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class floorController extends Controller
{

    public function index()
    {
        $floors = floor::get();
        return view('dashboard.floor.index', ['floors' => $floors]);
    }

    public function create()
    {
        $floors = floor::get();
        $manager = manager::all();
        return view('dashboard.floor.create', compact('floors', 'manager'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'manager_id' => 'required|max:50',
            'number' => 'required',
        ]);

        floor::create([
            'name' => $request->name,
            'number' => $request->number,
            'manager_id' => $request->manager_id,

        ]);
        return redirect()->route('dashboard.floor.index');
    }

    public function destroy($id)
    {
        $floor = floor::find($id);
        if ($floor) {
            $floor->delete();
        }
        return redirect()->route('dashboard.floor.index');
    }

    public function show($id)
    {
        $floor = floor::findOrFail($id);
        return view('dashboard.floor.show', compact('floor'));
    }

    public function edit($id)
    {
        $floor = floor::find($id);
        $manager = manager::all();
        return view('dashboard.floor.edit', compact('floor', 'manager'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:50',
        ]);

        $floor = floor::find($id);
        $manager = Auth::guard('manager')->user()->id;
        $floor->update([
            'name' => $request->name,
            'number' => $floor->number,
            'manager_id' => $manager,
        ]);

        return redirect(route('dashboard.floor.index', $id));
    }
    
}
