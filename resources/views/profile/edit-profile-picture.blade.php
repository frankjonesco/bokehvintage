<x-layout :meta="$meta" :active-nav="$active_nav">
    <x-container-thin>
        <h1>Edit profile picture</h1>

        <div class="flex flex-row py-12 items-center">
            <div class="w-1/2">
                <div class="bg-gradient-to-r from-sky-200 to-white border border-gray-400 rounded-full p-5 w-1/2 mx-auto">
                    <img src="{{$user->image ? asset('images/users/'.$user->hex.'/'.$user->image) : asset('images/users/'.$user->hex.'/'.$user->image)}}" alt="" class="border border-gray-400 bg-white rounded-full">
                </div>
                <p><br><br></p>
            </div>
            <div class="w-1/2 text-center">
                <form id="imageUpload" action="/profile/picture/upload/image" method="POST" enctype="multipart/form-data" class="flex flex-col items-center">
                    @csrf
                    <input name="hex" type="hidden" value="{{$user->hex}}" />
                    <input name="image_type" type="hidden" value="profile_picture" />
                    <input name="image" type="file" class="hidden" id="imageInput" />
                    <button type="button" class="btn" onclick="document.getElementById('imageInput').click();">Upload a new image</button>
                    @error('image')
                        <p class="text-red-600 text-sm mt-2">{{$message}}</p>
                    @enderror
                    <p>Max file size 2MB, Minimun dimensions 320x320 pixels, Accepted formats: .jpg, .png, .webp, .svg</p>
                </form>
            </div>
        </div>
    </x-container-thin>
    <script>
        document.getElementById("imageInput").onchange = function(){
            document.getElementById("imageUpload").submit();
        }    
    </script>
</x-layout>
