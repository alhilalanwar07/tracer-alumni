<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponKuisioner extends Model
{
    use HasFactory;

    protected $table = 'respon_kuisioners';

    // Kolom yang bisa diisi
    protected $fillable = [
        'alumni_id',
        'tanggal_respon',
        'kategori_id',
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

    // Relasi ke tabel `kategori_kuisioner`
    public function kategori()
    {
        return $this->belongsTo(KategoriKuisioner::class, 'kategori_id');
    }

}
