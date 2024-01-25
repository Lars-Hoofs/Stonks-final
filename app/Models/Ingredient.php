<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'Ingredients';

    protected $fillable = [
        'ingredient-naam', 'unit_id', 'prijs',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}