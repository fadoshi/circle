<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Database\Factories\AdminFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
              
        $this->call([
            TenantSeeder::class
        ]);
        
        User::factory(10)->create();

       /*  User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
