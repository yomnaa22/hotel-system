<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientRequest;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Rinvex\Country\CountryLoader;


class ClientController extends Controller
{

    public function loginForm()
    {
        return view('clientLogin.login');
    }

    public function Login(Request $request)
    {
        $check = $request->all();
        if (Auth::guard('client')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            $id = Auth::guard('client')->user()->id;
            return redirect('/hotel')->with('error', 'client login sucess');
        } else {
            return back()->with('error', 'invalid email ');;
        }
    }

    public function home()
    {
        if (Auth::check() && Auth::client()->force_logout) {
            Auth::client()->force_logout = 0;
            Auth::client()->save();
            Auth::logout();
            return view("welcome");
        }
    }

    public function logout(Request $request){
        Auth::guard('client')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function forcelogout()
    {
        request()->validate(["id" => 'required|exists:client,id']);
        client::where("id", "=", request()->id)->update(["force_logout" => 1]);
        return view('clientLogin .login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $clients =  DB::table('clients')
            ->where('status', '=', 'pending')
            ->get();
        return view('dashboard.client.index', ['clients' => $clients]);
    }

    public function approve()
    {
        $clients =  DB::table('clients')
            ->where('status', '=', 'approved')
            ->get();
        return view('dashboard.client.approve', ['clients' => $clients]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUnapproved()
    {
        $clients = client::where('status', 'pending')->get();
        return view('dashboard.client.manageClients', ['clients' => $clients]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function reject($id)
    {
        $client = client::find($id);
        $client->status = 'rejected';
        $client->save();
        $clients = client::all();
        return redirect()->route('client.manage', ['clients' => $clients]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = [];
        $all = CountryLoader::countries();

        foreach ($all as $cou) {
            $values = array_values($cou);
            array_push($countries, $values[0]);
            continue;
        }

        return view('dashboard.client.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request)
    {
        // Log::info($request->name);
        $validated = $request->validated();
        $client = new client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->mobile = $request->mobile;
        $client->password = Hash::make($request->password);
        $client->country = $request->country;
        $client->gender = $request->gender;

        $img = $request->file('avatar_img');
        $ext = $img->getClientOriginalExtension();
        $image = "client-" . uniqid() . ".$ext";
        $img->move(public_path("uploads/clients/"), $image);

        $client->avatar_img = $image;

        $client->save();

        return redirect()->route('client.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = client::find($id);
        return view('dashboard.client.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = client::find($id);
        $client->status = 'approved';
        $client->save();
        return redirect()->route('client.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClientRequest $request, $id)
    {
        $validated = $request->validated();

        $client = client::find($id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->mobile = $request->mobile;
        $client->password = Hash::make($request->password);

        $name = $client->img;
        if ($request->hasFile('img')) {
            if ($name !== null) {
                unlink(public_path('uploads/clients/' . $name));
            }
            //move
            $img = $request->file('img');
            $ext = $img->getClientOriginalExtension();
            $name = "client-" . uniqid() . ".$ext";
            $img->move(public_path("uploads/clients"), $name);
        }

        $client->avatar_img = $name;

        $client->save();
        return redirect()->route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = client::find($id);
        if ($client) {
            $client->delete();
            $img_name = $client->img;
            if ($img_name !== null) {
                unlink(public_path('uploads/clients/' . $img_name));
            }
        }
        return redirect()->route('client.index');
    }
}
