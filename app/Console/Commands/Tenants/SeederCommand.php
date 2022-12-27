<?php

namespace App\Console\Commands\Tenants;

use App\Models\Tenant;
use App\Service\TenantService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class SeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:seeder {class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'seeder command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $class = $this->argument('class');
        $tenants = Tenant::get();
        $tenants->each(function ($tenant) use ($class){
            TenantService::switchToTenant($tenant);
            $this->info('start seeder :'.$tenant->domain);
            $this->info('--------------------------------------');
            Artisan::call('db:seed',[
                "--class"=>"Database\\Seeders\\Tenants\\".$class,
                "--database" => 'tenant'
            ]);
            $this->info(Artisan::output());
        });
        return Command::SUCCESS;
    }
}
