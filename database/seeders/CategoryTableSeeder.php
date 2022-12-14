<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([ 'name' => 'PHP' ]);
        Category::create([ 'name' => 'Javascript' ]);
        Category::create([ 'name' => 'CSS' ]);
    }
}
