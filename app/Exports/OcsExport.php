<?php

namespace App\Exports;

use App\Models\Oc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class OcsExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'nim',
            'nama',
            'tempat_lahir',
            'tanggal_lahir',
            'jenis_kelamin',
            'prodi',
            'departemen',
            'no_hp',
            'email',
            'username',
            'status_keaktifan',
        ];
    }
    public function collection()
    {
        return Oc::select('nim', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jk', 'prodi', 'department', 'no_hp', 'email', 'username', 'status_keaktifan')->get();
    }
}
