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
        Schema::create('visitante', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();

             $table->integer('document');
            $table->string('name');
            $table->string('phone',25);
            $table->string('email',150);
            $table->string('location');
            $table->string('razon');

            //campo llave foranea
            $table->unsignedBigInteger('evento_id');
            //llave foranea referenciado al id del evento
            $table->foreign('evento_id')->references('id')->on('evento')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitante');
    }
};
