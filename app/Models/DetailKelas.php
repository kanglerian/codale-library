<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DetailKelas extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_kelas';

    protected $fillable = [
        'judul','id_kelas','id_creator','kode_video','keterangan','status'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class,'id_kelas','id');
    }
    public function creator(){
        return $this->belongsTo(User::class,'id_creator','id');
    }
}
