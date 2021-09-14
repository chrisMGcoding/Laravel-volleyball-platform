<?php

namespace Database\Factories;

use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Equipe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'club' => $this -> faker -> realText($maxNbChars = 10, $indexSize = 2),
            'ville' => $this -> faker -> city,
            'pays' => $this -> faker -> country,
            'max_joueur' => $this -> faker -> numberBetween($min = 2, $max = 10),
            'max_joueur_role' => $this -> faker -> numberBetween($min = 1, count(Role::all())),
            'continent_id' => $this -> faker -> numberBetween($min = 1, count(Continent::all()))
        ];
    }
}
