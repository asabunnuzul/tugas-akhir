<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" href="{{ asset('logo56.png') }}" type="image/png" sizes="16x16" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-sky-100 text-slate-600" x-data="{ open: false }">
    <div class="block lg:hidden bg-sky-400">
        <x-sidebar.responsive />
    </div>
    <div class="flex">
        <aside class="z-20 hidden h-full py-10 overflow-y-auto bg-sky-400 lg:fixed lg:block lg:w-80" x-cloak>
            <x-sidebar.layout />
        </aside>
        <div class="flex-1 w-full overflow-y-auto lg:ml-80">
            <x-siakad.navbar />
            <main class="min-h-screen px-3 py-16">
                {{ $slot }}
            </main>
            <footer
                class="fixed bottom-0 w-full px-2 py-1 border-t text-slate-600 bg-white/30 backdrop-blur border-emerald-300">
                &copy; SMK Miftahul Huda {{ date('Y') }} | Assabun Nuzul
            </footer>
        </div>
    </div>
</body>

</html>
