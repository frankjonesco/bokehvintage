<x-layout :views="$views" :active-nav="$active_nav">
    <div class="flex flex-wrap justify-center mt-20 mx-2.5">
        @foreach($photos as $photo)
            <div class="mx-2.5 mb-5">
                <img src="{{asset('images/photos/'.$photo->hex.'/xs-'.$photo->filename)}}" class="h-[213px] aspect-auto" alt="">
            </div>
        @endforeach
    </div>

    {{-- <div class="fixed left-0 top-0 p-12 w-screen h-screen bg-slate-100 z-20">
        <div class="flex">
            <div class="w-3/4 p-4">
                <img src="https://bokehvintage.test/images/photos/zqXpguWmPPe/Pbhos77PMQK-camdenmoo.webp" alt="" title="" class="shadow-lg rounded-sm">
            </div>
            <div class="w-1/4 p-4">
                asas
            </div>
        </div>
    </div> --}}

</x-layout>