<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0 ; $i <10; $i++){
            $newCategory = new Category();
            $newCategory->name = $faker->text(5);
            $newCategory->save();
        }
    }
}
