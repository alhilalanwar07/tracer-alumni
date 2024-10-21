<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKuisioner extends Model
{
    use HasFactory;

    protected $table = 'kategori_kuisioners';

    protected $fillable = ['nama_kategori'];

    // ucfirst() untuk mengubah huruf pertama menjadi huruf besar
    public function getNamaKategoriAttribute($value)
    {
        return ucwords($value);
    }

    // Relasi satu ke banyak dengan Kuisioner
    public function kuisioners()
    {
        return $this->hasMany(Kuisioner::class, 'kategori_id');
    }

    // Relasi satu ke banyak dengan ResponKuisioner
    public function responKuisioners()
    {
        return $this->hasMany(ResponKuisioner::class, 'kategori_id');
    }
}
