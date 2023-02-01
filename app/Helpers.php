<?php

use App\Models\Site;
use Illuminate\Support\Str;






if(!function_exists('siteViews')){
    function siteViews(){
        $site = Site::where('id', 1)->first();
        $site->views = $site->views + 1;
        $site->save();
        return $site->views;
    }
}




// Truncate
if(!function_exists('truncate')){
    function truncate($str, $limit = 45) {
        return Str::limit($str, $limit);
    }
}



if(!function_exists('makeSlug')){
    function makeSlug($value){
        $value = strtolower($value);
        $value = trim($value);
        $value = str_replace('/', '-', $value);
        $value = str_replace('&', 'and', $value);
        return Str::slug($value, '-', 'en', ['/' => '-', '&' => 'and', '.' => '.']);
    }
}
