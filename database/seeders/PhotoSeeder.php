<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photos = [
            [
                'hex' => '4AZoSvN3e4F',
                'user_id' => 1,
                'filename' => 'vyERyH2Wzal-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'JEaHd5wyqJE',
                'user_id' => 1,
                'filename' => '2MQ8f1YHlHU-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'zqXpguWmPPe',
                'user_id' => 1,
                'filename' => 'Pbhos77PMQK-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'cc522bjPBQk',
                'user_id' => 1,
                'filename' => 'C9pMYDNGt2j-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'A5WNHqrWKTp',
                'user_id' => 1,
                'filename' => 'iJKyPlmO6Qu-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'vcKeXtkwzlM',
                'user_id' => 1,
                'filename' => 'VfktCjkKUZG-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'tF7jOQo51rZ',
                'user_id' => 1,
                'filename' => 'bgOaeLNyGfO-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'fClmElhYo7W',
                'user_id' =>  1,
                'filename' => 'AUAlW7pzdf8-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => '7Imi8vLhFBj',
                'user_id' => 1,
                'filename' => '8QC3L4hJjP1-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'wMvGdB4kxmX',
                'user_id' => 1,
                'filename' => 'axxYwhRObPw-camdenmoo.webp', 
                'status' => 'public'
            ],
            [
                'hex' => 'imxf48HNs4C',
                'user_id' => 1,
                'filename' => 'mXsBaJGfEv5-camdenmoo.webp',
                'status' => 'public'
            ],
            [
                'hex' => 'CSYvbQpaSjD',
                'user_id' => 1,
                'filename' => 'w43BwAEWZiz-camdenmoo.webp',
                'status' => 'public'
            ],
            
        ];

        foreach($photos as $photo){
            Photo::create($photo);
        }
    }
}
