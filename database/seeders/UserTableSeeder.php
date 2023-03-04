<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\User::factory()->create([
            'name' => 'Yacin',
            'email' => 'admin@example.com',
        ]);
        \App\Models\User::factory(100)->create();
    }
}
