<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::insert([
            [
                'name' => "admin",
                "email" => "admin@gmail.com",
                "password" => Hash::make("123456"),
                'remember_token' => Str::random(10), // Adjust the length as needed
            ],
            [
                'name' => "firoj",
                "email" => "firoj@gmail.com",
                "password" => Hash::make("123456"),
                'remember_token' => Str::random(10), // Adjust the length as needed
            ],
        ]);
    }
}
