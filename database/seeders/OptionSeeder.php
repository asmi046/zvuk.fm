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
                    "name" => "head_text",
                    "type" => "rich",
                    'title' => 'Текст в шапке сайта',
                    "value" => "Официальный сайт для размещения информации о подготовке исполнительными органами Курской области проектов нормативных правовых актов и результатах их общественного обсуждения, а также для официального опубликовавния принятых нормативых правовых актов",
                ],

                [
                    "name" => "about_page_text",
                    "type" => "rich",
                    'title' => 'Текст для страницы о портале',
                    "value" => file_get_contents(public_path('test//about_page.txt')),
                ],

                [
                    "name" => "material_page_text",
                    "type" => "rich",
                    'title' => 'Текст для страницы материалов',
                    "value" => file_get_contents(public_path('test//materials_page.txt'))
                ],

                [
                    "name" => "phone",
                    "type" => "plan",
                    'title' => 'Телефон',
                    "value" => "+7 (101) 001 01 01",
                ],

                [
                    "name" => "phone_metod",
                    "type" => "plan",
                    'title' => 'Телефон методологической поддержки',
                    "value" => "+7 (222) 002 02 02",
                ],

                [
                    "name" => "email",
                    "type" => "plan",
                    'title' => 'e-mail',
                    "value" => "info@npa.kursk.ru",
                ],

                [
                    "name" => "rang",
                    "type" => "plan",
                    'title' => 'Оценка деятельности портала',
                    "value" => "Хороший",
                ],

                [
                    "name" => "rang_year",
                    "type" => "plan",
                    'title' => 'Год оценки деятельности портала',
                    "value" => "2022",
                ],

                [
                    "name" => "main_title",
                    "type" => "plan",
                    'title' => 'Title главной страницы',
                    "value" => "Портал правовой информации Курской области",
                ],

                [
                    "name" => "main_description",
                    "type" => "plan",
                    'title' => 'Description главной страницы',
                    "value" => "Официальный сайт для размещения информации о подготовке исполнительными органами Курской области проектов нормативных правовых актов и результатах их общественного обсуждения",
                ],
            ]);
    }
}
