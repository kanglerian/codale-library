<?php

namespace App\Models;

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
        'id_kelas','judul','kode_video','keterangan','status'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class,'id_kelas','id');
    }
}
