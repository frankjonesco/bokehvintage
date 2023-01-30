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
                'name' => 'Canon',
                'slug' => 'canon',
                'logo' => 'canon-udGt6dFwEN4.webp',
            ],
            [
                'hex' => Str::random(11),
                'name' => 'Nikon',
                'slug' => 'nikon',
                'logo' => 'nikon-3Wecs2os9dS.webp',
            ]
        ];

        foreach($brands as $brand){
            Brand::create($brand);
        }
    }
}
