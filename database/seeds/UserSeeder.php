<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Adnan Beganovic',
            'password' => Hash::make('internet'),
            'email' => 'beganovicadnan95@gmail.com',
        ]);
    }
}
