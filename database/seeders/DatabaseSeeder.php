<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Schema::disableForeignKeyConstraints();

        User::create([
           'name' => 'moazzaq',
           'email' => 'moazzaq@gmail.com',
           'password' => bcrypt('123456'),
        ]);

         \App\Models\Post::factory(5)->create();
        $this->call([
           PlanSeeder::class
        ]);
    }
}
