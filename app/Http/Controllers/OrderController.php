<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\IncomingSevice;

use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\BackMail;


class OrderController extends Controller
{
    public function create_order(IncomingSevice $order, Request $request) {

        $data = $request->all();

        $diktors = $request->input('diktors');
        $comment = $data["comment"];
        $comment .= "<p><strong>Требуемый хронометраж:</strong> ".$data["wonted_chrono"]."</p>";
        if ($data["zak_type"] === "Голос")
            $comment .= "<p><strong>Обработка:</strong> ".$data["obrabotka"]. "</p>";

        if ($data["zak_type"] === "IVR")
            $comment .= "<p><strong>Музыка IVR:</strong> ".$data["irv_muz"]. "</p>";

        $files = [];
        if (!empty($data['files'])) {
            $filename = $data['files']->getClientOriginalName();
            Storage::disk('public')->putFileAs('order_files', $data['files'], $filename);
            $files = [config('app.url').Storage::url($filename)];
        }


        $sendet_data = [
            "subject" => "Новый заказа с сайта",
            "parsed_content" => [
                "tralyaya" => 12312,
                "actors" => $diktors,
                "files" => $files,
                "text"=> $data["content"],
                "wonted_chrono"=> $data["wonted_chrono"],
                "comment" => $comment,
                "type" => $data["zak_type"],
                "time" => $data["standart_chrono"],
                "phone" => "Да",
                "email" => $data["email"],
                "mobile" => $data["phone"],
                "obrabotka" => $data["obrabotka"],
                "irv_muz" => $data["irv_muz"],
                "price" => $data["price"]
            ]

        ];

        file_put_contents("sendet_data.json", json_encode($sendet_data, true));

        $result = $order->send_order("incoming/create", "POST", $sendet_data);

        Mail::to($data["email"])->send(new BackMail($data, $files));

        return $result;
    }
}
