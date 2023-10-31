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
        Schema::create('file_users', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('uid')->comment("UID для отбора файлов");
            $table->string('name', 150)->comment("Имя пользователя");
            $table->string('comment', 550)->comment("Комментарий");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_users');
    }
};
