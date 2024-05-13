<?php

namespace Database\Seeders;

use App\Models\Sender;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sendersNaungan = ['WRI', 'ITDEC'];
        $sendersOki = [
            'DPM',
            'BEM',
            'HMM',
            'HMS',
            'HME',
            'HMTK',
            'HIMANIA',
            'HMA',
            'UKM BKM',
            'UKM PP',
            'UKM PASTI',
            'UKM SENI THEATRISIC',
            'UKM USMA',
            'UKM MENWA',
            'UKM PLFM',
            'UKM LPM KOMPEN',
            'UKM OR',
            'UKM RISPOL',
            'UKM OPA GG',
            'UKM TALITAKUM',
            'UKM KMK',
        ];
        // Array untuk menyimpan hasil
        $entriesOki = [];

        // Loop melalui setiap nama dan buat entri baru
        foreach ($sendersOki as $sender) {
            $entriesOki[] = [
                'scope' => 'OKI',
                'name' => $sender,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }
        foreach ($entriesOki as $entry) {
            Sender::create($entry);
        }
        $entriesNaungan = [];

        foreach ($sendersNaungan as $sender) {
            $entriesNaungan[] = [
                'scope' => 'Naungan',
                'name' => $sender,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ];
        }
        foreach ($entriesNaungan as $entry) {
            Sender::create($entry);
        }
        $others =
            [
                [
                    'scope' => 'Others',
                    'name' => 'AROBIDSH',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'scope' => 'Others',
                    'name' => 'ID',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],
                [
                    'scope' => 'Others',
                    'name' => 'AROBIDX',
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ],

            ];
        foreach ($others as $other) {
            Sender::create($other);
        }
    }
}
