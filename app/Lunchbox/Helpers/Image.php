<?php

namespace Lunchbox\Helpers;

class Image
{


    public function uploadImage($name,$folder_path,$folder_name){

        $file_temp = $name['tmp_name'];
        $file_dir = INC_ROOT .$folder_path.$folder_name;
        $file_extn = strtolower(end(explode('.',$name['name'])));
        $filename = substr(md5(time()),0, 10).'.'.$file_extn;
        $file_path = $file_dir.$filename;
        $canonical_path = $folder_name.$filename;
        move_uploaded_file($file_temp, $file_path);
        return $canonical_path;
    }


}
