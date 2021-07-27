<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'penerbit';

    protected $fillable = [
        'nama_penerbit','bidang','keterangan'
    ];

    public function buku(){
        return $this->hasMany(Buku::class,'id_penerbit');
    }
}
