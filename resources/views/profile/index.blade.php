<x-layout :views="$views" :active-nav="$active_nav">
    <div class="mt-16 mx-auto p- w-[911px] flex flex-col items-center">
        <form id="imageUpload" action="/photos/store" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
            @csrf
            <input name="photo" type="file" id="inputPhoto" class="hidden" />
            <button type="button" class="btn mt-20" onclick="document.getElementById('inputPhoto').click();">
                Post a new image
            </button>
            @error('photo')
                <p class="text-red-600 text-sm mt-2">{{$message}}</p>
            @enderror
        </form>
    </div>
    <script>
        document.getElementById("inputPhoto").onchange = function(){
            document.getElementById("imageUpload").submit();
        }    
    </script>
</x-layout>