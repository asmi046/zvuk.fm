<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Illuminate\Support\Facades\Storage;

class DiktorSeeder extends Seeder
{

    protected $prices = [];

    protected function set_dictor_prices($id, $id_old) {
        foreach ($this->prices as $item) {
            if ($item['user_id'] == $id_old) {
                DB::table("prices")->insert([
                    'diktor_id' => $id,
                    "start" => $item['start'],
                    "finish" => $item['finish'],
                    "cost" => $item['cost'],
                    "system_cost" => $item['system_cost'],
                    "sample_cost" => $item['sample_cost'],
                    "ivr_cost" => $item['ivr_cost'],
                    "dop_cost" => $item['dop_cost'],
                    "obr_standatr" => floatval($item['cost'])+1,
                    "obr_one" => floatval($item['cost'])+2
                ]);
            }
        }
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        include "users.php";
        include "prices.php";

        $this->prices = $prices;

        $i = 1;
        foreach ($users as $item) {

            if (!empty($item['img']))
                Storage::disk('public')->put(basename($item['img']), file_get_contents("http://zvuk-fm.ru/".$item['img']), 'public');

            Storage::disk('public')->put(basename($item['sample']), file_get_contents("http://zvuk-fm.ru/".$item['sample']), 'public');

            if (!empty($item['irv']))
                Storage::disk('public')->put(basename($item['irv']), file_get_contents("http://zvuk-fm.ru/".$item['irv']), 'public');

            DB::table("diktors")->insert([
                "name" => $item['first_name'],
                "order" => $i,
                "description" => $item['description'],
                "irv" => $item['is_ivr'],
                "img" => (!empty($item['img']))?Storage::url(basename($item['img'])):"",
                "file" => Storage::url(basename($item['sample'])),
                "file_irv" => !empty($item['irv'])?Storage::url(basename($item['irv'])):"",
                "gender" => $item['gender'],

            ]);

            $id = DB::getPdo()->lastInsertId();
            $this->set_dictor_prices($id, $item['id']);

            print("Добавлена: ".$item['first_name']."\n\r");

            $i++;
        }



    }
}
