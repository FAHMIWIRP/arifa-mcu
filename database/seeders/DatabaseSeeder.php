<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Doctor::firstOrCreate(
            ['name' => 'dr. Rajab Saputra'],
            [
                'sip' => 'NO. SIP. 503/055/2021',
                'sk_kemenaker' => 'SK KEMENAKER: 5/7118/AS.01.04/XII/2022',
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@arifamedikal.id'],
            [
                'name' => 'Admin Klinik',
                'password' => Hash::make('arifa123'),
            ]
        );
    }
}