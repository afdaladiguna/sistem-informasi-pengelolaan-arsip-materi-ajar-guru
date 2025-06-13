<x-app-layout>
    {{-- Bagian Header Halaman --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Admin') }}
            <span class="text-base text-gray-500 dark:text-gray-400 ml-2">| SMPN 12 Makassar</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="margin-bottom: 25px;">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        Sistem Informasi Pengelolaan Arsip Materi Ajar
                    </h3>
                    <p class="mt-1 text-gray-600 dark:text-gray-400">
                        Selamat datang kembali, {{ Auth::user()->nama_lengkap }}! Anda memiliki akses penuh sebagai Administrator.
                    </p>
                </div>
            </div>

            <div class="mt-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Kartu: Unggah Materi Ajar -->
                    <a href="#" class="block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transform transition-all duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900 mb-4">
                            <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                            </svg>
                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Unggah Materi</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Tambahkan materi ajar baru ke dalam sistem.</p>
                    </a>

                    <!-- Kartu: Daftar Arsip Materi -->
                    <a href="#" class="block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transform transition-all duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-100 dark:bg-green-900 mb-4">
                            <svg class="h-6 w-6 text-green-600 dark:text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar Arsip</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Lihat, kelola, dan cari semua materi yang tersimpan.</p>
                    </a>

                    <!-- Kartu: Manajemen Pengguna -->
                    <a href="#" class="block p-6 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md hover:shadow-xl hover:scale-105 transform transition-all duration-300">
                        <div class="flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 dark:bg-indigo-900 mb-4">
                            <svg class="h-6 w-6 text-indigo-600 dark:text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-2.278 1.125 1.125 0 0 0 0-1.585 9.337 9.337 0 0 0-4.121-2.278 9.38 9.38 0 0 0-2.625.372M15 19.128v-1.5A2.625 2.625 0 0 0 12.375 15H11.25m-2.625 0A2.625 2.625 0 0 0 6 17.625v1.5a2.625 2.625 0 0 0 2.625 2.625m0 0H15m-1.125-7.5h1.125a2.625 2.625 0 0 1 2.625 2.625v1.5a2.625 2.625 0 0 1-2.625 2.625h-1.125a2.625 2.625 0 0 1-2.625-2.625v-1.5A2.625 2.625 0 0 1 13.875 11.25Zm-2.625 0h-1.125a2.625 2.625 0 0 0-2.625 2.625v1.5a2.625 2.625 0 0 0 2.625 2.625h1.125a2.625 2.625 0 0 0 2.625-2.625v-1.5A2.625 2.625 0 0 0 11.25 11.25Z" />
                            </svg>
                        </div>
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Manajemen User</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Kelola akun dan role untuk admin dan guru.</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>