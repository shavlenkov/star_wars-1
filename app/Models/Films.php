<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    protected $table = 'films';

    protected $fillable = [
        'id',
        'title',
        'created_at',
        'updated_at'
    ];


}
