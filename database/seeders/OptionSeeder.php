<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class OptionSeeder extends Seeder
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
                    "name" => "phone",
                    "page" => "Контакты",
                    "type" => "plan",
                    'title' => 'Телефон',
                    "value" => "+7 (920) 712-15-22",
                ],
                [
                    "name" => "phone2",
                    "page" => "Контакты",
                    "type" => "plan",
                    'title' => 'Телефон',
                    "value" => "+7 (4712) 53-33-60",
                ],

                [
                    "name" => "email",
                    "page" => "Контакты",
                    "type" => "plan",
                    'title' => 'email',
                    "value" => "zakaz@zvuk.fm",
                ],

                [
                    "name" => "policy",
                    "type" => "rich",
                    "page" => "",
                    'title' => 'Политика конфиденциальности',
                    "value" => file_get_contents(public_path('test//policy.html')),
                ],

                [
                    "name" => "privet_text",
                    "type" => "rich",
                    "page" => "Голосовое приветствие",
                    'title' => 'Текст со страницы голоыовое приветствие',
                    "value" => file_get_contents(public_path('test//privet.html')),
                ],
                [
                    "name" => "meteo_text",
                    "type" => "rich",
                    "page" => "Прогноз погоды",
                    'title' => 'Текст со страницы прогноз погоды',
                    "value" => file_get_contents(public_path('test//meteo.html')),
                ],
                [
                    "name" => "work_text",
                    "type" => "rich",
                    "page" => "Как начать работать",
                    'title' => 'Текст со страницы Как начать работать',
                    "value" => file_get_contents(public_path('test//work.html')),
                ],

            ]);
    }
}
