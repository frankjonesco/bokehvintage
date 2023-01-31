<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // Show homepage
    public function home(){
        return view('home', [
            'active_nav' => null
        ]);
    }

}
