<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Homeworld extends Model
{
    protected $table = 'homeworld';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];


}
