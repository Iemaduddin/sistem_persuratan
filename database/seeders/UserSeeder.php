<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'role_id' => 1,
                'password' => 'password',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'username' => 'sekum',
                'email' => 'sekum@gmail.com',
                'role_id' => 2,
                'password' => 'password',
                'sc_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'username' => 'sc_kestari',
                'email' => 'sc_kestari@gmail.com',
                'role_id' => 3,
                'password' => 'password',
                'sc_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'username' => 'fitria',
                'email' => 'fitria@gmail.com',
                'role_id' => 4,
                'password' => 'password',
                'oc_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
