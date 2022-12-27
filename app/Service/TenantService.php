<?php

namespace App\Service;

use App\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class TenantService
{


    private  $tenant;
    private  $database;
    private  $domain;
    /**
     */
    public function switchToTenant(Tenant $tenant){

       /* if (! ($tenant instanceof Tenant)){
            throw ValidationException::withMessages(['filed name' => 'this value is incorrect']);
        }*/
        DB::purge('landlord');
        DB::purge('tenant');
        Config::set('database.connections.tenant.database',$tenant->database);
        $this->tenant = $tenant;
        $this->database = $tenant->database;
        $this->domain = $tenant->domain;
        //DB::reconnect('tenant');
        DB::connection('tenant')->reconnect();
        DB::setDefaultConnection('tenant');
    }
    public function switchToDefult()
    {
        DB::purge('landlord');
        DB::purge('tenant');
        DB::connection('landlord')->reconnect();
        DB::setDefaultConnection('system');
    }
    public function getTenant(){
        return $this->tenant;
        }


    }
