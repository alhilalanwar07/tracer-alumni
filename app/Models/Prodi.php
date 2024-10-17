<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'slug',
        'fakultas_id',
        'user_id',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alumni()
    {
        return $this->hasMany(Alumni::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getNamaAttribute($value)
    {
        return ucwords($value);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($prodi) {
            $prodi->slug = \Str::slug($prodi->nama);
        });

        static::updating(function ($prodi) {
            $prodi->slug = \Str::slug($prodi->nama);
        });
    }
}
