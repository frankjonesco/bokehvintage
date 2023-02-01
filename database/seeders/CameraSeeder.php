<?php

namespace Database\Seeders;

use App\Models\Camera;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cameras = [
            [
                'hex' => 'ItBAU4xzpr1',
                'brand_id' => 9,
                'user_id' => 1,
                'model' => 'K-70',
                'slug' => makeSlug('k-70'),
                'image' => 'GKQ39N7ecii-camdenmoo.webp',
                'article_body' => '<p>The PENTAX K-70 has a compact body for easy carry-along to any outdoor shooting. Its outstanding weather-resistant performance and enormous imaging power, combining true-to-life image description and high-sensitivity shooting, make it extremely reliable, even in most demanding shooting conditions.</p><p>Whether it is under bright, blue skies, on wild, overcast days, in the gentle rains, or under dark, starry skies, the PENTAX K-70 captures the beauty of grand nature in an astonishingly beautiful image.</p><p>The PENTAX K-70: a camera that brings you new experiences, new excitement and new discoveries in beautiful scenery, while helping you to be more masterful in outdoor photography.</p>'
            ],
            [
                'hex' => 'MzMAzLnHejY',
                'brand_id' => 4,
                'user_id' => 1,
                'model' => 'F',
                'slug' => makeSlug('f'),
                'image' => 'uIwNS3C9qVm-camdenmoo.webp',
                'article_body' => '<p>The Nikon F camera, introduced in April 1959, was Nikon\'s first SLR camera. It was one of the most advanced cameras of its day. Although many of the concepts had already been introduced elsewhere, it was revolutionary in that it was the first to combine them all in one camera. It was produced until October 1973 and was replaced by the Nikon F2.</p><p>Aspects of its design remain in all of Nikon\'s subsequent SLR cameras, through the current Nikon F6 film and Nikon D6 digital models (which still share its Nikon F-mount for lenses). The "F" in Nikon F was selected from the term "re-f-lex", since the pronunciation of the first letter "R" is not available in many Asian languages. That tradition was carried all the way through their top line of Nikon cameras until the introduction of the Nikon D1 (digital) cameras decades later.</p><p>Specially modified Nikon F cameras were used in space in the early 1970s aboard the Skylab space station.</p>'
            ],
            
            
        ];

        foreach($cameras as $camera){
            Camera::create($camera);
        }
    }
}
