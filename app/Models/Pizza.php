<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    protected $table = 'pizza';

    protected $fillable = [
        'pizza_naam', 'plaatje',
    ];

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'pizza_ingredient');
    }
    public function calculatePrice()
    {
        return $this->ingredients()->sum('prijs');
    }
}