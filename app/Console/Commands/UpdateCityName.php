<?php

namespace App\Console\Commands;

use App\Models\City;
use Illuminate\Console\Command;

class UpdateCityName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'city:update {id} {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the city name by id.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cityId = $this->argument('id');
        $cityName = $this->argument('name');

        $city = City::find($cityId);

        if(!$city) {
            $this->error('City not found.');
            return;
        }

        $city->update(['city_name' => $cityName]);

        $this->info('City updated successfully. New name: ' .$cityName );
    }
}
