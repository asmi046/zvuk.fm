<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class MainPageSeeder extends Seeder
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
                    "name" => "arz_1",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Аудиореклама заголовок 1',
                    "value" => 'Студия радиорекламы "Эпицентр"',
                ],
                [
                    "name" => "arz_2",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Аудиореклама заголовок 2',
                    "value" => 'Дикторские <br/>голоса',
                ],
                [
                    "name" => "arz_3",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Аудиореклама заголовок 3',
                    "value" => 'Начитка <br/>текста',
                ],

                [
                    "name" => "art_1",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Аудиореклама текст 1',
                    "value" => 'Изготовление радиороликов.Дикторские голоса. Запись голосовых приветсвий и корпоративных автоответчиков.',
                ],
                [
                    "name" => "art_2",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Аудиореклама текст 2',
                    "value" => 'Дикторские голоса, это дикторы, актёры театра - специалисты в области озвучки радиорекламы.',
                ],
                [
                    "name" => "art_3",
                    "page" => "Главная",
                    "type" => "plan",
                    'title' => 'Аудиореклама текст 3',
                    "value" => 'Начитка текста - это несколько дублей прочтения вашего текста голосом диктора. Мы продаём дикторские голоса. 300 рублей за текст радиоролика.',
                ],

                [
                    "name" => "work_time",
                    "type" => "rich",
                    "page" => "Главная",
                    'title' => 'Политика конфиденциальности',
                    "value" => file_get_contents(public_path('test//work_time.html')),
                ],

                [
                    "name" => "main_text",
                    "type" => "rich",
                    "page" => "Главная",
                    'title' => 'Политика конфиденциальности',
                    "value" => file_get_contents(public_path('test//main_text.html')),
                ],
            ]);
    }
}
