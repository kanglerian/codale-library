<?php

namespace App;

use App\Models\DetailKelas;
use App\Models\DetailStatus;
use App\Models\Status;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_pengguna', 'username', 'email', 'password','pin','photo','profesi','phone','bio','alamat','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pinjaman(){
        return $this->hasMany(Pinjaman::class,'id_pelanggan');
    }

    public function kelas(){
        return $this->hasMany(Kelas::class,'id_pelanggan');
    }
    public function detailkelas(){
        return $this->hasMany(DetailKelas::class,'id_creator');
    }

    public function status(){
        return $this->hasMany(Status::class,'id_pelanggan');
    }

}
