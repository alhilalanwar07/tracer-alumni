<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumnis';

    protected $fillable = [
        'nama',
        'nim',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'alamat',
        'no_hp',
        'email',
        'foto',
        'judul_skripsi',
        'ipk',
        'tahun_masuk',
        'keterangan',
        'user_id',
        'wisuda_id',
        'prodi_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wisuda()
    {
        return $this->belongsTo(Wisuda::class);
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function getNamaAttribute($value)
    {
        return ucwords($value);
    }

    public function getJenisKelaminAttribute($value)
    {
        return ucwords($value);
    }

    public function getAgamaAttribute($value)
    {
        return ucwords($value);
    }

    public function getJudulSkripsiAttribute($value)
    {
        return ucwords($value);
    }

    public function getKeteranganAttribute($value)
    {
        return ucwords($value);
    }

    // JIKA FOTO KOSONG, ISI DENGAN no_image.jpg
    public function getFotoAttribute($value)
    {
        return $value ? $value : 'no_image.jpg';
    }


    // buatkan user baru ketika membuat data alumni dengan email yang sama dan password default 12345678 dan kirim email notifikasi
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($alumni) {
    //         $user = User::where('email', $alumni->email)->first();

    //         if (!$user) {
    //             $user = User::create([
    //                 'name' => $alumni->nama,
    //                 'email' => $alumni->email,
    //                 'password' => bcrypt('12345678'),
    //                 'role' => 'alumni',
    //             ]);

    //             // Kirim email notifikasi
    //             \Mail::to($user->email)->send(new \App\Mail\WelcomeAlumni($user));
    //         }

    //         $alumni->user_id = $user->id;
    //     });
    // }

    // Relasi ke tabel `jawaban`
    public function jawaban()
    {
        return $this->hasMany(Jawaban::class);
    }

    // Relasi ke tabel `respon_kuisioner`
    public function responKuisioner()
    {
        return $this->hasMany(ResponKuisioner::class);
    }

}
