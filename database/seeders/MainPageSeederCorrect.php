<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class MainPageSeederCorrect extends Seeder
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
                    "name" => "chrono_correct",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Корректировка хронометража',
                    "value" => '0',
                ]
            ]);
    }
}
