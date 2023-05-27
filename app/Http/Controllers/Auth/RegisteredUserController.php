<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {  
        
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => 'required', 
            'email' => 'required', 
            'mot_de_passe' => 'required', 
            'adresse' => 'required',
            'zipcode' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'tel' => 'required',
            'photo' => 'required|image',
            
            
            
        ]);
        
       

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'zipcode' => $request->zipcode,
            'ville' => $request->ville,
            'pays' => $request->pays,
            'tel' => $request->tel,
            'permis' => ( $request->file('photo'))->store('storage/photos', 'public'),
            'email' => $request->email,
            'password' => Hash::make($request->mot_de_passe),
            
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

   
   