<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('galleries.index', compact('galleries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'galeri-' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/galeri'), $name);
            $data['photo'] = $name;
        }

        Gallery::create($data);

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit(Gallery $gallery)
    {
        return view('galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($gallery->photo && file_exists(public_path('uploads/galeri/' . $gallery->photo))) {
                unlink(public_path('uploads/galeri/' . $gallery->photo));
            }

            $file = $request->file('photo');
            $name = 'galeri-' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/galeri'), $name);
            $data['photo'] = $name;
        }

        $gallery->update($data);

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->photo && file_exists(public_path('uploads/galeri/' . $gallery->photo))) {
            unlink(public_path('uploads/galeri/' . $gallery->photo));
        }

        $gallery->delete();

        return redirect()->route('galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }
}