<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = Patient::query()
            ->when($request->search, function ($q, $s) {
                $q->where('name', 'like', "%{$s}%")
                  ->orWhere('mcu_number', 'like', "%{$s}%")
                  ->orWhere('company_name', 'like', "%{$s}%");
            })
            ->latest()
            ->paginate(10);

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create', ['patient' => new Patient]);
    }

    public function store(Request $request)
    {
        Patient::create($request->validate($this->rules()));
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil disimpan.');
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $patient->update($request->validate($this->rules($patient->id)));
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil diperbarui.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect()->route('patients.index')->with('success', 'Data pasien berhasil dihapus.');
    }

    private function rules(?int $ignoreId = null): array
    {
        return [
            'mcu_number' => ['required', 'string', 'max:30', Rule::unique('patients', 'mcu_number')->ignore($ignoreId)],
            'name' => ['required', 'string', 'max:100'],
            'gender' => ['required', 'in:Pria,Wanita'],
            'nik' => ['nullable', 'string', 'max:20'],
            'birth_date' => ['nullable', 'date'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:20'],
            'company_name' => ['nullable', 'string', 'max:100'],
            'department' => ['nullable', 'string', 'max:100'],
        ];
    }
}