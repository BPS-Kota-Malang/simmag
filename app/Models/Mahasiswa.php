<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';

    protected $fillabel = [
        'nim', 'nama', 'universitas', 'fakultas', 'program_studi',
        'telepon', 'jumlah_anggota', 'file_proposal', 'file_suratpengantar',
        'tanggal_mulai', 'tanggal_selesai'
    ];

    // public function addData($data)
    // {
    //     DB::table('mahasiswa')->insert($data);
    // }
}
