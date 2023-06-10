<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    protected $table='Vehicules';
    protected $fillable=['marque','modele','anneefab','couleur','moteur','kilometrage','nbrplaces','climatisation','gps','prix','image'];
}
