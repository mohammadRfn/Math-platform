<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Question extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'questions';

    protected $fillable = [
        'title',
        'content',
        'challange_id',
        'difficulty',   
        'topic',         
        'options',       
        'answer', 
        'score',
    ];
    public function challange()
    {
        return $this->belongsTo(Challange::class, 'challange_id', 'id');
    }
}
