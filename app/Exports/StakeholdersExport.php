<?php

namespace App\Exports;

use App\Models\Stakeholder;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StakeholdersExport implements FromCollection, WithHeadings
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */

    public function headings(): array
    {
        return [
            'NIP',
            'NIM',
            'NAMA',
            'JABATAN',
        ];
    }
    public function collection()
    {
        return Stakeholder::select('nip', 'nim', 'nama', 'jabatan')->get();
    }
}
