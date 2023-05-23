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
    $clients = User::all();

    
    return view('Client.index', ['clients' => $clients]);
   }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Client.create_form');
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
            'login' => 'required|unique:clients',
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
            $client->permis = $photoPath;
        }
       
        $client->login = $request->input('login');
        $client->password = bcrypt($request->input('password'));
        $client->save();
        
    
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
            $client=Client::findOrfail($id);
            return view('Client.edit', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        
       
        $client =Client::find($id);
       
        $client->nom = $request->nom;
        $client->prenom = $request->prenom;
        $client->adresse = $request->adresse;
        $client->zipcode =$request->zipcode;
        $client->ville = $request->ville;
        $client->pays = $request->pays;
        $client->tel = $request->tel;
        $client->email =$request->email;
    
        // Handle the uploaded photo if provided
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoPath = $photo->store('storage/photos', 'public');
            $client->permis = $photoPath;
        }
    
        // Save the changes to the client
        $client->save();
    
        return redirect('/clients');
    }
    
    
    public function destroy($id)
   {

      $client = Client::findOrFail($id);
      $client->delete();
      return redirect ('/clients');

   }
   public function search(Request $request)
{
    $keyword = $request->input('keyword');
    
    $clients = Client::query()
        ->where('nom', 'LIKE', "%{$keyword}%")
        ->orWhere('prenom', 'LIKE', "%{$keyword}%")
        ->orWhere('ville', 'LIKE', "%{$keyword}%")
        ->orWhere('pays', 'LIKE', "%{$keyword}%")
        ->orWhere('email', 'LIKE', "%{$keyword}%")
        ->get();

    return view('Client.search', ['clients' => $clients]);
}


}
