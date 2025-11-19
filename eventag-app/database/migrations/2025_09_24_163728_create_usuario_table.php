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
        Schema::create('usuario', function (Blueprint $table) {
            $table->id()->autoIncrement()->unique();
            $table->string('email',150);
            $table->string('password',150);
            $table->string('name');
            //campo llave foranea
            $table->unsignedBigInteger('rol_id');
            //llave foranea referenciado al id del rol
            $table->foreign('rol_id')->references('id')->on('rol')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuario');
    }
};
