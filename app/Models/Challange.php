<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challange extends Model
{
    protected $fillable = [
        'title',
        'description',
        'points',
        'tenant_id',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_challenges')
            ->withPivot('score')
            ->withTimestamps();
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
