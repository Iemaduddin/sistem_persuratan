<?php

namespace Database\Seeders;

use App\Models\Oc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class OcSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ocs = [[
            'nim' => '221141',
            'nama' => 'Fitria',
            'tempat_lahir' => 'Malang',
            'tanggal_lahir' => '2002-09-01',
            'jk' => 'Wanita',
            'prodi' => 'D4 Teknik Informatika',
            'department' => 'Eksternal',
            'no_hp' => '08233131947',
            'email' => 'fitria@gmail.com',
            'username' => 'fitria',
            'password' => 'password',
            'status_keaktifan' => 'Aktif',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]];
        foreach ($ocs as $oc) {
            Oc::create($oc);
        }
    }
}
