<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wisuda extends Model
{
    use HasFactory;

    protected $fillable = [
        'angkatan',
        'tanggal',
    ];

    public function alumni()
    {
        return $this->hasMany(Alumni::class);
    }
}
