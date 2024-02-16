<?php

namespace App\Imports;

use App\Models\Stakeholder;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StakeholdersImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Stakeholder::create([
                'nip' => $row['nip'],
                'nim' => $row['nim'],
                'nama' => $row['nama'],
                'jabatan' => $row['jabatan'],
            ]);
        }
    }
}
