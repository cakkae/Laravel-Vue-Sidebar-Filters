<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\Product::class, 20)->create();
        DB::table('products')->insert([
            'name' => 'Adapter 220V AU/ UK/ USA/ CH na EU',
            'price' => 4.29,
            'qty' => 15,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Adapter Emy Z4 univerzalni za sve utičnice 110V-250V',
            'price' => 5.50,
            'qty' => 10,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'name' => 'Antistatičke vrećice sa vakuum zatvaračem 16,5 x 21,4 cm (100kom)',
            'price' => 12,
            'qty' => 25,
            'category_id' => 3,
        ]);
    }
}
