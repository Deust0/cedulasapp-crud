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
        Schema::create('info_usuarios', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cedula');
            $table->string('name');
            $table->integer('edad');
            $table->string('ciudad');
            $table->date('nacimiento');
            $table->string('estadocivil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('info_usuarios');
    }
};
