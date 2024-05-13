<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nama' => 'Admin',
                'nim' => '1',
                'department' => '-',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => 1,
                'status_keaktifan' => 'Aktif',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama' => 'Serli Putri Maharani',
                'nif' => '20230000',
                'nim' => '214170001',
                'department' => 'BPH Umum',
                'username' => 'sekum',
                'email' => 'sekum@gmail.com',
                'role_id' => 2,
                'status_keaktifan' => 'Aktif',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nama' => 'Manda',
                'nim' => '214170002',
                'department' => 'PSDM',
                'username' => 'manda',
                'email' => 'manda@gmail.com',
                'role_id' => 3,
                'status_keaktifan' => 'Aktif',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
