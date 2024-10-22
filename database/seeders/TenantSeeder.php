<?php

namespace Database\Seeders;

use App\Models\Tenant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenant = Tenant::create(['id'=>'tenant1', 'name'=>'Tenant 1']);
        $tenant->domains()->create(['domain' => 'localhost/tenant1']);

        $tenant = Tenant::create(['id'=>'tenant2', 'name'=>'Tenant 2']);
        $tenant->domains()->create(['domain' => 'localhost/tenant2']);

        $tenant = Tenant::create(['id'=>'tenant3', 'name'=>'Tenant 3']);
        $tenant->domains()->create(['domain' => 'localhost/tenant3']);
    }
}
