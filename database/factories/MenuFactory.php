<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => rtrim($this->faker->sentence(2), '.'),
            'description' => rtrim($this->faker->sentence(5), '.'),
            'price' => round($this->faker->randomFloat(4, 1, 99), 2),
            'image' => $this->getImage(),
            'size' => $this->getSize(),
        ];
    }

    private function getImage() {
        return "storage/{$this->faker->sentence(1)}png";
    }

    private function getSize() {
        $options = array('small', 'large');
        $rand = array_rand($options);
        return $options[$rand];
    }
}
