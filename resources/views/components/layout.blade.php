<!DOCTYPE html>
<html lang="en">
<head>
    @php
        $default_meta = [
            'title' => 'Bokeh Vintage - Best vintage lenses, mirrorless cameras',
            'description' => 'A collective for bokeh enthusiasts. Experimental vintage lens, mirrorless camera combinations.',
            'keywords' => 'bokeh, photography, vintage, lens, experimental, mirrorless, camera, photograpy, bokeh photography, vintage lens, experimental photography, mirrorless camera, vintage bokeh photography, experimental bokeh photography, mirrorless camera vitage lenses, bokeh mirrorless camera'
        ];
        if(!isset($meta)){
            $meta = [
                'title' => $default_meta['title'],
                'description' => $default_meta['description'],
                'keywords' => $default_meta['keywords']
            ];
        }else{
            $meta = [
                'title' => isset($meta['title']) ? $meta['title'].' - Bokeh Vintage, Mirrorless cameras' : $default_meta['title'],
                'description' => isset($meta['description']) ? $meta['description'] : $default_meta['description'],
                'keywords' => isset($meta['keywords']) ? $meta['keywords'] : $default_meta['keywords']
            ];
        }
    @endphp
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$meta['title']}}</title>
    <meta name="description" content="{{$meta['description']}}">
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
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])

    {{-- Production scripts --}}
    {{-- <link rel="stylesheet" href="{{asset('build/assets/app-082f2663.css')}}">
    <link rel="stylesheet" href="{{asset('build/assets/app-6c3e4f6f.css ')}}">
    <script src="{{ asset('build/assets/app-ef00eeea.js') }}" defer></script> --}}

</head>
<body class="w-screen h-screen">

    <div class="flex flex-col">
        <div class="mx-auto my-7 pl-3 w-[911px] font-normal flex justify-end items-center">
            
            <a 
                href="https://www.facebook.com/profile.php?id=100089861233864"
                target="_blank"
                class="text-gray-900"
                aria-label="Link to Bokeh Vintage Facebook Page"    
            >
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a 
                href="https://twitter.com/BokehVintage" 
                target="_blank"
                class="mx-4 text-gray-900"
                aria-label="Link to Bokeh Vintage Twitter"    
            >
                <i class="fa-brands fa-twitter"></i>
            </a>
            <a 
                href="https://www.instagram.com/"
                target="_blank"
                class="text-gray-900"
                aria-label="Link to Bokeh Vintage Instagram"
            >
                <i class="fa-brands fa-instagram"></i>
            </a>
            <div class="text-gray-800 w-min whitespace-nowrap p-3 grow text-end">
                <span class="mr-2">Views:</span>
                <span>{{number_format(siteViews(), 0, '.', ',')}}</span>
            </div>
        </div>

        <a href="/">
            <img src="/images/bokehvintage-logo.webp" alt="Bokeh Vintage Logo" title="Bokeh Vintage Logo" class="mx-auto w-[911px] h-[183px] border-0">
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

        <main class="grow mb-40">
            {{$slot}}
        </main>

        <footer class="text-gray-800 fixed bottom-0 w-full bg-white bg-opacity-80 mt-12 py-10 text-lg border-t border-t-gray-400 z-50">
            <div class="flex mx-12">
                <ul class="flex grow">
                    <li>
                        <a href="/" class="px-2.5 border-b-gray-500 border-b-0 pb-3 hover:border-b">Home</a>
                    </li>
                    <li>
                        <a href="/about" class="px-2.5 border-b-gray-500 border-b-0 pb-3 hover:border-b">About</a>
                    </li>
                    <li>
                        <a href="/contact" class="px-2.5 border-b-gray-500 border-b-0 pb-3 hover:border-b">Contact</a>
                    </li>
                    <li>
                        <a href="/terms" class="px-2.5 border-b-gray-500 border-b-0 pb-3 hover:border-b">Terms</a>
                    </li>
                    <li>
                        <a href="/privacy" class="px-2.5 border-b-gray-500 border-b-0 pb-3 hover:border-b">Privacy</a>
                    </li>
                </ul>
                <span>
                    <a href="/" class="px-2.5 border-b-gray-500 border-b-0 pb-3 hover:border-b">Bokeh Vintage</a>
                </span>
                <span class="ml-1.5 mr-4">|</span>
                {{-- <span>Copyright &copy; {{date('Y', time())}}</span> --}}
                <span>
                    @auth
                        <a href="/profile" class="px-2.5 border-b-gray-500 border-b-0 pb-3 hover:border-b">My profile</a>
                    @else
                        <a href="/signup" class="px-2.5 border-b-gray-500 border-b-0 pb-3 hover:border-b">Join the community</a>
                    @endauth
                </span>
            </div>

        </footer>
    </div>

    <x-toast-message />

    <div id="bokehBackground" class="hidden transition-all duration-1000 ease-out" data-replace="{ 'opacity-100': 'opacity-0' }">
        <div class="background">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <script>
        // document.addEventListener('mousemove', hideSaver);
        // function showSaver(){
        //     document.addEventListener('mousemove', hideSaver);

        //     var replacers = document.querySelectorAll('[data-replace]');
        //     for(var i=0; i<replacers.length; i++){
        //         let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));
        //         Object.keys(replaceClasses).forEach(function(key) {
        //             replacers[i].classList.add(key);
        //             replacers[i].classList.remove(replaceClasses[key]);
        //         });
        //     }
        // }
        // function hideSaver(){
        //     document.removeEventListener('mousemove', hideSaver);

            
        //     var replacers = document.querySelectorAll('[data-replace]');
        //     for(var i=0; i<replacers.length; i++){
        //         let replaceClasses = JSON.parse(replacers[i].dataset.replace.replace(/'/g, '"'));
        //         Object.keys(replaceClasses).forEach(function(key) {
        //             replacers[i].classList.remove(key);
        //             replacers[i].classList.add(replaceClasses[key]);
        //         });
        //     }


        //     setTimeout(function () {
        //         showSaver();
        //     }, 2000000);
        // }
        
    </script>
    
</body>
</html>