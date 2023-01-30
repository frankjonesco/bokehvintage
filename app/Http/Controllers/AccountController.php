<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Models\Image;
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

    // Upload an image
    public function uploadImage(Request $request, Image $image){

        // Validate form data
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,webp|max:5000|dimensions:min_width=1200,min_height=800'
        ]);

        // Upload the file and run conversions
        if($request->hasFile('image')){
            $image->saveImage($request);
        }

        return redirect();
    }
}
