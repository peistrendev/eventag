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
        Schema::create('actividad', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('name');
            $table->string('description');
            $table->date('start_date');
            $table->time('hour');
            $table->string('location')->nullable();
            $table->string('author')->nullable();
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
        Schema::dropIfExists('actividad');
    }
};
