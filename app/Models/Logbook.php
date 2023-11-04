<?php

namespace App\Models;

use App\Http\Controllers\LogbookController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
// use User;


class Logbook extends Model
{
    use HasFactory;
    protected $table = "logbooks";

    protected $primaryKey = 'id';
    protected $fillable = [
        'tanggal', 'jam_mulai', 'jam_selesai', 'pekerjaan', 'division','user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
