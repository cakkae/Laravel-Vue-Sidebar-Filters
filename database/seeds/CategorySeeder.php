<?php

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
        // factory(\App\Category::class, 5)->create();
        DB::table('categories')->insert([
            'name' => 'Adapteri',
            'parent_id' => 0,
        ]);

        DB::table('categories')->insert([
            'name' => 'Alati i oprema za servis',
            'parent_id' => 0,
        ]);

        DB::table('categories')->insert([
            'name' => 'Potrošni materijali',
            'parent_id' => 2,
        ]);
    }
}
