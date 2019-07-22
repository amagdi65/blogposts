<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::where('email','a.magdi65@gmail.com')->first();

        if(!$user)
        {
            User::create([
                'name'=>'Ahmed Magdy',
                'email' => 'a.magdi65@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('14101998')
            ]);
        }
    }
}
