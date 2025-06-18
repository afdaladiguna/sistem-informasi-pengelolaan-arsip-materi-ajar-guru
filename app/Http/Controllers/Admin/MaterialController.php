<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Material;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with(['user', 'subject', 'category'])->latest()->paginate(10);
        return view('admin.materials.index', compact('materials'));
    }

    public function create()
    {
        $subjects = Subject::all();
        $categories = Category::all();
        return view('admin.materials.create', compact('subjects', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx|max:10240', // Maks 10MB
        ]);

        $file = $request->file('file');
        $filePath = $file->store('materials', 'public'); // Simpan di storage/app/public/materials

        Material::create([
            'judul' => $request->judul,
            'subject_id' => $request->subject_id,
            'category_id' => $request->category_id,
            'file_path' => $filePath,
            'file_type' => $file->getClientOriginalExtension(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('materials.index')->with('success', 'Materi ajar berhasil diunggah.');
    }

    public function edit(Material $material)
    {
        $subjects = Subject::all();
        $categories = Category::all();
        return view('admin.materials.edit', compact('material', 'subjects', 'categories'));
    }

    public function update(Request $request, Material $material)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:10240',
        ]);

        $filePath = $material->file_path;
        $fileType = $material->file_type;

        if ($request->hasFile('file')) {
            // Hapus file lama
            Storage::disk('public')->delete($material->file_path);

            // Unggah file baru
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

        return redirect()->route('materials.index')->with('success', 'Materi ajar berhasil diperbarui.');
    }

    public function destroy(Material $material)
    {
        // Hapus file dari storage
        Storage::disk('public')->delete($material->file_path);
        // Hapus record dari database
        $material->delete();

        return redirect()->route('materials.index')->with('success', 'Materi ajar berhasil dihapus.');
    }
}
