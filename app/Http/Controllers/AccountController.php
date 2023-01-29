<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    // Show index page
    public function index(){
        $site = Site::where('id', 1)->first();
        $site->views = $site->views() + 1;
        $site->save();
        return view('account.index', [
            'views' => $site->views(),
            'active_nav' => 'account'
        ]);
    }
}
