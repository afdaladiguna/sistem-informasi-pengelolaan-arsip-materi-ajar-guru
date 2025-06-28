<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Edit Materi Ajar') }}</h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('guru.materials.update', $material) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Judul -->
                        <div>
                            <x-input-label for="judul" value="Judul Materi" />
                            <x-text-input id="judul" class="block mt-1 w-full" type="text" name="judul" :value="old('judul', $material->judul)" required />
                        </div>
                        <!-- Mata Pelajaran -->
                        <div class="mt-4">
                            <x-input-label for="subject_id" value="Mata Pelajaran" />
                            <select name="subject_id" id="subject_id" class="block mt-1 w-full ...">
                                @foreach ($subjects as $subject)
                                <option value="{{ $subject->id }}" @selected(old('subject_id', $material->subject_id) == $subject->id)>{{ $subject->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Kategori -->
                        <div class="mt-4">
                            <x-input-label for="category_id" value="Kategori" />
                            <select name="category_id" id="category_id" class="block mt-1 w-full ...">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $material->category_id) == $category->id)>{{ $category->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- File Upload -->
                        <div class="mt-4">
                            <x-input-label for="file" value="Unggah File Baru (Opsional)" />
                            <p class="text-sm text-gray-500">File saat ini: <a href="{{ Storage::url($material->file_path) }}" target="_blank" class="text-blue-500 hover:underline">{{ Str::after($material->file_path, '/') }}</a></p>
                            <input type="file" name="file" id="file" class="block w-full ...">
                            <p class="mt-1 text-sm text-gray-500">Kosongkan jika tidak ingin mengganti file.</p>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('dashboard') }}" class="... ">Batal</a>
                            <x-primary-button class="ms-4">Update</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>