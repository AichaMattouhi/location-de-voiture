<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationsRequest;
use App\Http\Requests\UpdateReservationsRequest;
use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class ReservationsController extends Controller
{
    public function index()
    {
       $reservations=Reservations::all();
       return view('reservations.index')->with(['reservations'=>$reservations]);
    }

    public function resch()
    {
        $nom = isset($_GET['nom']) ? $_GET['nom'] : null;
        $prenom = isset($_GET['prenom']) ? $_GET['prenom'] : null;
        $date = isset($_GET['date']) ? $_GET['date'] : null;
        $marque = isset($_GET['marque']) ? $_GET['marque'] : null;
        
        $query = Reservations::query();
        
        if (!empty($nom)) {
            $query->whereHas('user', function ($q) use ($nom) {
                $q->where('nom', 'LIKE', '%' . $nom . '%');
            });
        }
        
        if (!empty($prenom)) {
            $query->whereHas('user', function ($q) use ($prenom) {
                $q->where('prenom', 'LIKE', '%' . $prenom . '%');
            });
        }
        
        if (!empty($date)) {
            $query->where('datedebut', 'LIKE', '%' . $date . '%');
        }
        
        if (!empty($marque)) {
            $query->whereHas('vehicule', function ($q) use ($marque) {
                $q->where('marque', 'LIKE', '%' . $marque . '%');
            });
        }
        
        $reservations = $query->get();
        
        return view('reservations.researchreservations')->with('reservations', $reservations);
    }


    public function mine($id)
    {
        $reservations = Reservations::where('user_id', $id)->get();
        return view('reservations.indexc')->with([
            'reservations' => $reservations,
            'id' => $id
        ]);        
    }

    public function rschm($id)
    {
        $reservations = Reservations::where('user_id', $id)->get();
        //$nom = isset($_GET['nom']) ? $_GET['nom'] : null;
        //$prenom = isset($_GET['prenom']) ? $_GET['prenom'] : null;
        $date = isset($_GET['date']) ? $_GET['date'] : null;
        $marque = isset($_GET['marque']) ? $_GET['marque'] : null;
        $query = Reservations::query();
       /* if (!empty($nom)) {
            $query->whereHas('user', function ($q) use ($nom) {
                $q->where('nom', 'LIKE', '%' . $nom . '%');
            });
        }
        if (!empty($prenom)) {
            $query->whereHas('user', function ($q) use ($prenom) {
                $q->where('prenom', 'LIKE', '%' . $prenom . '%');
            });
        }*/
        if (!empty($date)) {
            $query->where('datedebut', 'LIKE', '%' . $date . '%');
        }
        if (!empty($marque)) {
            $query->whereHas('vehicule', function ($q) use ($marque) {
                $q->where('marque', 'LIKE', '%' . $marque . '%');
            });
        }
        $query->where('user_id', $id);
        $reservations = $query->get();
        
        return view('reservations.mesreservations')->with([
            'reservations' => $reservations,
            'id' => $id ]); 
    }

    public function formreserver($id,$iu)
    {
        return view('reservations.form')->with(['id'=>$id,'iu'=>$iu]);
    }

    public function reserver($id,$iu,Request $request)
    {
        $reservation =new Reservations(['user_id'=>$id,
        'vehicule_id'=>$iu,
        'datedebut'=>$request->input('datedebut'),
        'datefin'=>$request->input('datefin'),
        'prix'=>$request->input('total'),
        'franchise'=>$request->input('franchise'),
        'caution'=>$request->input('caution'),
        ]);
        $reservation->save();
        $reservations = Reservations::where('user_id', $id)->get();
        
        return view('reservations.mesreservations')->with([
            'id' => $id, 'reservations'=>$reservations ]); 

    }

/*
    public function reserver(Request $request, $id, $iu)
{
    // Validate the form data
    $validatedData = $request->validate([
        'datedebut' => ['required', 'date', 'after_or_equal:today'],
        'datefin' => ['required', 'date', 'after:datedebut'],
    ]);

    // Check availability in the reservations table
    $datedebut = $validatedData['datedebut'];
    $datefin = $validatedData['datefin'];

    $existingReservations = Reservations::where(function ($query) use ($datedebut, $datefin) {
        $query->where('datedebut', '<=', $datefin)
            ->where('datefin', '>=', $datedebut);
    })->orWhere(function ($query) use ($datedebut, $datefin) {
        $query->where('datedebut', '>=', $datedebut)
            ->where('datefin', '<=', $datefin);
    })->exists();

    if ($existingReservations) {
        throw ValidationException::withMessages([
            'datedebut' => 'The selected dates are not available.',
            'datefin' => 'The selected dates are not available.',
        ]);
    }

    // Process the reservation and save it to the database
    // ...

    // Redirect or return a response
    // ...
}*/


}
