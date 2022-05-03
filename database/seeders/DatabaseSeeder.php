<?php

namespace Database\Seeders;

use App\Models\Api;
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
        \App\Models\User::factory(10)->has(Api::factory(10), 'apis')->create();
    }
}
