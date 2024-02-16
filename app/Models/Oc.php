<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oc extends Model
{
    use HasFactory;
    protected $fillable = [
        'nim',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'prodi',
        'department',
        'foto',
        'no_hp',
        'email',
        'username',
        'password',
        'status_request',
        'status_keaktifan',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function letter()
    {
        return $this->belongsToMany(Letter::class);
    }
}
