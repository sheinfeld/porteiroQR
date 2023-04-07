<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Porteiro',
            'email' => 'porteiro@why.pt',
            'password' => bcrypt('sportingAle23'),
            'email_verified_at' => now(),
        ]);

        User::create([
           'name' => 'Polina Tafintsova',
           'email' => 'polina.tafintsova@gmail.com',
           'password' => bcrypt('Ranetki98'),
           'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Webmaster',
            'email' => 'webmaster@ceuton.net',
            'password' => bcrypt('drake2011'),
            'email_verified_at' => now(),
        ]);
    }
}
