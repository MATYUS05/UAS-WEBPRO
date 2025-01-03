<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<style>
    @keyframes wiggle {
        0%, 100% {
            transform: rotate(-3deg);
        }
        50% {
            transform: rotate(3deg);
        }
    }

    .animate-wiggle {
        animation: wiggle 0.5s infinite;
    }
</style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Grow Community Church</title>
    <link rel="icon" type="image/x-icon" href="/img/logo.png">     
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <!-- Logo -->
    <a href="{{ url('/') }}">
            <img
                src="{{ asset('img/logo.png') }}"
                class=" animate-wiggle w-24 h-24 rounded-full flex items-center justify-center mt-5 laptop:mt-16 mb-4 transform transition-transform hover:scale-110"
                alt="Logo"
            />
        </a>
        <!-- Welcome Text -->
        <div class="text-center mb-4">
            <h1 class="text-darkgrey font-bold md:text-xl">
                Welcome to GROW COMMUNITY CHURCH
            </h1>
            <p class="text-gray-600 md:text-sm text-xs">
                Sign in to manage your children’s church activities
            </p>
        </div>

        <div>
            {{ $slot }}
        </div>
    </div>
</body>

</html>
