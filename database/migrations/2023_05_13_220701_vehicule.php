<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Vehicules', function (Blueprint $table) 
        {   $table->id();
            $table->string('marque',40);
            $table->string('modele',40);
            $table->date('anneefab');
            $table->string('couleur',40);
            $table->string('moteur',40);
            $table->UnsignedInteger('kilometrage');
            $table->integer('nbrplaces');
            $table->boolean('climatisation');
            $table->boolean('gps');
            $table->float('prix');
            $table->string('type',40); 
            $table->timestamps();        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
