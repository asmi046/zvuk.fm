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
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('diktor_id')->constrained()
                                        ->onUpdate('cascade')
                                        ->onDelete('cascade');
            $table->integer("start")->comment("Начало интервала");
            $table->integer("finish")->comment("Конец интервала");
            $table->float("cost", 10, 2)->comment("Цена");
            $table->float("system_cost", 10, 2)->comment("Цена");
            $table->float("sample_cost", 10, 2)->comment("Цена ролика");
            $table->float("ivr_cost", 10, 2)->comment("Цена irv");
            $table->float("ivr_music_cost", 10, 2)->comment("Цена irv + музыка");
            $table->float("dop_cost", 10, 2)->comment("Цена за доп");
            $table->float("obr_standatr", 10, 2)->comment("Цена за стандартную обработку голоса");
            $table->float("obr_one", 10, 2)->comment("Цена за обработку голоса в один дубль");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prices');
    }
};
