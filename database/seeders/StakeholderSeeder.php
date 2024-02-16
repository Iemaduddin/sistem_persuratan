<?php

namespace Database\Seeders;

use App\Models\Stakeholder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class StakeholderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stakeholder = [
            [
                'nip' => '197109151999031001',
                'nama' => 'Dr. Eng. Anggit Murdani, S.T., M.Eng.',
                'jabatan' => 'Wakil Direktur III',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nip' => '198010102005011001',
                'nama' => 'Dr. Eng. Rosa Andrie Asmara, S.T., M.T.',
                'jabatan' => 'Ketua Jurusan TI',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nip' => '199111282019031013',
                'nama' => 'Muhammad Afif Hendrawan, S.Kom., M.T.',
                'jabatan' => 'Dosen Pembina Kemahasiswaan',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2142620079',
                'nama' => 'Ahmad Asas Hakiki',
                'jabatan' => 'Presiden BEM',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2141720055',
                'nama' => 'Iemaduddin',
                'jabatan' => 'Ketua Umum HMTI',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241720007',
                'nama' => 'Ratnasari',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241720253',
                'nama' => 'Fahruddin Zaim Ibrahim W',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241720081',
                'nama' => 'Fadhlurohman Al Farabi',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241760122',
                'nama' => 'Chikal Nazmi Mahira',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241720052',
                'nama' => 'Thoriq Fathuhrrozi',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241720224',
                'nama' => 'Athallah Adjani Prasanna B.',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241720075',
                'nama' => 'Athriya Genferin',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241720176',
                'nama' => 'Muhammad Rifky Harto B.',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241760100',
                'nama' => 'Arif Prasojo',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241720246',
                'nama' => 'Maulia Balqis Ansya Aulia',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nim' => '2241760082',
                'nama' => 'Rifqi Sabilillah',
                'jabatan' => 'Ketua Pelaksana',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        foreach ($stakeholder as $sh) {
            Stakeholder::create($sh);
        }
    }
}
