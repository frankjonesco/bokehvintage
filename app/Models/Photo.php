<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
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
        // dd($request->photo->extension());
        $image_name = Str::random('11').'-'.auth()->user()->username.'.'.$request->photo->extension();

        $directory_path = public_path('images/'.$directory.'/'.$hex);

        File::makeDirectory($directory_path);

        $request->file('photo')->move($directory_path, $image_name);

        self::encodeImage($directory_path, $image_name);

        $image_name = self::replaceFileExtension($image_name);

        self::makeImageSizes($directory_path, $image_name, 1200, 'lg');
        self::makeImageSizes($directory_path, $image_name, 960, 'md');
        self::makeImageSizes($directory_path, $image_name, 720, 'sm');
        self::makeImageSizes($directory_path, $image_name, 320, 'xs');

        return $image_name;
    }

    // Encode image
    public function encodeImage($directory_path, $image_name){
        // dd(pathinfo($image_name, PATHINFO_EXTENSION));
        $img = Image::make($directory_path.'/'.$image_name)->encode('webp');
        File::delete($directory_path.'/'.$image_name);
        
        $image_name = self::replaceFileExtension($image_name);
        
        $img->save($directory_path.'/'.$image_name, 75);

        return true;
    }

    public function replaceFileExtension($image_name){
        $image_name = str_replace(pathinfo($image_name, PATHINFO_EXTENSION), '', $image_name);
        $image_name = rtrim($image_name, '.');
        return $image_name.'.webp';
    }

    // Make image thumbnail
    public function makeImageSizes($directory_path, $image_name, $dimension = 320, $prepend = 'xs'){
        // dd($directory_path.'/'.$image_name);
        $img = Image::make($directory_path.'/'.$image_name);

        $width  = $img->width();
        $height = $img->height();

        $vertical   = (($width < $height) ? true : false);
        $horizontal = (($width > $height) ? true : false);
        $square     = (($width = $height) ? true : false);

        if ($vertical) {
            $top = $bottom = 0;
            $newHeight = ($dimension) - ($bottom + $top);
            $img->resize(null, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            });

        } else if ($horizontal) {
            $right = $left = 0;
            $newWidth = ($dimension) - ($right + $left);
            $img->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

        } else if ($square) {
            $right = $left = 0;
            $newWidth = ($dimension) - ($left + $right);
            $img->resize($newWidth, null, function ($constraint) {
                $constraint->aspectRatio();
            });

        }

        // Resize image thumbnail
        $img->save($directory_path.'/'.$prepend.'-'.$image_name, 75);
    
    }
}
