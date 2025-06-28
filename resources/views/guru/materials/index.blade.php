<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">{{ __('Daftar Arsip Saya') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">Kembali ke Dashboard</a>
                        <a href="{{ route('guru.materials.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500">Unggah Materi Baru</a>
                    </div>
                    @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-400 rounded">{{ session('success') }}</div>
                    @endif
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3">Judul</th>
                                    <th class="px-6 py-3">Mata Pelajaran</th>
                                    <th class="px-6 py-3">Kategori</th>
                                    <th class="px-6 py-3">Diperbarui</th>
                                    <th class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($materials as $material)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">{{ $material->judul }}</td>
                                    <td class="px-6 py-4">{{ $material->subject->nama_mapel }}</td>
                                    <td class="px-6 py-4">{{ $material->category->nama_kategori }}</td>
                                    <td class="px-6 py-4">{{ $material->updated_at->diffForHumans() }}</td>
                                    <td class="px-6 py-4">
                                        <a href="{{ Storage::url($material->file_path) }}" target="_blank" class="font-medium text-green-600 hover:underline mr-3">Lihat</a>
                                        <a href="{{ route('guru.materials.edit', $material) }}" class="font-medium text-blue-600 hover:underline mr-3">Edit</a>
                                        <form action="{{ route('guru.materials.destroy', $material) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus materi ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="font-medium text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center">Anda belum mengunggah materi ajar apapun.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">{{ $materials->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>