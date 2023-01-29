<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-1EC56D9HKS" defer></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
          gtag('config', 'G-1EC56D9HKS');
        </script>

        {{-- Local scripts --}}
        @vite('resources/css/app.css')
    </head>
    <body>
        <h1 class="text-3xl text-red-500 font-bold underline">
            Hello world!
        </h1>
    </body>
</html>