<x-layout :meta="$meta" :active-nav="$active_nav">
    <x-container-thin>
        <nav class="shift mt-16 mx-auto border border-gray-400 rounded-md py-4 px-2">
            <ul class="flex justify-between items-center font-normal text-lg text-gray-600">
                <li>
                    <form id="imageUpload" action="/photos/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="photo" type="file" id="imageInput" class="hidden" />
                        <button type="button" class="py-3 px-3 mx-2 rounded-sm " onclick="document.getElementById('imageInput').click();">
                            Post a new photo
                        </button>
                        @error('photo')
                            <p class="text-red-600 text-sm mt-2">{{$message}}</p>
                        @enderror
                    </form>
                </li>
                <li>
                    <a href="/lenses/create" class="py-3 px-3 mx-2 rounded-sm ">
                        Post a new lens
                    </a>
                </li>
                <li>
                    <a href="/cameras/create" class="py-3 px-3 mx-2 rounded-sm ">
                        Post a new camera
                    </a>
                </li>
                <li>
                    <a href="/profile/picture" class="py-3 px-3 mx-2 rounded-sm ">
                        Profile picture
                    </a>
                </li>
                <li>
                    <a href="/profile/settings" class="py-3 px-3 mx-2 rounded-sm ">
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
    </x-container-thin>
    <script>
        document.getElementById("imageInput").onchange = function(){
            document.getElementById("imageUpload").submit();
        }    
    </script>
</x-layout>