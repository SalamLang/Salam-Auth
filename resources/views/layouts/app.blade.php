<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css'])

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
<body class="font-sans antialiased">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
</div>

@vite(['resources/js/app.js'])
@yield("script")
</body>
</html>
