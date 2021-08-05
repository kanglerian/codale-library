<?php

namespace App\Models;

use App\DetailKelas;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas','gambar','id_pelanggan','harga','harga_awal','deskripsi','id_kategori','tipe','status'
    ];

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }
    
    public function pelanggan(){
        return $this->belongsTo(User::class,'id_pelanggan','id');
    }
    public function detail(){
        return $this->hasMany(DetailKelas::class,'id_kelas');
    }

}
