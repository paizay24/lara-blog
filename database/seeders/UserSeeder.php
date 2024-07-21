<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Pai Zay',
            'email' => 'pzo@gmail.com',
            'role' =>  'admin',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('pzo123123')
        ]);
        User::factory()->create([
            'name' => 'Editor',
            'email' => 'editor@gmail.com',
            'role' =>  'editor',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('pzo123123')
        ]);
        User::factory()->create([
            'name' => 'Author',
            'email' => 'author@gmail.com',
            'role' =>  'author',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'password' => Hash::make('pzo123123')
        ]);
    }
}
