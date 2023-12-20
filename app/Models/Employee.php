<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_pegawai',
        'NIP',
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'employee_id');
    }
}
