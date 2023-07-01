<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]));

        event(new Registered($user));

//         $userreg = new User([
//  ‘name’ => $request->get(‘name’),
//  ‘username’=> $request->get(‘username’),
//  ‘phone’=> $request->get(‘email’),
//  ‘password’ => Hash::make($request[‘password’]),
//  ]);
$email = $request->email;
$data = ([
 'name' => $request->name’,
 'email' => $request->‘email’,
 ]);
Mail::to($email)->send(new WelcomeMail($data));
 
 $userreg->save();
 
return back();


        //return redirect(RouteServiceProvider::HOME);
    }
}
