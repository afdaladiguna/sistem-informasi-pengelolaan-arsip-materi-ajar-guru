<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Material;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    /**
     * Menampilkan daftar materi HANYA untuk guru yang sedang login.
     */
    public function index()
    {
        $materials = Material::where('user_id', auth()->id()) // <-- KUNCI LOGIKA ADA DI SINI
            ->with(['subject', 'category'])
            ->latest()
            ->paginate(10);

        return view('guru.materials.index', compact('materials'));
    }

    /**
     * Menampilkan form untuk mengunggah materi baru.
     */
    public function create()
    {
        $subjects = Subject::all();
        $categories = Category::all();
        return view('guru.materials.create', compact('subjects', 'categories'));
    }

    /**
     * Menyimpan materi baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
        ]);

        $file = $request->file('file');
        $filePath = $file->store('materials', 'public');

        Material::create([
            'judul' => $request->judul,
            'subject_id' => $request->subject_id,
            'category_id' => $request->category_id,
            'file_path' => $filePath,
            'file_type' => $file->getClientOriginalExtension(),
            'user_id' => auth()->id(), // Otomatis menggunakan ID guru yang login
        ]);

        return redirect()->route('guru.materials.index')->with('success', 'Materi ajar berhasil diunggah.');
    }

    /**
     * Menampilkan form untuk mengedit materi.
     */
    public function edit(Material $material)
    {
        // Security check: Pastikan guru hanya bisa mengedit materi miliknya
        if ($material->user_id !== auth()->id()) {
            abort(403, 'AKSES DITOLAK');
        }

        $subjects = Subject::all();
        $categories = Category::all();
        return view('guru.materials.edit', compact('material', 'subjects', 'categories'));
    }

    /**
     * Memperbarui materi.
     */
    public function update(Request $request, Material $material)
    {
        // Security check
        if ($material->user_id !== auth()->id()) {
            abort(403, 'AKSES DITOLAK');
        }

        // ... (Logika validasi dan update sama seperti di admin controller)
        // ...
        $request->validate([
            'judul' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
        ]);

        $filePath = $material->file_path;
        $fileType = $material->file_type;

        if ($request->hasFile('file')) {
            Storage::disk('public')->delete($material->file_path);
            $file = $request->file('file');
            $filePath = $file->store('materials', 'public');
            $fileType = $file->getClientOriginalExtension();
        }

        $material->update([
            'judul' => $request->judul,
            'subject_id' => $request->subject_id,
            'category_id' => $request->category_id,
            'file_path' => $filePath,
            'file_type' => $fileType,
        ]);


        return redirect()->route('guru.materials.index')->with('success', 'Materi ajar berhasil diperbarui.');
    }

    /**
     * Menghapus materi.
     */
    public function destroy(Material $material)
    {
        // Security check
        if ($material->user_id !== auth()->id()) {
            abort(403, 'AKSES DITOLAK');
        }

        Storage::disk('public')->delete($material->file_path);
        $material->delete();

        return redirect()->route('guru.materials.index')->with('success', 'Materi ajar berhasil dihapus.');
    }
}
