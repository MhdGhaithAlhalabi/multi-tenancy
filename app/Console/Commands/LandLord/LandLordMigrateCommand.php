<?php

namespace App\Console\Commands\LandLord;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class LandLordMigrateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'LandLord:migrate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'LandLord migration';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('start migration LandLord :');
        $this->info('--------------------------------------');
        Artisan::call('migrate --path=database/migrations/landLord --database=landlord');
        $this->info(Artisan::output());
        return Command::SUCCESS;
    }
}
