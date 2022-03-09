<?php

namespace App\Http\Controllers;

use App\Models\floor;
use App\Models\manager;
use App\Models\room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms = room::with('floor')->get();

        return view('dashboard.room.index', ['rooms' => $rooms]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAvail()
    {
        $rooms = room::where('status', false)->get();
        // $rooms=room::with('floor')->get();
        return view('dashboard.room.showAvail', ['rooms' => $rooms]);
    }

    public function indexAdmin()
    {
        $rooms = room::with('floor')->get();
        return view('dashboard.room.index', ['rooms' => $rooms]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers = manager::get(['id', 'name']);
        $floors = floor::get(['id', 'number']);
        return view('dashboard.room.create', ['managers' => $managers, 'floors' => $floors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //validation
        $request->validate([
            'name' => 'required|string|min:3|max:50',
            'number' => 'unique:rooms|numeric|min:1000',
            'capacity' => 'numeric',
            'price' => 'required|numeric'
        ]);

        room::create([
            'name' => $request->name,
            'number' => $request->number,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'manager_id' => $request->manager,
            'floor_id' => $request->floor,

        ]);

        return redirect(route('room.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = room::findOrFail($id);
        $managers = manager::get(['id', 'name']);
        $floors = floor::get(['id', 'number']);
        return view('dashboard.room.edit', compact('room', 'managers', 'floors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'capacity' => 'numeric',
            'price' => 'required|numeric'

        ]);
        //$request->validated();
        $room = room::findOrFail($id);
        $manager = Auth::guard('manager')->user()->id;
        $room->update([
            'name' => $room->name,
            'number' => $room->number,
            'capacity' => $request->capacity,
            'price' => $request->price,
            'status' => $request->status,
            'manager_id' => $manager,
            'floor_id' => $room->floor_id,
        ]);
        // var_dump($request->status);
        return redirect(route('room.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = room::findOrFail($id);
        if ($room->status == 0) {
            $room->delete();
            return redirect()->route('room.index');
        }
    }
}
