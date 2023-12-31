<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $table = 'users';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'email',
        'password',
        'roles_id',
        'status',
        'status_kerjas_id',
        'divisions_id',
        'employee_id'
        // 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'user_id');
    }
    public function divisi()
    {
        return $this->belongsTo(Divisi::class, 'divisions_id', 'id');
    }
    public function statusKerja()
    {
        return $this->belongsTo(StatusKerja::class, 'status_kerjas_id', 'id');
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id', 'id');
    }
    public function presensi()
    {
        return $this->hasMany(Presensi::class, 'user_id', 'id');
    }

    public function isSuperAdmin()
    {
        return $this->roles_id === '2'; // Ubah ini sesuai dengan logika peran Anda
    }
    public function isAdmin()
    {
        return $this->roles_id === '3'; // Ubah ini sesuai dengan logika peran Anda
    }

    public function isUser()
    {
        return $this->roles_id === '1'; // Ubah ini sesuai dengan logika peran Anda
    }

    public function changePassword($newPassword)
    {
        $this->update([
            'password' => Hash::make($newPassword),
        ]);
    }

    public function logbook()
    {
        return $this->hasMany(Logbook::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }
}
