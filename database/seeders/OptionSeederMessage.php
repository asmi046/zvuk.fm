<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;

class OptionSeederMessage extends Seeder
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
                    "name" => "message_qr",
                    "page" => "Страница с QR кодом",
                    "type" => "plan",
                    'title' => 'Сообщение к QR-коду',
                    "value" => "Телеграмм БОТ лишь информирует о готовности заказа. Переписка по заказам ведётся исключительно по электронной почте. Не пишите боту - он не ответит.",
                ],

            ]);
    }
}
