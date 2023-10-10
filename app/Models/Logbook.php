<?php

namespace App\Models;

use App\Http\Controllers\LogbookController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Logbook extends Model
{
    use HasFactory;
    protected $table = "logbooks";

    protected $primaryKey = 'id_logbook';
    protected $fillable = [
        'tanggal', 'jam_mulai', 'jam_selesai', 'keterangan'
    ];

    public function logbook()
    {
        return $this->belongsTo(LogbookController::class, 'user_id');
    }
}
