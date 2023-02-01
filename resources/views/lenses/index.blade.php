<x-layout :meta="$meta" :active-nav="$active_nav">
    <x-container-thin>
        <h1 class="mb-8">Lenses</h1>
        <ul class="mx-5 list-disc">
            @foreach($lenses as $lens)
                <li class="py-1 pl-2">
                    <a href="/lenses/{{$lens->brand->slug}}-{{$lens->slug}}/{{$lens->hex}}" class=" underline-offset-2 hover:underline hover:text-black">
                        {{$lens->brand->name}} {{$lens->model}}
                    </a>
                </li>
            @endforeach
        </ul>
    </x-container-thin>
</x-layout>