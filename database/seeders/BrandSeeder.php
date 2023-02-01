<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Leica',
                'slug' => 'leica',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Minolta',
                'slug' => 'minolta',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Contax Zeiss',
                'slug' => 'contax-zeiss',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Nikon',
                'slug' => 'nikon',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Tokina',
                'slug' => 'tokina',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Voigtlander',
                'slug' => 'voigtlander',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Tokina',
                'slug' => 'tokina',
            ],
            [
                'hex' => Str::random(11),
                'user_id' => 1,
                'name' => 'Voigtlander',
                'slug' => 'voigtlander',
            ],
            
            

            
        ];

        foreach($brands as $brand){
            Brand::create($brand);
        }
    }
}
