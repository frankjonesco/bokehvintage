<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    public function views(){
        $views = Site::where('id', 1)->first()->views;
        return $views;
    }

    // Get Photos
    public function getPhotos($status = 'public'){
        return Photo::where('status', $status)->orderBy('id', 'DESC')->get();
    }


    // Get Lenses
    public function getLenses($status = 'public'){
        return Lens::where('status', $status)->get();
    }
}
