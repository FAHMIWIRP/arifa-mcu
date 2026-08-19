<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'mcu_number', 'name', 'gender', 'nik', 'address',
        'phone', 'birth_date', 'company_name', 'department',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function mcuSessions()
    {
        return $this->hasMany(McuSession::class);
    }

    // Usia terhadap hari ini (untuk tabel Data Pasien)
    protected function ageDetail(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->ageAt(now())
        );
    }

    // Usia terhadap tanggal tertentu (untuk laporan, sesuai PDF)
    public function ageAt($date): string
    {
        if (!$this->birth_date) return '-';

        $d = $this->birth_date->diff($date);

        return "{$d->y} Tahun {$d->m} Bulan {$d->d} Hari";
    }
}