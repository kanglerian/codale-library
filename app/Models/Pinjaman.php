<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pinjaman';

    protected $fillable = [
        'id_transaksi','id_pelanggan','id_buku','tgl_pinjam','tgl_kembali','status','donasi','keterangan'
    ];

    public function buku(){
        return $this->belongsTo(Buku::class,'id_buku','id');
    }

    public function member(){
        return $this->belongsTo(User::class,'id_pelanggan','id');
    }

}
