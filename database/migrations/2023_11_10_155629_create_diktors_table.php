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
        Schema::create('diktors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name", 250)->comment("Имя");
            $table->integer("order")->default(0)->comment("Порядок вывода");
            $table->string("description", 550)->comment("Описание");
            $table->boolean("irv", 550)->default(1)->comment("может IRV");
            $table->string("img", 550)->comment("фото");
            $table->string("file", 550)->comment("Пример");
            $table->string("file_irv", 550)->nullable()->comment("Пример IRV");
            $table->string("gender", 20)->comment("Пол");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diktors');
    }
};
