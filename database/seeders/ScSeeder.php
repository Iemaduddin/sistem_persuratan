<?php

namespace Database\Seeders;

use App\Models\Sc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class ScSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scs = [
            [
                'nif' => '212309003',
                'nama' => 'Serli Putri Maharani',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2002-09-01',
                'jk' => 'Wanita',
                'prodi' => 'D4 Teknik Informatika',
                'department' => 'BPH Umum',
                'no_hp' => '082331311947',
                'role' => 'Sekum',
                'email' => 'sekum@gmail.com',
                'username' => 'sekum',
                'password' => 'password',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nif' => '212309012',
                'nama' => 'Annisa Nabila',
                'tempat_lahir' => 'Malang',
                'tanggal_lahir' => '2002-09-01',
                'jk' => 'Wanita',
                'prodi' => 'D4 Teknik Informatika',
                'department' => 'PSDM',
                'no_hp' => '082331311947',
                'role' => 'SC Kestari',
                'email' => 'sc_kestari@gmail.com',
                'username' => 'sc_kestari',
                'password' => 'password',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        foreach ($scs as $sc) {
            Sc::create($sc);
        }
    }
}
