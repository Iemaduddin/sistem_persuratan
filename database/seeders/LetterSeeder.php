<?php

namespace Database\Seeders;

use App\Models\Letter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LetterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $letters = [
            [
                'nomor_surat' => 1,
                'department' => 'RMB',
                'singkatan_nama_kegiatan' => 'SEMNAS',
                'kode_unik' => 'U',
                'nama_kegiatan' => 'Seminar Nasional Himpunan Mahasiswa Teknologi Informasi Politeknik Negeri Malang Tahun 2023 ',
                'hari_kegiatan' => 'Minggu',
                'tanggal_kegiatan' => '2023-10-30',
                'jam_mulai' => '09.00',
                'jam_selesai' => '14.00',
                'contact_person' => 'Yogi 085746008652',
                'jumlah_lampiran' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nomor_surat' => 2,
                'department' => 'PSDM',
                'singkatan_nama_kegiatan' => 'PRASTUDI',
                'kode_unik' => 'U',
                'nama_kegiatan' => 'Prastudi Mahasiswa Baru Jurusan Teknologi Informasi Politeknik Negeri Malang Tahun 2023 ',
                'hari_kegiatan' => 'Minggu',
                'tanggal_kegiatan' => '2023-08-16',
                'jam_mulai' => '05.00',
                'jam_selesai' => '16.00',
                'contact_person' => 'Yogi 085746008652',
                'jumlah_lampiran' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ];
        foreach ($letters as $letter) {
            Letter::create($letter);
        }
    }
}
