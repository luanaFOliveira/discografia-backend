<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table = 'albums';

    protected $fillable = [
      'name',
      'release_year',
    ];


    public function tracks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Track::class);
    }
}
