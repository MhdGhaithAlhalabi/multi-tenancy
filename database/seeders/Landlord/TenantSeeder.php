<?php

namespace Database\Seeders\Landlord;

use App\Models\Tenant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = [
            ['name'=>'tenant1','domain'=>'app1.multi-tenancy.test','database'=>'tenant1'],
            ['name'=>'tenant2','domain'=>'app2.multi-tenancy.test','database'=>'tenant2'],
            ['name'=>'tenant3','domain'=>'app3.multi-tenancy.test','database'=>'tenant3']
        ];
        Tenant::insert($tenants);
    }
}
