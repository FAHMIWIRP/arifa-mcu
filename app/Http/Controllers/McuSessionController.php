<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\McuSession;
use App\Models\Patient;
use Illuminate\Http\Request;

class McuSessionController extends Controller
{
    public function reports(Request $request)
    {
        $sessions = McuSession::with('patient')
            ->when($request->search, function ($q, $s) {
                $q->whereHas('patient', fn ($qq) => $qq
                    ->where('name', 'like', "%{$s}%")
                    ->orWhere('mcu_number', 'like', "%{$s}%")
                    ->orWhere('company_name', 'like', "%{$s}%"));
            })
            ->orderByDesc('examination_date')
            ->paginate(15);

        return view('mcu.reports', compact('sessions'));
    }

    public function index(Patient $patient)
    {
        $sessions = $patient->mcuSessions()->latest()->get();
        return view('mcu.index', compact('patient', 'sessions'));
    }

    public function create(Patient $patient)
    {
        $doctors = Doctor::all();
        $session = new McuSession();
        return view('mcu.form', compact('patient', 'doctors', 'session'));
    }

    public function edit(McuSession $mcuSession)
    {
        $doctors = Doctor::all();
        $patient = $mcuSession->patient;
        $session = $mcuSession;
        return view('mcu.form', compact('patient', 'doctors', 'session'));
    }

    public function store(Request $request, Patient $patient)
    {
        $session = new McuSession();
        $session->patient_id = $patient->id;
        $this->fill($request, $session);
        $session->save();
        return redirect()->route('mcu.show', $session)->with('success', 'Data MCU berhasil disimpan.');
    }

    public function update(Request $request, McuSession $mcuSession)
    {
        $this->fill($request, $mcuSession);
        $mcuSession->save();
        return redirect()->route('mcu.show', $mcuSession)->with('success', 'Data MCU berhasil diperbarui.');
    }

    public function show(McuSession $mcuSession)
    {
        $mcuSession->load('patient', 'doctor');
        return view('mcu.show', ['mcu' => $mcuSession]);
    }

    private function fill(Request $request, McuSession $session): void
    {
        $request->validate([
            'doctor_id' => 'nullable|exists:doctors,id',
            'examination_date' => 'nullable|date',
        ]);

        $session->doctor_id = $request->doctor_id ?: null;
        $session->examination_date = $request->examination_date ?: now();
        $session->status = $request->status === 'completed' ? 'completed' : 'draft';
        $session->anamnesis = $request->input('anamnesis', []) ?: null;
        $session->physical_exam = $request->input('physical_exam', []) ?: null;
        $session->work_exposure = $request->input('work_exposure', []) ?: null;
        $session->lab_results = $request->input('lab_results', []) ?: null;
        $session->radiology_results = $request->input('radiology_results', []) ?: null;
        $session->ekg_results = $request->input('ekg_results', []) ?: null;
        $session->conclusions = $request->input('conclusions', []) ?: null;
    }
}