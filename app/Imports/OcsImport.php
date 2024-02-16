<?php

namespace App\Imports;

use App\Models\Oc;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class OcsImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $oc = Oc::create([
                'nama' => $row['nama'],
                'nim' => $row['nim'],
                'tempat_lahir' => $row['tempat_lahir'],
                'tanggal_lahir' => $row['tanggal_lahir'],
                'jk' => $row['jenis_kelamin'],
                'prodi' => $row['prodi'],
                'no_hp' => $row['no_hp'],
                'department' => $row['departemen'],
                'email' => $row['email'],
                'username' => $row['username'],
                'password' => $row['password'],
                'status_keaktifan' => $row['status_keaktifan'],
            ]);
            $oc_id = $oc->id;

            if ($row['username'] != null && $row['password'] != null) {
                User::create([
                    'role_id' => 4,
                    'oc_id' => $oc_id,
                    'email' => $row['email'],
                    'username' => $row['username'],
                    'password' => $row['password'],
                ]);
            }
        }
    }
}
