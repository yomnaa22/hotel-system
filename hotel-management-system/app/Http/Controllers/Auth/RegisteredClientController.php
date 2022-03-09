<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\client;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Rinvex\Country\CountryLoader;

class RegisteredClientController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
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
        return view('clientLogin.register', ['countries' => $countries]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'mobile' => ['string'],
            'country' => ['required', 'string'],
            'gender' => ['required'],
            'avatar_img' => ['required', 'image', 'mimes:jpeg,png'],
        ]);

        $img = $request->file('avatar_img');
        $ext = $img->getClientOriginalExtension();
        $image = "client-" . uniqid() . ".$ext";
        $img->move(public_path("uploads/clients/"), $image);

        $user = client::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
            'country' => $request->country,
            'gender' => $request->gender,
            'avatar_img' => $image
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/client/login');
    }
}
