<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Фейковые аватары

if (!function_exists("dictors_day_str")) {
    function dictors_day_str($day = ""):string {
        $dtime = strtotime($day);


    $monthes = array(
        1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля',
        5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа',
        9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'
    );

    $days = array(
        'Воскресенье', 'Понедельник', 'Вторник', 'Среда',
        'Четверг', 'Пятница', 'Суббота'
    );

        return date("d", $dtime)." ".$monthes[(date('n', $dtime))].", ".$days[(date('w', $dtime))];
    }
}

if (!function_exists("load_fake_avatar_img")) {
    function load_fake_avatar_img():string {
        $name = "avatar_".rand(1, 5).".jpg";
        Storage::disk('public')->put($name, file_get_contents(public_path("faker_img/avatars/" . $name)), 'public');
        return Storage::url($name);
    }
}

if (!function_exists("value_check")) {
    function value_check($nameparam = null, $find = null, $default = null) {
        $value = Request::input($nameparam);
        if ($value == null)
            return $default;

        if (is_array($value)) {
            return in_array($find, $value);
        } else {
            return $value;
        }
    }
}


if (!function_exists("phone_format")) {
    function phone_format($phone)
    {
        $phone = trim($phone);

        $res = preg_replace(
            array(
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{3})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?(\d{3})[-|\s]?(\d{3})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{2})[-|\s]?(\d{2})[-|\s]?(\d{2})/',
                '/[\+]?([7|8])[-|\s]?\([-|\s]?(\d{4})[-|\s]?\)[-|\s]?(\d{3})[-|\s]?(\d{3})/',
                '/[\+]?([7|8])[-|\s]?(\d{4})[-|\s]?(\d{3})[-|\s]?(\d{3})/',
            ),
            array(
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4$5',
                '$2$3$4',
                '$2$3$4',
            ),
            $phone
        );

        return $res;
    }
}

if (!function_exists("getFilesize")) {
    function getFilesize($file)
    {
        // ошибка
        if(!file_exists($file)) return "Файл не найден";


        $filesize = filesize($file);
        // Если размер больше 1 Кб
        if($filesize > 1024)
        {
            $filesize = ($filesize/1024);
            // Если размер файла больше Килобайта
            // то лучше отобразить его в Мегабайтах. Пересчитываем в Мб
            if($filesize > 1024)
            {
                $filesize = ($filesize/1024);
                // А уж если файл больше 1 Мегабайта, то проверяем
                // Не больше ли он 1 Гигабайта
                if($filesize > 1024)
                {
                    $filesize = ($filesize/1024);
                    $filesize = round($filesize, 1);
                    return $filesize." ГБ";
                }
                else
                {
                    $filesize = round($filesize, 1);
                    return $filesize." MБ";
                }
            }
            else
            {
                $filesize = round($filesize, 1);
                return $filesize." Кб";
            }
        }
        else
        {
            $filesize = round($filesize, 1);
            return $filesize." байт";
        }
    }
}
