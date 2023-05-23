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
        Schema::create('Paiements', function (Blueprint $table) 
        {   $table->id();
            $table->float('montant');
            $table->date('date');
            $table->string('modepaiement');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('reservation_id');
            $table->foreign('reservation_id')->references('id')->on('Reservations')->onDelete('cascade');
            $table->string('devise');
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
