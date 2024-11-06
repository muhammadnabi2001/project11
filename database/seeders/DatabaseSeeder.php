<?php

namespace Database\Seeders;

use App\Models\Kitob;
use App\Models\Post;
use App\Models\Role;
use App\Models\Talaba;
use App\Models\Telefon;
use App\Models\Universitet;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        for ($i=1; $i <=10; $i++) { 
            Talaba::create([
                'name'=>'talaba'.$i,
                'age'=>rand(18,50),
                'adress'=>'adress'.$i
            ]);
        }
        for ($i=1; $i <=10; $i++) { 
            Universitet::create([
                'name'=>'Universitet'.$i,
                'adress'=>'adress'.$i,
                'facultet'=>'facultet'.$i
            ]);
        }
        for ($i=1; $i <=10; $i++) { 
            Telefon::create([
                'model'=>'model'.$i,
                'color'=>'color'.$i,
                'price'=>rand(50,99),
                'count'=>rand(15,75)
            ]);
        }
        for ($i=1; $i <=10; $i++) { 
            Kitob::create([
                'name'=>'kitob'.$i,
                'author'=>'author'.$i,
                'price'=>rand(15,90)
            ]);
        }
        for ($i = 1; $i < 10; $i++) {
            Post::create([
                'title' => 'title' . $i,
                'description' => 'description' . $i,
                'text' => 'text' . $i,
                'img' => 'k.jpg'
            ]);
        }
        Role::create(['name' => 'hr']);
        Role::create(['name' => 'moderator']);
        Role::create(['name' => 'bugalter']);

        for ($i = 1; $i < 10; $i++) {
            $user = User::create([
                'name' => 'user' . $i,
                'email' => 'email' . $i . '@gmail.com',
                'password' => Hash::make('123456789')
            ]);
            $row = rand(1, 3);
            for ($l = 1; $l <= $row; $l++) {
                $user->roles()->attach(rand(1, 3));
            }
        }
    }
    

}
