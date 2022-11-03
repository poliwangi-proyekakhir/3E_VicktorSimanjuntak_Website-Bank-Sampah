<?php

use App\User;
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
        //
        User::create([
            'nama'=>'admin1',
            'email'=>'admin1@test.com',
            'role'=>'admin',
            'password'=>bcrypt('12345678'),
        ]);
    }
}
