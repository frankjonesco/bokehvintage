<x-layout :meta="$meta" :active-nav="$active_nav">
    <style>
        .photo-container {
          position: relative;
          width: 100%;
        }
        .photo {
          display: block;
        }
        .overlay {
          position: absolute;
          bottom: 0;
          left: 0;
          right: 0;
          background-color: rgba(255,255,255,0.9);
          overflow: hidden;
          width: 100%;
          height: 0;
          transition: .5s ease;
        }
        .photo-container:hover .overlay {
          height: 100%;
        }
    </style>
    <div class="flex flex-wrap justify-center mt-16 mx-2.5">
        @foreach($photos as $photo)
            <div class="mx-2.5 mb-5">
                <div class="photo-container">
                    <img src="{{asset('images/photos/'.$photo->hex.'/xs-'.$photo->filename)}}" class="h-[213px] aspect-auto photo" alt="">
                    <div class="overlay">
                        <div class="flex h-full justify-center items-center">
                            <a href="#" class="btn">View photo</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    


</x-layout>