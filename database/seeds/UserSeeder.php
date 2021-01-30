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
            'name' => 'Adnan',
            'password' => Hash::make('internet'),
            'email' => 'beganovicadnan95@gmail.com',
            'lastname' => 'Beganovic',
            'company' => 'InDevGro',
            'phone' => '+38762604510',
            'zip' => '75320',
            'city' => 'Gracanica',
            'country' => 'Bosna i Hercegovina',
        ]);
    }
}
