<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
</head>
<body class="font-sans antialiased h-screen overflow-hidden">


    <div class="flex flex-col h-full">
        <!-- Navigation -->
        <div class="shrink-0">
            @livewire('navigation-menu')
        </div>


        <!-- Optional Header -->
        @if (isset($header))
            <header class="shrink-0">
                <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif


        <!-- Page Content -->
        <main class="flex-grow overflow-hidden">
            {{ $slot }}
        </main>
    </div>


    @livewireScripts
</body>
</html>





