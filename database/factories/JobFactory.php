<?php

namespace Database\Factories;

use App\Models\Ad;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'queue' => 'promo',
            'ad_id' => Ad::all()->random()->id,
            'available_at' => now()->addMinutes(3),
            'reserved_at' => now()->addMinutes(3),
            'created_at' => now(),
            'payload' => 'test',
            'attempts' => 0,
        ];
    }
}
