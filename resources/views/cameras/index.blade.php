<x-layout :meta="$meta" :active-nav="$active_nav">
    <x-container-thin>
        <h1 class="mb-8">Cameras</h1>
        <ul class="mx-5 list-disc">
            @foreach($cameras as $camera)
                <li>
                    <a href="/cameras/{{$camera->brand->slug}}-{{$camera->slug}}/{{$camera->hex}}" class="underline underline-offset-2">
                        {{$camera->brand->name}} {{$camera->model}}
                    </a>
                </li>
            @endforeach
        </ul>
    </x-container-thin>
</x-layout>