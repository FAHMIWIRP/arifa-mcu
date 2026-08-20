<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function index()
    {
        $mitras = Mitra::latest()->get();

        return view('mitras.index', compact('mitras'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $name = 'mitra-' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/mitra'), $name);
            $data['photo'] = $name;
        }

        Mitra::create($data);

        return redirect()->route('mitras.index')->with('success', 'Mitra berhasil ditambahkan.');
    }

    public function edit(Mitra $mitra)
    {
        return view('mitras.edit', compact('mitra'));
    }

    public function update(Request $request, Mitra $mitra)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($mitra->photo && file_exists(public_path('uploads/mitra/' . $mitra->photo))) {
                unlink(public_path('uploads/mitra/' . $mitra->photo));
            }

            $file = $request->file('photo');
            $name = 'mitra-' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/mitra'), $name);
            $data['photo'] = $name;
        }

        $mitra->update($data);

        return redirect()->route('mitras.index')->with('success', 'Mitra berhasil diperbarui.');
    }

    public function destroy(Mitra $mitra)
    {
        if ($mitra->photo && file_exists(public_path('uploads/mitra/' . $mitra->photo))) {
            unlink(public_path('uploads/mitra/' . $mitra->photo));
        }

        $mitra->delete();

        return redirect()->route('mitras.index')->with('success', 'Mitra berhasil dihapus.');
    }
}