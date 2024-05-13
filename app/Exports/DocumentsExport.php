<?php

namespace App\Exports;

use App\Models\Sender;
use App\Models\Document;
use App\Models\Department;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithEvents;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DocumentsExport implements WithMultipleSheets
{
    protected $fieldsHmti = [
        'fields' => ['category', 'department_id', 'event', 'created_at', 'description'],
        'relation' => false, // Ada hubungan yang perlu dimasukkan
        'header' => ['Kategori', 'Departemen', 'Proker', 'Tanggal', 'Keterangan'],
    ];
    protected $fieldsNaungan = [
        'fields' => ['category', 'event', 'created_at', 'description'],
        'relation' => false, // Ada hubungan yang perlu dimasukkan
        'header' => ['Kategori', 'Proker',  'Tanggal', 'Keterangan'],
    ];

    public function sheets(): array
    {
        $sheets = [];
        // Array asosiatif untuk menentukan kategori dan kueri yang sesuai
        $categories = [
            'Surat Masuk' => [
                'fields' => ['no_surat', 'sender_id', 'event', 'created_at', 'description'],
                'relation' => true, // Tidak ada hubungan yang perlu dimasukkan
                'header' => ['Nomor Surat', 'Pengirim', 'Proker/Agenda', 'Tanggal', 'Keterangan'],
            ],
            'Surat Keluar' => [
                'fields' => ['no_surat', 'department_id', 'allotment', 'eventCategory', 'event', 'created_at', 'description'],
                'relation' => true, // Ada hubungan yang perlu dimasukkan
                'header' => ['Nomor Surat', 'Departemen', 'Peruntukkan', 'Kategori Event', 'Proker/Agenda', 'Tanggal', 'Keterangan'],
            ],
            'Proposal AA' =>
            $this->fieldsHmti,
            'Proposal Real' =>
            $this->fieldsHmti,
            'LPJ AA' =>
            $this->fieldsHmti,
            'LPJ Real' =>
            $this->fieldsHmti,
            'Proposal WRI' =>
            $this->fieldsNaungan,
            'LPJ WRI' =>
            $this->fieldsNaungan,
            'Proposal ITDEC' =>
            $this->fieldsNaungan,
            'LPJ ITDEC' =>
            $this->fieldsNaungan,
        ];

        // Variabel untuk menyimpan data Proposal HMTI
        $proposalHMTIData = collect(); // Inisialisasi koleksi kosong
        $lpjHMTIData = collect(); // Inisialisasi koleksi kosong
        $wriData = collect(); // Inisialisasi koleksi kosong
        $itdecData = collect(); // Inisialisasi koleksi kosong

        foreach ($categories as $category => $config) {
            // Jika kategori adalah Proposal AA atau Proposal Real, tambahkan data ke Proposal HMTI
            if ($category === 'Proposal AA' || $category === 'Proposal Real') {
                $proposalData = Document::select($config['fields'])->where('category', $category)->get();
                $proposalHMTIData = $proposalHMTIData->merge($proposalData);
            } elseif ($category === 'LPJ AA' || $category === 'LPJ Real') {
                $lpjData = Document::select($config['fields'])->where('category', $category)->get();
                $lpjHMTIData = $lpjHMTIData->merge($lpjData);
            } elseif ($category === 'Proposal WRI' || $category === 'LPJ WRI') {
                $documentWriData = Document::select($config['fields'])->where('category', $category)->get();
                $wriData = $wriData->merge($documentWriData);
            } elseif ($category === 'Proposal ITDEC' || $category === 'LPJ ITDEC') {
                $documentItdecData = Document::select($config['fields'])->where('category', $category)->get();
                $itdecData = $itdecData->merge($documentItdecData);
            } else {
                // Jika bukan Proposal AA atau Proposal Real, tambahkan sheet biasa
                $dataAll = Document::select($config['fields'])->where('category', $category)->get();
                $sheets[] = new CategorySheet($category, $dataAll->toArray(), $config['relation'], $config['header']);
            }
        }

        // Tambahkan sheet untuk Proposal HMTI dengan data yang sudah digabungkan
        $sheets[] = new CategorySheet('Proposal HMTI', $proposalHMTIData->toArray(), true, $this->fieldsHmti['header']);
        $sheets[] = new CategorySheet('LPJ HMTI', $lpjHMTIData->toArray(), true, $this->fieldsHmti['header']);
        $sheets[] = new CategorySheet('Proposal-LPJ WRI', $wriData->toArray(), true, $this->fieldsNaungan['header']);
        $sheets[] = new CategorySheet('Proposal-LPJ ITDEC', $itdecData->toArray(), true, $this->fieldsNaungan['header']);
        return $sheets;
    }
}

class CategorySheet implements FromCollection, WithHeadings, ShouldAutoSize, WithTitle, WithEvents
{
    protected $category;
    protected $fields;
    protected $includeRelation;
    protected $header;

    public function __construct(string $category, array $fields, bool $includeRelation, array $header)
    {
        $this->category = $category;
        $this->fields = $fields;
        $this->includeRelation = $includeRelation;
        $this->header = $header;
    }
    public function headings(): array
    {
        return $this->header;
    }

    public function collection()
    {

        // Lakukan seleksi kolom dengan benar, termasuk kolom sender_id
        $query = Document::select(array_keys($this->fields[0]))->where('category', $this->category);
        // Jika field yang diminta adalah sender_id, tambahkan relasi sender
        if (in_array('sender_id', array_keys($this->fields[0]))) {
            $query->with('sender');
        }

        // Jika ada relasi department yang diminta, tambahkan relasi department
        if (in_array('department_id', array_keys($this->fields[0]))) {
            $query->with('department');
        }

        $data = collect($this->fields)->groupBy('category');

        // Jika field created_at ada dalam data, ambil nama departemennya
        if (in_array('created_at', array_keys($this->fields[0]))) {
            $data = $data->map(function ($groupedData) {
                return $groupedData->map(function ($item) {
                    $item['created_at'] = \Carbon\Carbon::parse($item['created_at'])->translatedFormat('l, j F Y H:i:s');
                    return $item;
                });
            });
        }
        // Jika field department_id ada dalam data, ambil nama departemennya
        if (in_array('department_id', array_keys($this->fields[0]))) {
            $data = $data->map(function ($groupedData) {
                return $groupedData->map(function ($item) {
                    $item['department_id'] = optional(Department::find($item['department_id']))->name;
                    return $item;
                });
            });
        }

        // Jika field sender_id ada dalam data, ambil nama pengirimnya
        if (in_array('sender_id', array_keys($this->fields[0]))) {
            $data = $data->map(function ($groupedData) {
                return $groupedData->map(function ($item) {
                    $item['sender_id'] = optional(Sender::find($item['sender_id']))->name;
                    return $item;
                });
            });
        }

        return $data;
    }


    public function title(): string
    {
        return $this->category;
    }
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $lastColumn = count($this->header) + 64; // Hitung jumlah kolom dan konversi ke huruf ASCII (A=65, B=66, dst.)
                $lastRow = $event->sheet->getDelegate()->getHighestRow();

                // Loop through range of columns dynamically based on the number of columns in the header
                foreach (range('A', chr($lastColumn)) as $column) {
                    // Set align horizontal for heading to center
                    $event->sheet->getStyle($column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                    // Set align vertical for all cells to center
                    $event->sheet->getStyle($column)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                }
                // Loop through each row starting from the second row (index 2)
                for ($row = 2; $row <= $lastRow; $row++) {
                    // Loop through range of columns dynamically based on the number of columns in the header
                    foreach (range('A', chr($lastColumn)) as $column) {
                        // Set align horizontal for all cells to left except for the first row
                        if ($row > 1) {
                            $event->sheet->getStyle($column . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
                        }
                    }
                }
                $event->sheet->getRowDimension(1)->setRowHeight(30);
                // Adjust according to the last column and row
                $event->sheet->setAutoFilter('A1:' . chr($lastColumn) . $lastRow);
                // Apply other styles as needed
                $event->sheet->getStyle('A1:' . chr($lastColumn) . $lastRow)
                    ->applyFromArray([
                        'font' => [
                            'size' => 10,
                            'name' => 'Trebuchet MS',
                        ],
                        'borders' => [
                            'allBorders' => [
                                'borderStyle' => Border::BORDER_THIN,
                                'color' => ['argb' => 'FF000000'],
                            ],
                        ],
                    ]);
            },
        ];
    }
}