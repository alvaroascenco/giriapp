<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Giria;
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
        User::factory()
            ->count(10)
            ->hasGirias(15)
            ->hasIdioms(20)
            ->create();
    }
}
