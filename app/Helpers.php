<?php

use App\Models\Site;



    if(!function_exists('siteViews')){
        function siteViews(){
            $site = Site::where('id', 1)->first();
            $site->views = $site->views + 1;
            $site->save();
            return $site->views;
        }
    }
