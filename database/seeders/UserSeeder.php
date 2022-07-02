<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Aung Aung',
            'email' => 'aungaung@gmail.com',
            'password' => bcrypt('password'),]);
        User::create([
            'name' => 'Maung Maung',
            'email' => 'maungmaung@gmail.com',
            'password' => bcrypt('password'),
            ]);
        User::create([
            'name' => 'Aye Aye Maung',
            'email' => 'ayeaye@gmail.com',
            'password' => bcrypt('password'),
            ]);
    }
}
