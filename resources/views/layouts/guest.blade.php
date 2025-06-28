<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMPN 12 Makassar | Sistem Pengelola Arsip</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:flex-row">
        <!-- Kolom Kiri: Branding & Informasi -->
        <div class="w-full sm:w-1/2 bg-blue-600 dark:bg-blue-800 text-white flex flex-col justify-center items-center p-12 text-center">
            {{-- Wadah logo dengan background putih --}}
            <div class="bg-white p-4 rounded-full shadow-lg mb-6">
                <img src="{{ asset('build/assets/logo.png') }}" alt="Logo SMPN 12 Makassar" class="h-20 w-20">
            </div>

            <h1 class="text-2xl font-bold mb-2">SMPN 12 MAKASSAR</h1>
            <p class="text-lg font-light">Sistem Informasi Pengelolaan Arsip Materi Ajar</p>
        </div>

        <!-- Kolom Kanan: Form Login -->
        <div class="w-full sm:w-1/2 flex flex-col justify-center items-center bg-gray-100 dark:bg-gray-900 px-6 py-12">
            {{ $slot }}
        </div>
    </div>
</body>

</html>