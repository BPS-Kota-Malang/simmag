<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusKerja extends Model
{
    use HasFactory;

    protected $table = "status_kerjas";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_status',
    ];

    public function usersstatuskerja()
    {
        return $this->hasMany(User::class, 'status_kerjas_id', 'id');
    }
}
