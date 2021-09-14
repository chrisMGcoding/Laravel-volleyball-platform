<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    use HasFactory;

    protected $table = "continents";

    protected $fillable = [
        'continent'
    ];

    public function equipe() {
        return $this -> hasMany(Equipe::class);
    }
}
