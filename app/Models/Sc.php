<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sc extends Model
{
    use HasFactory;
    protected $fillable = [
        'nif',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jk',
        'prodi',
        'department',
        'foto',
        'no_hp',
        'role',
        'email',
        'username',
        'password',
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
