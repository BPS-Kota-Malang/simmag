<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = "divisions";
    protected $primaryKey = 'id';

    public function usersdivisi()
    {
        return $this->hasMany(User::class, 'divisions_id', 'id');
    }
}
