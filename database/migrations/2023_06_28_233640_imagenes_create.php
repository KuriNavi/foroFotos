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
        Schema::create('imagenes', function (Blueprint $table) {
            $table->integer('id')->autoincrement();//PK
            $table->string('titulo',20);
            $table->string('archivo',100);
            $table->boolean('baneada');
            $table->text('motivo_ban');
            $table->string('cuenta_user',20);//FK

            $table->foreign('cuenta_user')->references('user')->on('cuentas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imagenes');
    }
};
