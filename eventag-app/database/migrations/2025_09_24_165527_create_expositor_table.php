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
        Schema::create('expositor', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();

             $table->string('name');
            $table->longText('description');
            $table->string('logo');
            $table->string('location');
            $table->string('phone',25);
            $table->string('email',150);
            $table->string('pagina_web');
            $table->longText('prod_ofrece');
            $table->longText('prod_demanda');
            $table->string('tipo');

             //campo llave foranea
            $table->unsignedBigInteger('evento_id');
             $table->unsignedBigInteger('user_id');
            //llave foranea referenciado al id del evento
            $table->foreign('evento_id')->references('id')->on('evento')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('usuario')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expositor');
    }
};
