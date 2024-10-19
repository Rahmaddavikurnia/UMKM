<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('admin')
            ],
            [
                'name'=>'owner',
                'email'=>'owner@gmail.com',
                'role'=>'owner',
                'password'=>bcrypt('owner')
            ],
            [
                'name'=>'Customer',
                'email'=>'customer@gmail.com',
                'role'=>'customer',
                'password'=>bcrypt('customer')
            ],

            ];

            foreach($user as $key => $val)
            {
                User::create($val);
            }
    }
}
