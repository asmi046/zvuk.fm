<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\IncomingSevice;

class OrderController extends Controller
{
    public function create_order(IncomingSevice $order, Request $request) {

        $data = $request->input('order');

        $sendet_data = [
            "subject" => "Новый заказа с сайта",
            "parsed_content" => [
                "tralyaya" => 12312,
                "actors" => ["Колобовa","Шашковa","Ширяевa","Фёдоров"],
                "files" => [],
                "text"=> $data["content"],
                "comment" => "",
                "type" => $data["zak_type"],
                "time" => $data["standart_chrono"],
                "phone" => "Да",
                "email" => $data["email"],
                "mobile" => $data["phone"]
            ]

        ];

        $result = $order->send_order("incoming/create", "POST", $sendet_data);

        return $result;
    }
}
