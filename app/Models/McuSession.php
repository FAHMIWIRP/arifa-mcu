<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class McuSession extends Model
{
    protected $fillable = [
        'patient_id', 'doctor_id', 'examination_date', 'status',
        'anamnesis', 'physical_exam', 'work_exposure',
        'lab_results', 'radiology_results', 'ekg_results', 'conclusions',
    ];

    protected $casts = [
        'examination_date' => 'date',
        'anamnesis' => 'array',
        'physical_exam' => 'array',
        'work_exposure' => 'array',
        'lab_results' => 'array',
        'radiology_results' => 'array',
        'ekg_results' => 'array',
        'conclusions' => 'array',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}