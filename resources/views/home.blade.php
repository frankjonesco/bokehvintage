<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bokeh Vintage - Best vintage lenses mirrorless cameras</title>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1EC56D9HKS" defer></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'G-1EC56D9HKS');
        </script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        {{-- Local scripts --}}
        @vite('resources/css/app.css')

        {{-- <link rel="stylesheet" href="{{asset('build/assets/app-5c82b752.css')}}">
        <script src="{{ asset('build/assets/app-ef00eeea.js') }}" defer></script> --}}

        <style>
            body{
                font-family: 'Quicksand', sans-serif;
            }


            /* NAVIGATION */

            nav ul li a,
            nav ul li a:after,
            nav ul li a:before {
              transition: all .5s;
            }
            nav ul li a:hover {
              color: #555;
            }

            /* SHIFT */
            nav.shift ul li a {
              position:relative;
              z-index: 1;
            }
            nav.shift ul li a:hover {
              color: #fff;
            }
            nav.shift ul li a:after {
              display: block;
              position: absolute;
              top: 0;
              left: 0;
              bottom: 0;
              right: 0;
              margin: auto;
              width: 100%;
              height: 1px;
              content: '.';
              color: transparent;
              background: #333;
              visibility: none;
              opacity: 0;
              z-index: -1;
            }
            nav.shift ul li a:hover:after {
              opacity: 1;
              visibility: visible;
              height: 100%;
            }



            /* Keyframes */
            @-webkit-keyframes fill {
              0% {
                width: 0%;
                height: 1px;
              }
              50% {
                width: 100%;
                height: 1px;
              }
              100% {
                width: 100%;
                height: 100%;
                background: #333;
              }
            }

            /* Keyframes */
            @-webkit-keyframes circle {
              0% {
                width: 1px;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                margin: auto;
                height: 1px;
                z-index: -1;
                background: #eee;
                border-radius: 100%;
              }
              100% {
                background: #aaa;
                height: 5000%;
                width: 5000%;
                z-index: -1;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                border-radius: 0;
              }
            }

        </style>

    </head>
    <body>
        <div class="mx-auto my-7 w-[911px] font-normal text-right text-gray-600">
            Views: {{$views}}
        </div>
        <a href="/">
            <img src="/images/bokehvintage-logo.png" alt="Bokeh Vintage Logo" title="Bokeh Vintage Logo" class="mx-auto w-[911px] h-[183px] border-0">
        </a>
        <nav class="shift w-[911px] mx-auto">
            <ul class="flex font-normal text-lg text-gray-600">
                <li class="">
                    <a href="/" aria-label="Phots library" class="py-3 px-3 mx-2">Photos</a>
                </li>
                <li class="">
                    <a href="/login" aria-label="Login page" class="py-3 px-3 mx-2">Log in</a>
                </li>
            </ul>
        </nav>
    </body>
</html>