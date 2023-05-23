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
        Schema::create('clients', function (Blueprint $table) 
        {   $table->id();
            $table->string('nom',40);
            $table->string('prenom',40);
            $table->string('adresse',60);
            $table->string('zipcode',50);
            $table->string('ville',40);
            $table->string('pays',40);
            $table->string('tel',60);
            $table->string('email',60);
            $table->string('permis',100);
            $table->string('login',40);
            $table->string('password',40); 
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
