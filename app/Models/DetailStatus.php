<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class DetailStatus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detail_status';

    protected $fillable = [
        'id_status','id_pelanggan','waktu','komentar'
    ];

    public function member(){
        return $this->belongsTo(User::class,'id_pelanggan','id');
    }

    public function status(){
        return $this->belongsTo(Status::class,'id_status','id');
    }

}
