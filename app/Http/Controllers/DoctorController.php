<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::latest()->get();

        return view('doctors.index', compact('doctors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'sip' => 'nullable|string|max:100',
            'sk_kemenaker' => 'nullable|string|max:100',
        ]);

        Doctor::create($data);

        return redirect()->route('doctors.index')->with('success', 'Dokter berhasil ditambahkan.');
    }
}