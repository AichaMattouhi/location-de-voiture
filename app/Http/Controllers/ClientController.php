<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\User;


class ClientController extends Controller
{
    public function index()
   {
    $users = User::all();
    return view('User.index', ['users' => $users]);
 
   }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('User.create_form');
    }
    public function store(Request $request)
    {  
        $validatedData = $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'adresse' => 'required',
            'zipcode' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'tel' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'required',
            'photo' => 'required|image',
        ]);
       
    
        // Handle the uploaded photo
       
    
        $client = new Client;
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->adresse = $request->input('adresse');
        $client->zipcode= $request->input('zipcode');
        $client->ville = $request->input('ville');
        $client->pays = $request->input('pays');
        $client->tel= $request->input('tel');
        $client->email = $request->input('email');
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('storage/photos', 'public');
    
            // Save the photo path to the database
            $user->permis = $photoPath;
        }
       
       
        $user->password = bcrypt($request->input('password'));
        $user->save();
        
    
        return redirect('/clients');
    }
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    
    public function edit($id)
    {       
            $user=User::findOrfail($id);
            return view('User.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
       
        $user =User::find($id);
       
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->adresse = $request->adresse;
        $user->zipcode =$request->zipcode;
        $user->ville = $request->ville;
        $user->pays = $request->pays;
        $user->tel = $request->tel;
        $user->email =$request->email;
    
        // Handle the uploaded photo if provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('storage/photos', 'public');
            $user->permis = $photoPath;
        }
    
        // Save the changes to the client
        $user->save();
    
        return redirect('/clients');
    }
    
    
    public function destroy($id)
   {

      $user = User::findOrFail($id);
      $user->delete();
      return redirect ('/clients');

   }
   public function search(Request $request)
{
    $keyword = $request->input('keyword');
    
    $users = User::query()
        ->where('nom', 'LIKE', "%{$keyword}%")
        ->orWhere('prenom', 'LIKE', "%{$keyword}%")
        ->orWhere('ville', 'LIKE', "%{$keyword}%")
        ->orWhere('pays', 'LIKE', "%{$keyword}%")
        ->orWhere('email', 'LIKE', "%{$keyword}%")
        ->get();

    return view('User.search', ['users' => $users]);
}


}
