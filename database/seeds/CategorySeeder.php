<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Cooking',
        ]);
        Category::create([
            'name' => 'Gaming',
        ]);
        Category::create([
            'name' => 'IT',
        ]);
        Category::create([
            'name' => 'Science (Math etc.) ',
        ]);
        Category::create([
            'name' => 'Tinkering',
        ]);

    }
}
