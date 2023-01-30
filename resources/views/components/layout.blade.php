<!DOCTYPE html>
<html lang="en">
<head>
    @php
        if(!isset($meta)){
            $meta = [
                'title' => 'Bokeh Vintage - Best vintage lenses mirrorless cameras',
                'description' => 'A collective for bokeh enthusiasts. Experimental vintage lens, mirrorless camera combinations.',
                'keywords' => 'bokeh, photography, vintage, lens, experimental, mirrorless, camera, photograpy, bokeh photography, vintage lens, experimental photography, mirrorless camera, vintage bokeh photography, experimental bokeh photography, mirrorless camera vitage lenses, bokeh mirrorless camera'
            ];
        }    
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$meta['title']}}</title>
    <meta name="description" content="{{$meta['keywords']}}">
    <meta name="keywords" content="{{$meta['keywords']}}">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-1EC56D9HKS" defer></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-1EC56D9HKS');
    </script>

    {{-- Google Font - 'Quicksand' --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">

    {{-- Alpine.js --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Development scripts --}}
    @vite('resources/css/app.css')

    {{-- Production scripts --}}
    {{-- <link rel="stylesheet" href="{{asset('build/assets/app-35613ee9.css')}}">
    <script src="{{ asset('build/assets/app-ef00eeea.js') }}" defer></script> --}}

</head>
<body>

    <div class="mx-auto my-7 w-[911px] font-normal flex justify-end">
        <div class="w-min whitespace-nowrap p-3">
            Views: {{$views}}
        </div>
    </div>
    <a href="/">
        <img src="/images/bokehvintage-logo.png" alt="Bokeh Vintage Logo" title="Bokeh Vintage Logo" class="mx-auto w-[911px] h-[183px] border-0">
    </a>
    <nav class="shift w-[911px] mx-auto">
        <ul class="flex font-normal text-lg text-gray-600">
            <li class="">
                <a href="/photos" aria-label="Phots library" class="py-3 px-3 mx-2 rounded-sm {{$activeNav == 'photos' ? 'bg-gray-800 text-white' : null}}">Photos</a>
            </li>
            <li class="">
                <a href="/lenses" aria-label="Phots library" class="py-3 px-3 mx-2 rounded-sm {{$activeNav == 'lenses' ? 'bg-gray-800 text-white' : null}}">Lenses</a>
            </li>
            <li class="">
                <a href="/cameras" aria-label="Phots library" class="py-3 px-3 mx-2 rounded-sm {{$activeNav == 'cameras' ? 'bg-gray-800 text-white' : null}}">Cameras</a>
            </li>
            @auth
                <li class="">
                    <a href="/profile" aria-label="Login page" class="py-3 px-3 mx-2 {{$activeNav == 'profile' ? 'bg-gray-800 text-white rounded-sm' : null}}">Profile</a>
                </li>
                <li>
                    <form action="/logout" class="inline" method="POST">
                        @csrf
                        <a href="#" onclick="this.parentNode.submit()" class="py-3 px-3 mx-2 ">Logout</a>
                    </form>
                </li>
            @else
                <li class="">
                    <a href="/login" aria-label="Login page" class="py-3 px-3 mx-2 {{$activeNav == 'login' ? 'bg-gray-800 text-white rounded-sm' : null}}">Log in</a>
                </li>
                <li class="">
                    <a href="/signup" aria-label="Sign up page" class="py-3 px-3 mx-2 {{$activeNav == 'signup' ? 'bg-gray-800 text-white rounded-sm' : null}}">Sign up</a>
                </li>
            @endauth
        </ul>
    </nav>

    {{$slot}}

    <div class="h-40"></div>
    <x-toast-message />
    
</body>
</html>