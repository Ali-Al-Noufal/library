<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin=User::create([
            "name"=>"somar",
            "email"=>"somaralhoseen321@gmail.com",
            "password"=>"ssoo123@1",
            "role"=>"admin"
        ]);
    }
}
