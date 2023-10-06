<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;

class ListCities extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'View cities from DB';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cities = City::select('id', 'city_name')->get();
        
        if($cities->isEmpty()) {
            $this->info('No Cities Found');
        } else {
            $this->table(['id', 'city_name'], $cities->toArray());
        }
    }
}
