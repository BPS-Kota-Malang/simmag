<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = "roles";
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_role',
    ];

    public function usersdivisi()
    {
        return $this->hasMany(User::class, 'roles_id', 'id');
    }
}
