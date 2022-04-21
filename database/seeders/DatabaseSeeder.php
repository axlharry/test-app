<?php

namespace Database\Seeders;

use App\Models\Avatar;
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

        Avatar::factory()->create(['user_id' => 1]);

         //Comment::factory(12)->create();
         Avatar::factory(18)->create();
         Post::factory(20)->create();
         Comment::factory(50)->create();

    }
}
