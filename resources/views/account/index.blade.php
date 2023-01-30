<x-layout :views="$views" :active-nav="$active_nav">
    <div class="mt-16 mx-auto p- w-[911px] flex flex-col items-center">
        <form id="imageUpload" action="/photos/store" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="photo" type="file" id="inputPhoto" class="hidden" />
            <button type="button" class="btn mt-20" onclick="document.getElementById('inputPhoto').click();">
                Post a new image
            </button>
        </form>
    </div>
    <script>
        document.getElementById("inputPhoto").onchange = function(){
            document.getElementById("imageUpload").submit();
        }    
    </script>
</x-layout>