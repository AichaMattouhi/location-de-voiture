<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Http\Requests\StoreVehiculeRequest;
use App\Http\Requests\UpdateVehiculeRequest;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $vehicules=Vehicule::all();
       return view('vehicules.index')->with(['vehicules'=>$vehicules]);
    }
    //research guest
    public function rsch()
    {
    $marque = isset($_GET['marque']) ? $_GET['marque'] : null;
    $modele = isset($_GET['modele']) ? $_GET['modele'] : null;
    $couleur = isset($_GET['couleur']) ? $_GET['couleur'] : null;
    $nbrplaces = isset($_GET['nbrplaces']) ? $_GET['nbrplaces'] : null;
    $prix = isset($_GET['prix']) ? $_GET['prix'] : null;
    $query = Vehicule::query();
    if (!empty($marque)) {
        $query->where('marque', 'LIKE', '%' . $marque . '%');
    }
    if (!empty($modele)) {
        $query->where('modele', 'LIKE', '%' . $modele . '%');
    }
    if (!empty($couleur)) {
        $query->where('couleur', 'LIKE', '%' . $couleur . '%');
    }
    if (!empty($nbrplaces)) {
        $query->where('nbrplaces', $nbrplaces);
    }
    if (!empty($prix)) {
        $query->where('prix', '>=', $prix);
    }

    $vehicules = $query->get();
    return view('vehicules.research')->with('vehicules', $vehicules);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVehiculeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicule $vehicule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vehicule $vehicule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVehiculeRequest $request, Vehicule $vehicule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicule $vehicule)
    {
        //
    }

    /**ADMIN**/
    //alladimin
    public function index0()
    {
      $vehicules=Vehicule::all();
      return view('vehicules.index0')->with(['vehicules'=>$vehicules]);
    }

    public function form()
    {
        return view('vehicules.formvehicule');
    }

    //addadmin
    public function add(Request $request)
    {
    //return redirect()->route('Allvehicules0');
    //dd($request->all());
    if ($request->hasFile('image'))
    {
        $image = $request->file('image');
        $imagePath = $image->store('storage/photos', 'public');
    }
    //else
        //$imagePath=NULL;
    //dd($imagePath);
    // Enregistrer les autres champs dans la base de données
    $vehicule = new Vehicule([
        'marque' => $request->input('marque'),
        'modele' => $request->input('modele'),
        'anneefab' => $request->input('anneefab'),
        'couleur' => $request->input('couleur'),
        'moteur' => $request->input('moteur'),
        'kilometrage' => $request->input('kilometrage'),
        'nbrplaces' => $request->input('nbrplaces'),
        'climatisation' => $request->input('climatisation'),
        'gps' => $request->input('gps'),
        'prix' => $request->input('prix'),
        'image' => $imagePath, // Enregistrez le chemin de l'image dans le champ image
    ]);
    $vehicule->save();
    return redirect()->route('Allvehicules0');
}


public function del($id)
{
    $vehicule = Vehicule ::FindOrFail($id);
    $vehicule->delete();
    return redirect()->route('Allvehicules0'); 
}

public function edt($id)
{
    //$cpt=Compte ::FindOrFail($id);
    return view('vehicules.editvehicule', ['id' => $id] );
}


public function updt(Request $request, $id)
{
    $vehicule=Vehicule ::FindOrFail($id);
    $old=$vehicule->image;
    $vehicule->marque=$request->marque;
    $vehicule->modele=$request->modele;
    $vehicule->anneefab=$request->anneefab;
    $vehicule->couleur=$request->couleur;
    $vehicule->moteur=$request->moteur;
    $vehicule->kilometrage=$request->kilometrage;
    $vehicule->nbrplaces=$request->nbrplaces;
    $vehicule->climatisation=$request->climatisation;
    $vehicule->gps=$request->gps;
    $vehicule->prix=$request->prix;
    if ($request->hasFile('image')) 
    {
        $photo = $request->file('image');
        $photoPath = $photo->store('storage/photos', 'public');
        $vehicule->image = $photoPath; 
    }
    $vehicule->save();
    return redirect()->route('Allvehicules0');
}


    //researchadmin
    public function rsch0()
    {
    $marque = isset($_GET['marque']) ? $_GET['marque'] : null;
    $modele = isset($_GET['modele']) ? $_GET['modele'] : null;
    $couleur = isset($_GET['couleur']) ? $_GET['couleur'] : null;
    $nbrplaces = isset($_GET['nbrplaces']) ? $_GET['nbrplaces'] : null;
    $prix = isset($_GET['prix']) ? $_GET['prix'] : null;
    $query = Vehicule::query();
    if (!empty($marque)) {
        $query->where('marque', 'LIKE', '%' . $marque . '%');
    }
    if (!empty($modele)) {
        $query->where('modele', 'LIKE', '%' . $modele . '%');
    }
    if (!empty($couleur)) {
        $query->where('couleur', 'LIKE', '%' . $couleur . '%');
    }
    if (!empty($nbrplaces)) {
        $query->where('nbrplaces', $nbrplaces);
    }
    if (!empty($prix)) {
        $query->where('prix', '>=', $prix);
    }
    $vehicules = $query->get();
    return view('vehicules.researchvehicule')->with('vehicules', $vehicules);
    }
    public function rscha()
    {
    $marque = isset($_GET['marque']) ? $_GET['marque'] : null;
    $modele = isset($_GET['modele']) ? $_GET['modele'] : null;
    $couleur = isset($_GET['couleur']) ? $_GET['couleur'] : null;
    $nbrplaces = isset($_GET['nbrplaces']) ? $_GET['nbrplaces'] : null;
    $prix = isset($_GET['prix']) ? $_GET['prix'] : null;
    $query = Vehicule::query();
    if (!empty($marque)) {
        $query->where('marque', 'LIKE', '%' . $marque . '%');
    }
    if (!empty($modele)) {
        $query->where('modele', 'LIKE', '%' . $modele . '%');
    }
    if (!empty($couleur)) {
        $query->where('couleur', 'LIKE', '%' . $couleur . '%');
    }
    if (!empty($nbrplaces)) {
        $query->where('nbrplaces', $nbrplaces);
    }
    if (!empty($prix)) {
        $query->where('prix', '>=', $prix);
    }

    $vehicules = $query->get();
    return view('vehicules.researchvehicule0')->with('vehicules', $vehicules);
    }
  



    /*Client**/
    //all voitures
    public function index1()
    {
      $vehicules=Vehicule::all();
      return view('vehicules.index1')->with(['vehicules'=>$vehicules]);
    }
    //research voitures
    public function rschc()
    {
    $marque = isset($_GET['marque']) ? $_GET['marque'] : null;
    $modele = isset($_GET['modele']) ? $_GET['modele'] : null;
    $couleur = isset($_GET['couleur']) ? $_GET['couleur'] : null;
    $nbrplaces = isset($_GET['nbrplaces']) ? $_GET['nbrplaces'] : null;
    $prix = isset($_GET['prix']) ? $_GET['prix'] : null;
    $query = Vehicule::query();
    if (!empty($marque)) {
        $query->where('marque', 'LIKE', '%' . $marque . '%');
    }
    if (!empty($modele)) {
        $query->where('modele', 'LIKE', '%' . $modele . '%');
    }
    if (!empty($couleur)) {
        $query->where('couleur', 'LIKE', '%' . $couleur . '%');
    }
    if (!empty($nbrplaces)) {
        $query->where('nbrplaces', $nbrplaces);
    }
    if (!empty($prix)) {
        $query->where('prix', '>=', $prix);
    }

    $vehicules = $query->get();
    return view('vehicules.researchvehicule1')->with('vehicules', $vehicules);
    }
      
    public function reserver()
    {
        return redirect()->route('Allvehicules1');
    }

}
    

