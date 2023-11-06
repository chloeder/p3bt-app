<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Petugas',
                'email' => 'petugas@gmail.com',
                'role' => 0,
                'password' => bcrypt('rahasia1234'),

            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 1,
                'password' => bcrypt('rahasia1234'),

            ],

        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
