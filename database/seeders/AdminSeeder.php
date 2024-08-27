<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create a admin user in user table
        User::create([
            'name' => 'Admin',
            'user_role'=> 'admin',
            'address'=> '53/23,Magammana,Ragama',
            'email' => 'admin@example.com',
            'phone_number' => '0771234567',
            'password' => bcrypt('password'),
        ]);


    }
}
