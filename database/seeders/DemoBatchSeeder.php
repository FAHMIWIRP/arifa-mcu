<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\McuSession;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DemoBatchSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = Doctor::first();

        $people = [
            [
                'mcu_number' => '2427',
                'patient' => ['name' => 'Farid Anwar', 'gender' => 'Pria', 'nik' => '1108011203980001', 'address' => 'Jl. Merdeka No. 12, Lhokseumawe', 'phone' => '081260001111', 'birth_date' => '1998-03-12', 'company_name' => 'PT Potensi Karya Mandiri', 'department' => 'Operator'],
                'date' => '2026-07-06',
                'umum' => ['tb' => 168, 'bb' => 60, 'lingkar_perut' => 78, 'td_sistol' => 110, 'td_diastol' => 70],
                'golongan_darah' => 'B',
                'conclusions' => [
                    'ringkasan_fisik' => 'Dalam Batas Normal', 'ringkasan_mata' => 'Dalam Batas Normal',
                    'ringkasan_ekg' => 'Sinus Rhythm, Normal EKG', 'ringkasan_lab' => 'Dalam Batas Normal',
                    'ringkasan_xray' => "1. JANTUNG : Dalam Batas Normal\n2. PARU : Dalam Batas Normal",
                    'anjuran' => 'Pertahankan pola hidup sehat dan olahraga teratur.',
                    'work_fitness' => 'Laik Bekerja Sesuai Posisi dan Lokasi Saat Ini',
                    'resiko_cardio' => 'Resiko Rendah (Skor 1)', 'health_degree' => 'P1',
                ],
            ],
            [
                'mcu_number' => '2428',
                'patient' => ['name' => 'Dimas Prayogi', 'gender' => 'Pria', 'nik' => '1108020707930002', 'address' => 'Desa Ujong Blang, Banda Sakti, Lhokseumawe', 'phone' => '081260002222', 'birth_date' => '1993-07-25', 'company_name' => 'KSO NAWAKARA DERRE', 'department' => 'Teknisi'],
                'date' => '2026-07-13',
                'umum' => ['tb' => 172, 'bb' => 78, 'lingkar_perut' => 92, 'td_sistol' => 128, 'td_diastol' => 84],
                'kebiasaan' => ['merokok' => 'Ya', 'merokok_lama' => '8 tahun', 'merokok_banyak' => '10 batang/hari', 'olahraga' => 'Tidak'],
                'lab' => ['lipid' => ['cholesterol_total' => 246, 'hdl' => 32, 'ldl' => 172, 'trigliserida' => 235]],
                'conclusions' => [
                    'ringkasan_fisik' => 'Dalam Batas Normal', 'ringkasan_mata' => 'Dalam Batas Normal',
                    'ringkasan_ekg' => 'Sinus Rhythm, Normal EKG', 'ringkasan_lab' => 'Dislipidemia',
                    'ringkasan_xray' => "1. JANTUNG : Dalam Batas Normal\n2. PARU : Dalam Batas Normal",
                    'anjuran' => "Kurangi makanan berlemak dan gorengan\nBerhenti merokok\nOlahraga aerobik 30 menit, 4x seminggu\nCek ulang profil lipid 3 bulan lagi",
                    'work_fitness' => 'Laik Bekerja Sesuai Posisi dan Lokasi Saat Ini, Dengan Catatan',
                    'resiko_cardio' => 'Resiko Sedang (Skor 3)', 'health_degree' => 'P3',
                ],
            ],
            [
                'mcu_number' => '2429',
                'patient' => ['name' => 'Jean Zahara', 'gender' => 'Wanita', 'nik' => '1108035101000003', 'address' => 'Jl. Kenanga No. 5, Muara Dua, Lhokseumawe', 'phone' => '081260003333', 'birth_date' => '2000-01-17', 'company_name' => 'PT Arifa Medika Sejahtera', 'department' => 'Admin'],
                'date' => '2026-07-20',
                'umum' => ['tb' => 158, 'bb' => 52, 'lingkar_perut' => 70, 'td_sistol' => 100, 'td_diastol' => 70],
                'lab' => ['hematologi' => ['hemoglobin' => 11.2, 'hematokrit' => 34]],
                'conclusions' => [
                    'ringkasan_fisik' => 'Dalam Batas Normal', 'ringkasan_mata' => 'Dalam Batas Normal',
                    'ringkasan_ekg' => 'Sinus Rhythm, Normal EKG', 'ringkasan_lab' => 'Anemia ringan',
                    'ringkasan_xray' => "1. JANTUNG : Dalam Batas Normal\n2. PARU : Dalam Batas Normal",
                    'anjuran' => "Konsumsi makanan kaya zat besi (daging merah, bayam, hati)\nMinum tablet tambah darah 1x seminggu\nCek ulang hemoglobin 1 bulan lagi",
                    'work_fitness' => 'Laik Bekerja Sesuai Posisi dan Lokasi Saat Ini, Dengan Catatan',
                    'resiko_cardio' => 'Resiko Rendah (Skor 1)', 'health_degree' => 'P2',
                ],
            ],
            [
                'mcu_number' => '2430',
                'patient' => ['name' => 'Muhammad Ariq', 'gender' => 'Pria', 'nik' => '1108040511820004', 'address' => 'Desa Blang Pulo, Muara Satu, Lhokseumawe', 'phone' => '081260004444', 'birth_date' => '1982-11-05', 'company_name' => 'PT Aceh Energi Prima', 'department' => 'Supervisor'],
                'date' => '2026-07-27',
                'umum' => ['tb' => 165, 'bb' => 80, 'lingkar_perut' => 98, 'td_sistol' => 150, 'td_diastol' => 95],
                'terdahulu' => ['darah_tinggi' => 'Ya', 'kencing_manis' => 'Ya'],
                'lab' => ['karbohidrat' => ['glukosa_puasa' => 138, 'kgd_2jam' => 210]],
                'conclusions' => [
                    'ringkasan_fisik' => 'Hipertensi', 'ringkasan_mata' => 'Dalam Batas Normal',
                    'ringkasan_ekg' => 'Sinus Rhythm HR 90x/menit', 'ringkasan_lab' => 'Gula darah tinggi',
                    'ringkasan_xray' => "1. JANTUNG : Dalam Batas Normal\n2. PARU : Dalam Batas Normal",
                    'anjuran' => "Konsul dokter penyakit dalam\nMinum obat teratur sesuai anjuran dokter\nDiet rendah gula dan garam\nMonitor tekanan darah dan gula darah rutin",
                    'work_fitness' => 'Laik Bekerja Dengan Penyesuaian dan atau Pembatasan Pekerjaan',
                    'resiko_cardio' => 'Resiko Tinggi (Skor 5)', 'health_degree' => 'P5',
                ],
            ],
            [
                'mcu_number' => '2431',
                'patient' => ['name' => 'Dhanilson Adriano Manik', 'gender' => 'Pria', 'nik' => '1108052305960005', 'address' => 'Jl. Perdagangan No. 8, Banda Sakti, Lhokseumawe', 'phone' => '081260005555', 'birth_date' => '1996-05-30', 'company_name' => 'CV Samudra Logistik', 'department' => 'Driver'],
                'date' => '2026-08-03',
                'umum' => ['tb' => 170, 'bb' => 66, 'lingkar_perut' => 80, 'td_sistol' => 118, 'td_diastol' => 76],
                'conclusions' => [
                    'ringkasan_fisik' => 'Dalam Batas Normal', 'ringkasan_mata' => 'Dalam Batas Normal',
                    'ringkasan_ekg' => 'Sinus Rhythm, Normal EKG', 'ringkasan_lab' => 'Dalam Batas Normal',
                    'ringkasan_xray' => "1. JANTUNG : Dalam Batas Normal\n2. PARU : Dalam Batas Normal",
                    'anjuran' => 'Pertahankan pola hidup sehat dan istirahat cukup.',
                    'work_fitness' => 'Laik Bekerja Sesuai Posisi dan Lokasi Saat Ini',
                    'resiko_cardio' => 'Resiko Rendah (Skor 0)', 'health_degree' => 'P1',
                ],
            ],
            [
                'mcu_number' => '2432',
                'patient' => ['name' => 'Vicky Aldiano Sasmita', 'gender' => 'Pria', 'nik' => '1108060909900006', 'address' => 'Desa Hagu Teungoh, Banda Sakti, Lhokseumawe', 'phone' => '081260006666', 'birth_date' => '1990-09-09', 'company_name' => 'PT Potensi Karya Mandiri', 'department' => 'Warehouse'],
                'date' => '2026-08-10',
                'umum' => ['tb' => 174, 'bb' => 82, 'lingkar_perut' => 94, 'td_sistol' => 126, 'td_diastol' => 82],
                'lab' => ['fungsi_ginjal' => ['uric_acid' => 8.6], 'lipid' => ['trigliserida' => 195]],
                'conclusions' => [
                    'ringkasan_fisik' => 'Dalam Batas Normal', 'ringkasan_mata' => 'Dalam Batas Normal',
                    'ringkasan_ekg' => 'Sinus Rhythm, Normal EKG', 'ringkasan_lab' => 'Hiperurisemia',
                    'ringkasan_xray' => "1. JANTUNG : Dalam Batas Normal\n2. PARU : Dalam Batas Normal",
                    'anjuran' => "Batasi makanan tinggi purin (jeroan, seafood, emping)\nPerbanyak minum air mineral 2-3 liter/hari\nCek ulang asam urat 1 bulan lagi",
                    'work_fitness' => 'Laik Bekerja Sesuai Posisi dan Lokasi Saat Ini, Dengan Catatan',
                    'resiko_cardio' => 'Resiko Sedang (Skor 2)', 'health_degree' => 'P3',
                ],
            ],
        ];

        foreach ($people as $d) {
            $patient = Patient::firstOrCreate(['mcu_number' => $d['mcu_number']], $d['patient']);

            McuSession::updateOrCreate(['patient_id' => $patient->id], $this->session($doctor, $d));
        }
    }

    private function normals(string $group): array
    {
        return array_fill_keys(array_keys(config("mcu.fisik.{$group}")), 'Normal');
    }

    private function tidak(string $group): array
    {
        return array_fill_keys(array_keys(config("mcu.pajanan.{$group}")), 'Tidak');
    }

    private function session(?Doctor $doctor, array $d): array
    {
        $tb = $d['umum']['tb'];
        $bb = $d['umum']['bb'];

        $umum = array_merge([
            'bb_ideal' => $tb - 110,
            'imt' => round($bb / pow($tb / 100, 2), 2),
            'nadi' => 80, 'nafas' => 20, 'suhu' => 36.5,
        ], $d['umum']);

        $lab = [
            'hematologi' => ['hemoglobin' => 14.5, 'hematokrit' => 42, 'eritrosit' => 4.9, 'trombosit' => 260, 'leukosit' => 6.0, 'mcv' => 88, 'mch' => 29.5, 'mchc' => 34.5, 'rdw' => 13, 'led' => 10],
            'hitung_jenis' => ['limfosit' => 32, 'granulosit' => 4.5, 'mid' => 5],
            'fungsi_hati' => ['bilirubin_total' => 0.6, 'bilirubin_direct' => 0.2, 'sgot' => 20, 'sgpt' => 25],
            'fungsi_ginjal' => ['ureum' => 25, 'creatinine' => 0.9, 'uric_acid' => 5.5],
            'karbohidrat' => ['glukosa_puasa' => 88, 'kgd_2jam' => 120],
            'lipid' => ['cholesterol_total' => 170, 'hdl' => 45, 'ldl' => 110, 'trigliserida' => 120],
            'urinalisis' => ['leukosit_urin' => 'Negatif', 'nitrit' => 'Negatif', 'urobilin' => 8, 'protein' => 'Negatif', 'ph' => 6, 'darah' => 'Negatif', 'berat_jenis' => 1.015, 'keton' => 'Negatif', 'bilirubin_urin' => 'Negatif', 'glukosa_urin' => 'Negatif'],
        ];
        foreach ($d['lab'] ?? [] as $g => $vals) {
            $lab[$g] = array_merge($lab[$g], $vals);
        }

        return [
            'doctor_id' => $doctor?->id,
            'examination_date' => $d['date'],
            'status' => 'completed',
            'anamnesis' => [
                'riwayat_terdahulu' => array_merge(array_fill_keys(array_keys(config('mcu.riwayat_terdahulu')), 'Tidak Ada'), $d['terdahulu'] ?? []),
                'riwayat_keluarga' => array_merge(array_fill_keys(array_keys(config('mcu.riwayat_keluarga')), 'Tidak Ada'), $d['keluarga'] ?? []),
                'kebiasaan' => array_merge(['merokok' => 'Tidak', 'merokok_lama' => '', 'merokok_banyak' => '', 'miras' => 'Tidak', 'miras_lama' => '', 'miras_banyak' => '', 'olahraga' => 'Ya'], $d['kebiasaan'] ?? []),
                'keluhan' => $d['keluhan'] ?? '',
            ],
            'physical_exam' => [
                'umum' => $umum,
                'mata' => $this->normals('mata'), 'tht' => $this->normals('tht'), 'dada' => $this->normals('dada'),
                'perut' => $this->normals('perut'), 'genitalia' => $this->normals('genitalia'),
                'gerak' => $this->normals('gerak'), 'refleks' => $this->normals('refleks'), 'kelenjar' => $this->normals('kelenjar'),
            ],
            'work_exposure' => [
                'fisik' => array_merge($this->tidak('fisik'), $d['pajanan']['fisik'] ?? []),
                'kimia' => array_merge($this->tidak('kimia'), $d['pajanan']['kimia'] ?? []),
                'biologi' => array_merge($this->tidak('biologi'), $d['pajanan']['biologi'] ?? []),
                'psikologis' => array_merge($this->tidak('psikologis'), $d['pajanan']['psikologis'] ?? []),
                'ergonomis' => array_merge($this->tidak('ergonomis'), $d['pajanan']['ergonomis'] ?? []),
            ],
            'lab_results' => array_merge([
                'dokter' => 'dr. Maulida Devi Yanti, Sp. P.K',
                'analis' => 'Eka Purnama Saputri, AMAK',
                'golongan_darah' => $d['golongan_darah'] ?? 'O',
            ], $lab),
            'radiology_results' => [
                'dokter' => 'dr. Fajri Ismayanti, Sp. Rad',
                'klinis' => 'MEDICAL CHECK UP',
                'cor' => 'Besar, bentuk dan letak jantung dalam batasan normal',
                'pulmo' => 'Corakan vascular tampak normal. Tak tampak bercak pada kedua lapangan paru.',
                'kesan' => "- Cor tak membesar\n- Pulmo tak tampak infiltrat",
            ],
            'ekg_results' => [
                'dokter' => 'dr. Syarifah Andayana',
                'hasil' => 'Sinus Rhythm, Normal EKG',
            ],
            'conclusions' => $d['conclusions'],
        ];
    }
}