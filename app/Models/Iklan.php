<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'iklan';

    protected $fillable = [
        'iklan','gambar','deskripsi','status'
    ];
}
