<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;

    protected $table = 'fakultas';

    protected $fillable = [
        'nama',
        'slug',
        'user_id',
    ];

    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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

        static::creating(function ($fakultas) {
            $fakultas->slug = \Str::slug($fakultas->nama);
        });

        static::updating(function ($fakultas) {
            $fakultas->slug = \Str::slug($fakultas->nama);
        });
    }
}
