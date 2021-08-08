<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'audio';

    protected $fillable = [
        'judul', 'id_artikel', 'audio', 'keterangan', 'status'
    ];

    public function artikel()
    {
        return $this->belongsTo(Article::class, 'id_artikel', 'id');
    }
}
