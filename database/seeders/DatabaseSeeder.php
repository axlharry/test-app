<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Josh Harry',
            'username' => 'joshharry',
            'email' => 'josh@example.com',
            'email_verified_at' => now(),
            'password' => 'testtest',
            'is_admin' => true,
            'remember_token' => Str::random(10),
        ]);

         Comment::factory(12)->create();

    }
}
