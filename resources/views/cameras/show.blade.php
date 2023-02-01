<x-layout :meta="$meta" :active-nav="$active_nav">
    <x-container-thin>

        <div class="flex items-center mb-8">
            <h1 class="grow">
                {{$camera->brand->name}} {{$camera->model}}
            </h1>

            @auth
                <form id="imageUpload" action="/profile/cameras/upload/image" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                    @csrf
                    <input name="hex" type="hidden" value="{{$camera->hex}}" />
                    <input name="image_type" type="hidden" value="camera" />
                    <input name="image" type="file" class="hidden" id="imageInput" />
                    <button type="button" class="btn" onclick="document.getElementById('imageInput').click();">Add an image for this camera</button>
                    @error('camera')
                        <p class="text-red-600 text-sm mt-2">{{$message}}</p>
                    @enderror
                </form>
                
            @endauth
        </div>

        <img src="{{asset('images/cameras/'.$camera->hex.'/sm-'.$camera->image)}}" alt="" class="my-14 mx-auto rounded-sm w-1/2">

        {!!$camera->article_body!!}

    </x-container-thin>

    <script>

        document.getElementById("imageInput").onchange = function(){
            
            document.getElementById("imageUpload").submit();
        }    
    </script>

</x-layout>

