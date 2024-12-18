<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Reader;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Borrow::class;

    public function definition()
    {
        return [
            'reader_id' => Reader::inRandomOrder()->first()->id ?? Reader::factory(),
            'book_id' => Book::inRandomOrder()->first()->id ?? Book::factory(),
            'borrow_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'return_date' => $this->faker->dateTimeBetween('now', '+1 year'),
            'status' => $this->faker->boolean,
        ];
    }
}
