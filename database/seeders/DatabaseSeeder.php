<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Creamos la carpeta posts
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        // \App\Models\User::factory(10)->create();
        //llamamos a UserSeeder que 1 usuario con credenciales y otros 10
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        //post se deben crear con su respectiva imagen
        $this->call(PostSeeder::class);
    }
}
