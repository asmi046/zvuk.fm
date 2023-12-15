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
        Schema::table('diktors', function (Blueprint $table) {
            $table->integer("zak_order")->default(0)->comment("Порядок вывода на странице заказа");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('diktors', function (Blueprint $table) {
            //
        });
    }
};
