<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan oleh model ini
    protected $table = 'mahasiswas';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'nim',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tanggal_lahir',
        'jurusan',
    ];

    // Jika Anda ingin menambahkan validasi atau mutator, Anda bisa melakukannya di sini
}