<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard Guru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900/50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Banner Selamat Datang untuk Guru -->
            <div class="bg-gradient-to-r from-green-600 to-teal-600 dark:from-green-800 dark:to-teal-800 rounded-lg shadow-lg overflow-hidden mb-8">
                <div class="p-6 sm:p-8">
                    <h2 class="text-3xl font-bold text-white">
                        Selamat Datang, {{ Str::words(Auth::user()->nama_lengkap, 1, '') }}!
                    </h2>
                    <p class="mt-2 text-green-100 dark:text-green-200 max-w-2xl">
                        Kelola dan bagikan materi ajar Anda dengan mudah melalui sistem arsip digital SMPN 12 Makassar.
                    </p>
                </div>
            </div>

            <!-- Bagian Statistik Cepat untuk Guru -->
            <div class="mb-8">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 mb-4">Ringkasan Anda</h3>
                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    <!-- Stat: Total Arsip Saya -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9.776c.112-.017.227-.026.344-.026h15.812c.117 0 .232.009.344.026m-16.5 0a2.25 2.25 0 0 0-1.883 2.542l.857 6a2.25 2.25 0 0 0 2.227 1.932H19.05a2.25 2.25 0 0 0 2.227-1.932l.857-6a2.25 2.25 0 0 0-1.883-2.542m-16.5 0V6A2.25 2.25 0 0 1 4.5 3.75h15A2.25 2.25 0 0 1 21.75 6v3.776" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Total Arsip Saya</dt>
                                        {{-- Menghitung materi milik user yang login --}}
                                        <dd class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ Auth::user()->materials()->count() }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat: Mata Pelajaran Tersedia -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Mapel Tersedia</dt>
                                        <dd class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ \App\Models\Subject::count() }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stat: Kategori Tersedia -->
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                        <div class="p-5">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <svg class="h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                                    </svg>
                                </div>
                                <div class="ml-5 w-0 flex-1">
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">Kategori Arsip</dt>
                                        <dd class="text-2xl font-semibold text-gray-900 dark:text-gray-100">{{ \App\Models\Category::count() }}</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian Menu Utama Guru -->
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-200 mb-4 mt-8">Menu Anda</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

                    <!-- Menu: Unggah Materi -->
                    <a href="{{ route('guru.materials.create') }}" class="group block p-6 bg-white dark:bg-gray-800 border-t-4 border-blue-500 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 dark:bg-blue-900/50">
                                <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0 3 3m-3-3-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75Z" />
                                </svg>
                            </div>
                            <h5 class="ml-4 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Unggah Materi Baru</h5>
                        </div>
                        <p class="font-normal text-gray-600 dark:text-gray-400">Tambahkan materi ajar baru ke dalam arsip pribadi Anda.</p>
                    </a>

                    <!-- Menu: Daftar Arsip Saya -->
                    <a href="{{ route('guru.materials.index') }}" class="group block p-6 bg-white dark:bg-gray-800 border-t-4 border-green-500 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="flex items-center mb-4">
                            <div class="flex items-center justify-center h-12 w-12 rounded-full bg-green-100 dark:bg-green-900/50">
                                <svg class="h-6 w-6 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                                </svg>
                            </div>
                            <h5 class="ml-4 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Daftar Arsip Saya</h5>
                        </div>
                        <p class="font-normal text-gray-600 dark:text-gray-400">Lihat dan kelola semua materi ajar yang telah Anda simpan.</p>
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>