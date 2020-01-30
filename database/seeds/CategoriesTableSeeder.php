<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BD::table('categories')->insert([
            ['name' => 'shirts'],
            ['name' => 'pants'],
            ['name' => 'shoes'],
            ['name' => 'backpacks'],
            ['name' => 'notebooks'],
            ['name' => 'smartphones'],
            ['name' => 'tvs']
        ]);
    }
}
