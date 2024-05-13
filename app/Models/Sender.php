<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sender extends Model
{
    use HasFactory;
    protected $fillable = [
        'scope',
        'name',
    ];
    public function document()
    {
        return $this->hasOne(Document::class, 'sender_id');
    }
}
