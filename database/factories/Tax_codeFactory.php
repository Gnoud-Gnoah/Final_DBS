<?php

namespace Database\Factories;

use App\Models\Tax_code;
use Illuminate\Database\Eloquent\Factories\Factory;

class Tax_codeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tax_code::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ngayhd' => $this->faker->date($this->format = 'Y-m-d', $this->max = '2000-12-10'),
            'socmnd' => $this->faker->numberBetween(123456789,987654321),
            'masothue' => $this->faker->numberBetween(2222222222,9999999999),
            'tinhtrang' => $this->faker->randomElement(["DANG HOAT DONG", "DUNG HOAT DONG"]),
            'quanly' => $this->faker->randomElement(["BAC GIANG", "BAC NINH", "NINH BINH", "BINH YEN", "YEN HOA", "HOA BINH", "BINH DUONG", "DUONG HOANG"]),
        ];
    }
}
