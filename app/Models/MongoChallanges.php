<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class MongoChallanges extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'challanges';
    protected $fillable = ['title', 'description', 'points', 'tenant_id'];
}
