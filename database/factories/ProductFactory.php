<?php

    namespace Database\Factories;

    use App\Models\Category;
    use App\Models\Product;
    use Illuminate\Database\Eloquent\Factories\Factory;

    /**
     * @extends Factory<Product>
     */
    class ProductFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [

                'name' => $this->faker->name(),
                'slug' => $this->faker->slug(),
                'description' => $this->faker->text(),
                'price' => $this->faker->randomFloat(2, 1, 1000),
                'discount_price' => $this->faker->randomFloat(2, 1, 1000),
                'stock' => $this->faker->randomNumber(2),
                'is_active' => $this->faker->boolean(),
            ];
        }
    }
