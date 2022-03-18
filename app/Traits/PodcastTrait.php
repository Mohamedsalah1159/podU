<?php

namespace App\Traits;

trait podcastTrait
{
    public function saveFile($podcast, $file){
        // save  in folder
        $file_extentions = $podcast->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extentions;
        $path = $file;
        $podcast->move($path, $file_name);
        return $file_name;
    }

}
