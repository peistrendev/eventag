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
        Schema::create('visitantexexpositor', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->timestamps();

            
            //campo llave foranea
            $table->unsignedBigInteger('visitante_id');
            //llave foranea referenciado al id del visitante
            $table->foreign('visitante_id')->references('id')->on('visitante')->onDelete('cascade');

                        //campo llave foranea
            $table->unsignedBigInteger('expositor_id');
            //llave foranea referenciado al id del expositor
            $table->foreign('expositor_id')->references('id')->on('expositor')->onDelete('cascade');

            $table->string('clasification')->nullable();
            $table->string('comments')->nullable();


            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitantexexpositor');
    }
};
