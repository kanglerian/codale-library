<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'informasi';

    protected $fillable = [
        'judul','video','status'
    ];

}
