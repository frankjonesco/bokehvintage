<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    // Show homepage
    public function home(){
        return view('home', [
            'active_nav' => null,
            
        ]);
    }

    public function showAbout(){
        return view('about.index', [
            'active_nav' => null,
            'meta' => [
                'title' => 'About'
            ]
        ]);
    }

    public function showContact(){
        return view('contact.index', [
            'active_nav' => null,
            'meta' => [
                'title' => 'Contact us'
            ]
        ]);
    }

    public function showTerms(){
        return view('terms.index', [
            'active_nav' => null,
            'meta' => [
                'title' => 'Terms of Use'
            ]
        ]);
    }

    public function showPrivacy(){
        return view('privacy.index', [
            'active_nav' => null,
            'meta' => [
                'title' => 'Privacy Policy'
            ]
        ]);
    }

}
