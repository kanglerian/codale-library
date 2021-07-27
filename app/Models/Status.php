<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'status';

    protected $fillable = [
        'id_pelanggan','waktu','status'
    ];

    public function member(){
        return $this->belongsTo(User::class,'id_pelanggan','id');
    }

    public function komentar(){
        return $this->hasMany(DetailStatus::class,'id_status');
    }

}
