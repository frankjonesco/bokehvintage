<x-layout :meta="$meta" :active-nav="$active_nav">
    <div class="mt-16 mx-auto p- w-[911px] flex flex-col items-center">
        <form id="imageUpload" action="/photos/store" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
            @csrf
            <input name="photo" type="file" id="imageInput" class="hidden" />
            <button type="button" class="btn mt-20 mb-5" onclick="document.getElementById('imageInput').click();">
                Post a new photo
            </button>
            @error('photo')
                <p class="text-red-600 text-sm mt-2">{{$message}}</p>
            @enderror
        </form>

        <a href="/lenses/create" class="btn mb-5">
            Post a new lens
        </a>
        <a href="/cameras/create" class="btn">
            Post a new camera
        </a>
    </div>
    <script>
        document.getElementById("imageInput").onchange = function(){
            document.getElementById("imageUpload").submit();
        }    
    </script>
</x-layout>