<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    use HasFactory;

    protected $table = 'kuisioners';
    protected $fillable = ['pertanyaan', 'tipe_pertanyaan', 'pilihan_jawaban', 'kategori_id'];

    // Relasi ke tabel `jawaban`
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }


    // Relasi ke KategoriKuisioner
    public function kategori()
    {
        return $this->belongsTo(KategoriKuisioner::class, 'kategori_id');
    }
}
