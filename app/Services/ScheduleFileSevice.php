<?php
namespace App\Services;

class ScheduleFileSevice {

    protected function get_file_data($filename = "actorstoday.txt") {
        if (empty($filename)) return "";
        if (!file_exists(public_path('files/'.$filename))) return "";

        $content = file_get_contents(public_path('files/'.$filename));
        return mb_convert_encoding($content, 'HTML-ENTITIES', 'utf-8');
    }


    public function get_schedule($dey="today") {
        $content = $this->get_file_data("actors".$dey.".txt");

        if (empty($content) ) return null;

        $resultData = [
            "date" => ($dey === "today")?date("d.m.Y"):date("d.m.Y", strtotime('+1 day')),
            "data" => []
        ];


        $doc = new \DOMDocument();

        $doc->loadHTML($content);


        $index = 0;
        foreach($doc->getElementsByTagName('li') as $node) {
            if ($index == 0) {$index++; continue;}
            $tmp = [];
            $tmp1 = [];
            $tmp1["name"] =  $node->getElementsByTagName('a')[0]->textContent;
            $tmp1["audio"] =  str_replace("/player","/demo",$node->getElementsByTagName('a')[0]->getAttribute('href'));
            $tmp["actor"] = (object)$tmp1;
            $tmp["status"] =  $node->getElementsByTagName('img')[0]->getAttribute('alt');

            $time = "00:00";
            $tm = $node->getElementsByTagName('div')[0];

            if ($tm)
                $time = $tm->textContent;


            $tmp["time_start"] =  $time;
            $tmp["time_end"] =  $time;

            $resultData["data"][] = (object)$tmp;
            $index++;
        }

        return (object)$resultData;
    }

}
