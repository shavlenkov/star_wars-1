<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    protected $table = 'people';

    protected $fillable = [
        'id',
        'name',
        'height',
        'mass',
        'hair_color',
        'birth_year',
        'gender_id',
        'homeworld_id',
        'films_id',
        'url',
        'images',
        'created_at',
        'updated_at'
    ];

    public function gender() {
        return $this->belongsTo('App\Models\Gender');
    }

    public function homeworld() {
        return $this->belongsTo('App\Models\Homeworld');
    }

    public function films() {
        return $this->belongsTo('App\Models\Films');
    }

}
