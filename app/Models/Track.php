<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;
    protected $table = 'tracks';

    protected $fillable = [
        'name',
        'duration',
        'album_id'
    ];

    public function album(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Album::class);
    }
}
