<?php
namespace App;
class Helper{
    public static function getFilePath(int $id):string{
        $str=$formatted_value = str_pad($id, 9, '0', STR_PAD_LEFT);
        $ss=[];
        for ($i=0; $i < 3; $i++) {
            $ss[$i]=substr($str,$i*3,3);
        }

        return "note/data/".implode("/",$ss);
    }
}
