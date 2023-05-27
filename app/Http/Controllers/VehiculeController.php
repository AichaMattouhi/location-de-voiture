<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehiculeRequest;
use App\Http\Requests\UpdateVehiculeRequest;
use App\Models\Vehicule;

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
    return view('vehicules.researchvehicule')->with('vehicules', $vehicules);
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
    
}
