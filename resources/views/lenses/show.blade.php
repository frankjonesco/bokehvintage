<x-layout :meta="$meta" :active-nav="$active_nav">
    <x-container-thin>

        <div class="flex items-center mb-8">
            <h1 class="grow">
                {{$lens->brand->name}} {{$lens->model}}
            </h1>

            @auth
                <form id="imageUpload" action="/profile/upload/image" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                    @csrf
                    <input name="hex" type="hidden" value="{{$lens->hex}}" />
                    <input name="image_type" type="hidden" value="lens" />
                    <input name="image" type="file" class="hidden" id="imageInput" />
                    <button type="button" class="btn" onclick="document.getElementById('imageInput').click();">Add an image for this lens</button>
                    @error('image')
                        <p class="text-red-600 text-sm mt-2">{{$message}}</p>
                    @enderror
                </form>
                
            @endauth
        </div>

        <img src="{{asset('images/lenses/'.$lens->hex.'/'.$lens->image)}}" alt="" class="mb-7 mx-auto rounded-sm">

        {!!$lens->article_body!!}

    </x-container-thin>

    <script>

        document.getElementById("imageInput").onchange = function(){
            
            document.getElementById("imageUpload").submit();
        }    
    </script>

</x-layout>

