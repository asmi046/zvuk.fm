<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class FileUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("file_users")->insert(
            [
                [
                    "uid" => 1,
                    "name" => "rp4PEERE",
                    'comment' => 'Суперадмин',

                ],
                [
                    "uid" => 2,
                    "name" => "tele2kalinin",
                    'comment' => 'Теле 2 Калининград',
                ],
                [
                    "uid" => 3,
                    "name" => "tele2petr",
                    'comment' => 'Теле 2 Петрозаводск',
                ],
                [
                    "uid" => 4,
                    "name" => "tsoka",
                    'comment' => 'Жигмытов Цокто Улан Удэ',
                ],
                [
                    "uid" => 5,
                    "name" => "novoch37",
                    'comment' => 'Новочеркасск 37 канал',
                ],
                [
                    "uid" => 6,
                    "name" => "tele2tula",
                    'comment' => 'Теле 2 Тула',
                ],
                [
                    "uid" => 7,
                    "name" => "tele2tver",
                    'comment' => 'Теле 2 Тверь',
                ],
            ]
        );
    }
}
