<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $table = "equipes";

    protected $fillable = [
        'club',
        'ville',
        'pays',
        'max_joueur',
        'max_joueur_role',
        'continent_id'
    ];

    public function joueurs() {
        return $this -> hasMany(Joueur::class);
    }

    public function continent() {
        return $this -> belongsTo(Continent::class);
    }
}
