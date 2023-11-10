<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;
use DB;

class AudiofileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name'=>"ТЦ Амбар",
                'file'=>"ambar.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"1000",
            ],
            [
                'name'=>"Икслайн",
                'file'=>"radiorolik9.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],
            [
                'name'=>"Картина ТВ",
                'file'=>"radiorolik10.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],
            [
                'name'=>"Версаль",
                'file'=>"radiorolik11.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],
            [
                'name'=>"Кама Евро",
                'file'=>"radiorolik12.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],
            [
                'name'=>"Необходимые вещи",
                'file'=>"radiorolik14.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],
            [
                'name'=>"Ищу маму",
                'file'=>"mama.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"0",
            ],
            [
                'name'=>"Радуга",
                'file'=>"radiorolik15.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],

            [
                'name'=>"ЮЗГУ",
                'file'=>"radiorolik16.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],
            [
                'name'=>"Сушимин",
                'file'=>"radiorolik18.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],
            [
                'name'=>"Тойота Камри",
                'file'=>"radiorolik19.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],
            [
                'name'=>"Мир красоты",
                'file'=>"radiorolik20.mp3",
                'type'=>"Примеры радиороликов с одним диктором",
                'price'=>"800",
            ],




            [
                'name'=>"Сериал",
                'file'=>"radiorolik1.mp3",
                'type'=>"Примеры аудиороликов с несколькими дикторами",
                'price'=>"1200",
            ],
            [
                'name'=>"Заказ",
                'file'=>"radiorolik2.mp3",
                'type'=>"Примеры аудиороликов с несколькими дикторами",
                'price'=>"1000",
            ],
            [
                'name'=>"Такси",
                'file'=>"radiorolik3.mp3",
                'type'=>"Примеры аудиороликов с несколькими дикторами",
                'price'=>"1000",
            ],
            [
                'name'=>"Соседи",
                'file'=>"radiorolik4.mp3",
                'type'=>"Примеры аудиороликов с несколькими дикторами",
                'price'=>"1000",
            ],
            [
                'name'=>"Пингвины",
                'file'=>"radiorolik5.mp3",
                'type'=>"Примеры аудиороликов с несколькими дикторами",
                'price'=>"1000",
            ],
            [
                'name'=>"Астрономы",
                'file'=>"radiorolik6.mp3",
                'type'=>"Примеры аудиороликов с несколькими дикторами",
                'price'=>"1000",
            ],
            [
                'name'=>"Рекламный бюджет",
                'file'=>"radiorolik7.mp3",
                'type'=>"Примеры аудиороликов с несколькими дикторами",
                'price'=>"1000",
            ],
        ];

        foreach ($data as $item) {
            Storage::disk('public')->put($item['file'], file_get_contents(public_path('test/rolik/'.$item['file'])), 'public');
            $item['file'] = Storage::url($item['file']);
            DB::table("audiofiles")->insert($item);
        }


    }
}
