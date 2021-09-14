<?php

namespace Database\Factories;

use App\Models\Joueur;
use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'url' => $this -> faker -> imageUrl($width = 640, $height = 480),
            'joueur_id' => $this -> faker -> numberBetween(1, count(Joueur::all())),
        ];
    }
}
