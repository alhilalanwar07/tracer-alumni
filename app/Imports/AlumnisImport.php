<?php

namespace App\Imports;

use App\Models\Alumni;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumnisImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // Cari user berdasarkan email atau buat user baru
        $user = User::firstOrCreate(
            ['email' => $row['email']],
            [
                'name' => $row['nama'],
                'password' => Hash::make('12345678') // Set password default
            ]
        );

        return new Alumni([
            'nama' => $row['nama'],
            'nim' => $row['nim'],
            // 'tanggal_lahir' => $row['tanggal_lahir'],
            // 'jenis_kelamin' => $row['jenis_kelamin'],
            // 'agama' => $row['agama'],
            // 'alamat' => $row['alamat'],
            // 'no_hp' => $row['no_hp'],
            'email' => $row['email'],
            'ipk' => $row['ipk'],
            'tahun_masuk' => $row['tahun_masuk'],
            'wisuda_id' => $row['wisuda_id'],
            'prodi_id' => $row['prodi_id'],
            'keterangan' => $row['keterangan'],
            'user_id' => $user->id, // Set user_id dari hasil pencarian atau pembuatan user
        ]);
    }
}
