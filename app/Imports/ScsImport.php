<?php

namespace App\Imports;

use App\Models\Sc;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ScsImport implements ToCollection, WithHeadingRow
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $sc = Sc::create([
                'nama' => $row['nama'],
                'nif' => $row['nif'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'jk' => $row['jenis_kelamin'],
                'prodi' => $row['prodi'],
                'no_hp' => $row['no_hp'],
                'department' => $row['departemen'],
                'role' => $row['role'],
                'email' => $row['email'],
                'username' => $row['username'],
                'password' => $row['password'],
            ]);
            $sc_id = $sc->id;

            if ($row['role'] == 'Sekum' && $row['username'] != null && $row['password'] != null) {
                User::create([
                    'role_id' => 2,
                    'sc_id' => $sc_id,
                    'email' => $row['email'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                ]);
            } elseif ($row['role'] == 'SC Kestari' && $row['username'] != null && $row['password'] != null) {
                User::create([
                    'role_id' => 3,
                    'sc_id' => $sc_id,
                    'email' => $row['email'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                ]);
            }
        }
    }
}
