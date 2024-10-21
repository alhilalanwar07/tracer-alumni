<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    use HasFactory;

    protected $table = 'jawabans';

    // Kolom yang bisa diisi
    protected $fillable = [
        'alumni_id',
        'kuisioner_id',
        'jawaban'
    ];

    // Relasi ke tabel `alumni`
    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }

    // Relasi ke tabel `kuisioner`
    public function kuisioner()
    {
        return $this->belongsTo(Kuisioner::class);
    }
}
