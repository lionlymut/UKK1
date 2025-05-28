@php
    $user = auth()->user();
@endphp


<x-app-layout>
    <div class="min-h-screen w-full flex flex-col items-center justify-center bg-white">
        <div class="transform -translate-y-20">
            <h2 class="mi-8 text-6xl font-bold text-gray-800 drop-shadow-md text-center">Halo, {{ $user->name }}</h2>
            <h2 class="mi-8 text-4xl font-bold text-gray-800 drop-shadow-md text-center">
                Selamat Datang di Sistem Pengelolaan PKL
            </h2>
            <h3 class="text-2xl font-semibold text-gray-700 mt-8 drop-shadow-sm text-center">
                Mudah mengatur pendaftaran, pemantauan, dan laporan PKL siswa
            </h3>
        </div>
    </div>
</x-app-layout>