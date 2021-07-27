<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'kategori';

    protected $fillable = [
        'nama_kategori','keterangan'
    ];

    public function buku(){
        return $this->hasMany(Buku::class,'id_kategori');
    }
}
