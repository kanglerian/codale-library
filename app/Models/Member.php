<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'member';

    protected $fillable = [
        'no_card','nama_member','kontak','alamat','status'
    ];

    public function pinjaman(){
        return $this->hasMany(Pinjaman::class,'id_pelanggan');
    }
}
