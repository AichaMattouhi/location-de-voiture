<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    use HasFactory;
    protected $table='Reservations';
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    
    }
    
    
    public function vehicule()
    {
        return $this->belongsTo(Vehicule::class, 'vehicule_id');
    }
      
    protected $fillable=['user_id','vehicule_id','datedebut','datefin','prix','franchise','caution'];

}



