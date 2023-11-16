<?php

namespace App\Actions;

use App\Models\FileUser;

class GetUserFilesAction {

    protected $comments = [];

    protected function get_comment($uid) {

        if (isset($this->comments[$uid]))
            return $this->comments[$uid];
        else
            return "";
    }

    protected function get_item_array($item, $create_data, $uid) {
        $uid = substr(
            $item,
            strripos($item,"_")+1,
            strripos($item, ".")-strripos($item,"_")-1
        );

        $tmp = [];
        $tmp['src_name'] = $item;
        $tmp['clear_name'] = str_replace("_".$uid, "", $item);
        $tmp['href'] = "/files/".$item;
        $tmp['data'] = $create_data;
        $tmp['size'] = getFilesize(public_path('files/'.$item));
        $tmp['uid'] = $uid;
        $tmp['comment'] = $this->get_comment($uid);

        return $tmp;
    }

    public function handle($uid) {

        $comments_src = FileUser::select('uid', 'comment')->get();
        foreach ($comments_src  as $item){
            $this->comments[$item['uid']] = $item['comment'];
        }

        $file_list = scandir(public_path('files'));

        $result_list = [];
        foreach ($file_list as $item) {
            if (($item === ".")|| ($item === "..")) continue;

            $create_data = date("d.m.Y", filectime(public_path('files/'.$item)));

            if ($uid != 1)
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
