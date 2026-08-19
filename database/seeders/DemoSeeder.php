<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\McuSession;
use App\Models\Patient;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {
        $doctor = Doctor::first();

        $patient = Patient::firstOrCreate(
            ['mcu_number' => '2426'],
            [
                'name' => 'Hasbiar',
                'gender' => 'Pria',
                'nik' => '1108101011700002',
                'address' => 'Desa Cibrek Tunong Kecamatan Syamtalira Aron Kabupaten Aceh Utara',
                'phone' => '085358503670',
                'birth_date' => '1970-11-10',
                'company_name' => 'KSO NAWAKARA DERRE',
                'department' => 'Group Leader',
            ]
        );

        $normal = fn ($g) => array_fill_keys(array_keys(config("mcu.fisik.{$g}")), 'Normal');
        $tidak  = fn ($g) => array_fill_keys(array_keys(config("mcu.pajanan.{$g}")), 'Tidak');

        McuSession::updateOrCreate(
            ['patient_id' => $patient->id],
            [
                'doctor_id' => $doctor?->id,
                'examination_date' => '2023-08-09',
                'status' => 'completed',

                'anamnesis' => [
                    'riwayat_terdahulu' => [
                        'darah_tinggi' => 'Ya', 'penyakit_paru' => 'Tidak Ada', 'asam_lambung' => 'Tidak Ada',
                        'alergi' => 'Tidak Ada', 'riwayat_operasi' => 'Tidak Ada', 'riwayat_kecelakaan' => 'Tidak Ada',
                        'riwayat_rawat_rs' => 'Tidak Ada', 'hepatitis' => 'Tidak Ada', 'kencing_manis' => 'Tidak Ada',
                        'patah_tulang' => 'Tidak Ada',
                    ],
                    'riwayat_keluarga' => [
                        'kencing_manis' => 'Tidak Ada', 'darah_tinggi' => 'Ibu', 'asam_lambung' => 'Tidak Ada',
                        'alergi' => 'Tidak Ada', 'penyakit_paru' => 'Tidak Ada', 'stroke' => 'Tidak Ada',
                        'ginjal' => 'Tidak Ada', 'hemorrhoid' => 'Tidak Ada', 'kanker' => 'Tidak Ada', 'jantung' => 'Tidak Ada',
                    ],
                    'kebiasaan' => [
                        'merokok' => 'Tidak', 'merokok_lama' => '', 'merokok_banyak' => '',
                        'miras' => 'Tidak', 'miras_lama' => '', 'miras_banyak' => '',
                        'olahraga' => 'Ya',
                    ],
                    'keluhan' => '',
                ],

                'physical_exam' => [
                    'umum' => ['tb' => 167, 'bb' => 67, 'bb_ideal' => 57.0, 'imt' => 24.02, 'lingkar_perut' => 85,
                        'td_sistol' => 130, 'td_diastol' => 80, 'nadi' => 80, 'nafas' => 20, 'suhu' => 36.6],
                    'mata' => ['berkaca_mata' => 'Tidak', 'visus_kiri' => '6/6', 'visus_kanan' => '6/6',
                        'buta_warna' => 'Tidak', 'penyakit_mata' => 'Tidak', 'konjungtiva' => 'Normal', 'sklera' => 'Normal'],
                    'tht' => $normal('tht'),
                    'dada' => $normal('dada'),
                    'perut' => $normal('perut'),
                    'genitalia' => $normal('genitalia'),
                    'gerak' => $normal('gerak'),
                    'refleks' => $normal('refleks'),
                    'kelenjar' => $normal('kelenjar'),
                ],

                'work_exposure' => [
                    'fisik' => array_merge($tidak('fisik'), ['kebisingan' => 'Ya', 'suhu_panas' => 'Ya', 'suhu_dingin' => 'Ya']),
                    'kimia' => array_merge($tidak('kimia'), ['bahan_kimia' => 'Ya']),
                    'biologi' => $tidak('biologi'),
                    'psikologis' => array_merge($tidak('psikologis'), ['shift' => 'Ya']),
                    'ergonomis' => $tidak('ergonomis'),
                ],

                'lab_results' => [
                    'dokter' => 'dr. Maulida Devi Yanti, Sp. P.K',
                    'analis' => 'Eka Purnama Saputri, AMAK',
                    'golongan_darah' => 'O',
                    'hematologi' => ['hemoglobin' => 15.7, 'hematokrit' => 41.1, 'eritrosit' => 4.8, 'trombosit' => 293,
                        'leukosit' => 4.6, 'mcv' => 80.2, 'mch' => 28.0, 'mchc' => 37.2, 'rdw' => 12.1, 'led' => 15.7],
                    'hitung_jenis' => ['limfosit' => 27.2, 'granulosit' => 6.9, 'mid' => 3.5],
                    'fungsi_hati' => ['bilirubin_total' => 0.10, 'bilirubin_direct' => 0.11, 'sgot' => 10, 'sgpt' => 14],
                    'fungsi_ginjal' => ['ureum' => 14, 'creatinine' => 0.34, 'uric_acid' => 6.58],
                    'karbohidrat' => ['glukosa_puasa' => 67.8, 'kgd_2jam' => 90],
                    'lipid' => ['cholesterol_total' => 106, 'hdl' => 25, 'ldl' => 113.2, 'trigliserida' => 108],
                    'urinalisis' => ['leukosit_urin' => 'Negatif', 'nitrit' => 'Negatif', 'urobilin' => 5.5,
                        'protein' => 'Negatif', 'ph' => 5.0, 'darah' => 'Negatif', 'berat_jenis' => 1.010,
                        'keton' => 'Negatif', 'bilirubin_urin' => 'Negatif', 'glukosa_urin' => 'Negatif'],
                ],

                'radiology_results' => [
                    'dokter' => 'dr. Fajri Ismayanti, Sp. Rad',
                    'klinis' => 'MEDIKAL CHECK UP',
                    'cor' => 'Besar, bentuk dan letak jantung dalam batasan normal',
                    'pulmo' => "Corakan vascular tampak normal. Tak tampak bercak pada kedua lapangan paru. Hemidiafragma kanan setinggi costa 9 posterior. Sinus costofrenikus kanan kiri lancip.",
                    'kesan' => "- Cor tak membesar\n- Pulmo tak tampak infiltrat",
                ],

                'ekg_results' => [
                    'dokter' => 'dr. Syarifah Andayana',
                    'hasil' => 'Sinus Rhythm HR 83x/menit, Normal EKG',
                ],

                'conclusions' => [
                    'ringkasan_fisik' => 'Hipertensi',
                    'ringkasan_mata' => 'Dalam Batas Normal',
                    'ringkasan_ekg' => 'Sinus Rhythm HR 83x/menit, Normal EKG',
                    'ringkasan_lab' => 'Dalam Batas Normal',
                    'ringkasan_xray' => "1. JANTUNG : Dalam Batas Normal\n2. PARU : Dalam Batas Normal",
                    'anjuran' => "Konsumsi air mineral 2-3 liter dalam sehari\nOlahraga teratur minimal 30 menit setiap harinya 3-4x seminggu\nKonsul Dokter Perusahaan",
                    'work_fitness' => 'Laik Bekerja Sesuai Posisi dan Lokasi Saat Ini, Dengan Catatan',
                    'resiko_cardio' => 'Resiko Sedang (Skor 3)',
                    'health_degree' => 'P2',
                ],
            ]
        );
    }
}