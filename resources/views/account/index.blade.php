<x-layout :views="$views" :active-nav="$active_nav">
    <div class="mt-16 mx-auto p- w-[911px] flex flex-col items-center">
        <form id="imageUpload" action="/account/images/upload" method="POST" enctype="multipart/form-data">
            @csrf
            <input name="image" type="file" id="newImagePost" class="hidden" />
            <button class="btn mt-20" onclick="document.getElementById('newImagePost').click();">
                Post a new image
            </button>
        </form>
    </div>
    <script>
        document.getElementById("newImagePost").onchange = function(e) {
            e.preventDefault();
            document.getElementById("imageUpload").submit();
        };
    </script>
</x-layout>