<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hex',
        'user_id',
        'filename',
        'status'
    ];




    // Handle image upload
    public function savePhoto($request, $directory, $hex){  
        // Define a name for the new image
        $image_name = auth()->user->username.'-'.Str::random('11').$request->image->extension();
        // Specify the direcory path
        $directory_path = public_path('images/'.$directory.'/'.$hex);
        // Store in public folder
        $request->file('image')->move($directory_path, $image_name);
        // List all the file in the directory
        // $files_in_folder = File::allFiles($directory_path);
        // // Delete all files that are not the new image
        // foreach($files_in_folder as $key => $path){
        //     if($path != $directory_path.'/'.$image_name){
        //         File::delete($path);
        //     }
        // }
        // Create a thumbnail
        // self::makeImageThumbnail($directory_path, $image_name);
        return $image_name;
    }

    // Make image thumbnail
    // public function makeImageThumbnail($directory_path, $image_name, $width = 240, $prepend = 'tn'){
    //     // Resize image thumbnail
    //     Image::make($directory_path.'/'.$image_name)
    //         ->resize($width, null, function ($constraint){ 
    //             $constraint->aspectRatio(); 
    //         })
    //         ->save($directory_path.'/'.$prepend.'-'.$image_name, 60);
    // }
}
