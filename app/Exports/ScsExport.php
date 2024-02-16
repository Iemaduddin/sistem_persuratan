<?php

namespace App\Exports;

use App\Models\Sc;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ScsExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function headings(): array
    {
        return [
            'NIF',
            'NAMA',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'JENIS KELAMIN',
            'PRODI',
            'DEPARTEMEN',
            'NO. HP',
            'EMAIL',
            'USERNAME',
            'ROLE',
        ];
    }
    public function collection()
    {
        return Sc::select('nif', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jk', 'prodi', 'department', 'no_hp', 'email', 'username', 'role')->get();
    }
}
