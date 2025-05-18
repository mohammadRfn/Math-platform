<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable = [
        'name',
        'min_score',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
