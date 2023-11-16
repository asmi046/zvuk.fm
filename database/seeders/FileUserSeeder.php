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
                    "name" => "adm_1_s",
                    'comment' => 'Главный администратор',
                ],

                [
                    "uid" => 549,
                    "name" => "rp4PEERE",
                    'comment' => 'Суперадмин',

                ],
                [
                    "uid" => 17,
                    "name" => "tele2kalinin",
                    'comment' => 'Теле 2 Калининград',
                ],
                [
                    "uid" => 632,
                    "name" => "tele2petr",
                    'comment' => 'Теле 2 Петрозаводск',
                ],
                [
                    "uid" => 317,
                    "name" => "tsoka",
                    'comment' => 'Жигмытов Цокто Улан Удэ',
                ],
                [
                    "uid" => 602,
                    "name" => "novoch37",
                    'comment' => 'Новочеркасск 37 канал',
                ],
                [
                    "uid" => 316,
                    "name" => "tele2tula",
                    'comment' => 'Теле 2 Тула',
                ],
                [
                    "uid" => 351,
                    "name" => "tele2tver",
                    'comment' => 'Теле 2 Тверь',
                ],
                [
                    "uid" => 77,
                    "name" => "zvuktest77",
                    'comment' => 'Не постоянный клиент',
                ],
            ]
        );
    }
}
