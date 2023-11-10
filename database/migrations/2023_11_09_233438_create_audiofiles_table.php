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
        Schema::create('audiofiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 220)->comment('Название');
            $table->string('file', 500)->comment('Аудиофайл');
            $table->string('type', 220)->comment('Тип ролика');
            $table->float('price', 10,2)->comment('Цена');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audiofiles');
    }
};
