<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penulis';

    protected $fillable = [
        'nama_penulis','photo','profesi','tentang'
    ];

    public function buku(){
        return $this->hasMany(Buku::class,'id_penulis');
    }
}
