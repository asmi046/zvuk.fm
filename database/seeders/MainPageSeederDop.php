<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class MainPageSeederDop extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("options")->insert(
            [
                [
                    "name" => "price_voice",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Цена на дикторские голоса',
                    "value" => 'Дикторские голоса <span>300</span> рублей',
                ],
                [
                    "name" => "price_radio",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Цена на радиоролик',
                    "value" => 'Радиоролики <span>800</span> рублей',
                ],
            ]);
    }
}
