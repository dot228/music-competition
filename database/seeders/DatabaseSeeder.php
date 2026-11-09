<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::updateOrCreate(
            ['email' => 'culturezhytomyr@gmail.com'],
            [
                'name' => 'Адміністратор',
                'password' => \Illuminate\Support\Facades\Hash::make('Culture2020'),
                'role' => 'admin',
            ]
        );
    }
}
