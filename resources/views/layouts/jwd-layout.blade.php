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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body
    x-data="{open: false, dark:true}"
    x-init="
    htmlClasses = document.querySelector('html').classList;
    dark = window.localStorage.getItem('dark') ? JSON.parse(window.localStorage.getItem('dark'))
    : ( !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches )
    if(dark) htmlClasses.add('dark')
    else htmlClasses.remove('dark');
    "
    :class="{'overflow-hidden': open}" class="font-sans antialiased text-gray-900">
        <div class="min-h-screen bg-gradient-to-br from-gray-100 to-slate-50 text-gray-700 dark:from-gray-800 dark:to-slate-700 dark:text-white">
            <x-navbar />

            <!-- Page Content -->
            <main class="mx-6 pt-28 pb-12">
                {{ $slot }}
            </main>
        </div>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    iziToast.success({
                        title: 'Berhasil',
                        message: '{{ session('success') }}',
                        position: 'topRight'
                    })
                })
            </script>
        @endif
    </body>
</html>
