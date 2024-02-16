<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomor_surat',
        'department',
        'singkatan_nama_kegiatan',
        'kode_unik',
        'nama_kegiatan',
        'hari_kegiatan',
        'tanggal_kegiatan',
        'jam_mulai',
        'jam_selesai',
        'contact_person',
        'jumlah_lampiran'
    ];
    public function oc()
    {
        return $this->belongsToMany(Oc::class);
    }
}
