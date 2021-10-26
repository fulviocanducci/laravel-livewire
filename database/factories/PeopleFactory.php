<?php

namespace Database\Factories;

use App\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleFactory extends Factory
{

    protected $model = People::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'active' => $this->faker->boolean()
        ];
    }
}
