<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'buku';

    protected $fillable = [
        'isbn','judul_buku','cover','id_kategori','harga','deskripsi','id_penulis','id_penerbit','status'
    ];

    public function penulis(){
        return $this->belongsTo(Penulis::class,'id_penulis','id');
    }

    public function penerbit(){
        return $this->belongsTo(Penerbit::class,'id_penerbit','id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class,'id_kategori','id');
    }

    public function pinjaman(){
        return $this->hasMany(Pinjaman::class,'id_buku');
    }
}
