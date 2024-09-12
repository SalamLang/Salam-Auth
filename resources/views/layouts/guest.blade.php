<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <style>
            @font-face {
                font-family: "estedad";
                font-weight: 100;
                src: url({{ asset("assets/fonts/Estedad-Thin.ttf") }});
            }

            @font-face {
                font-family: "estedad";
                font-weight: 300;
                src: url({{ asset("assets/fonts/Estedad-Light.ttf") }});
            }

            @font-face {
                font-family: "estedad";
                font-weight: 400;
                src: url({{ asset("assets/fonts/Estedad-Medium.ttf") }});
            }

            @font-face {
                font-family: "estedad";
                font-weight: 700;
                src: url({{ asset("assets/fonts/Estedad-Bold.ttf") }});
            }

            @font-face {
                font-family: "estedad";
                font-weight: 900;
                src: url({{ asset("assets/fonts/Estedad-Black.ttf") }});
            }

            * {
                font-family: "estedad", sans-serif !important;
            }
        </style>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
