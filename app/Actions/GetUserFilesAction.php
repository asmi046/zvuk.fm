<?php

namespace App\Actions;

class GetUserFilesAction {

    protected function get_item_array($item, $create_data, $uid) {
        $tmp = [];
        $tmp['src_name'] = $item;
        $tmp['clear_name'] = str_replace("_".$uid, "", $item);
        $tmp['href'] = "/files/".$item;
        $tmp['data'] = $create_data;
        $tmp['size'] = getFilesize(public_path('files/'.$item));

        return $tmp;
    }

    public function handle($uid) {
        $file_list = scandir(public_path('files'));

        $result_list = [];
        foreach ($file_list as $item) {
            if (($item === ".")|| ($item === "..")) continue;

            $create_data = date("d.m.Y", filectime(public_path('files/'.$item)));

            if ($uid != 77)
            {
                if (stripos($item, "_".$uid.".") !== false )
                    $result_list[$create_data][] = $this->get_item_array($item,$create_data, $uid);
            }
            else
                $result_list[$create_data][] = $this->get_item_array($item,$create_data, $uid);
        }

        return $result_list;
    }
}
