<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github:https://github.com/dbrax/location-demographia
 * Email: epmnzava@gmail.com
 * 
 */

namespace Epmnzava\LocationDemografia\Console;

use Epmnzava\LocationDemografia\Models\Country;
use Epmnzava\LocationDemografia\Models\State;
use Illuminate\Console\Command;

class LoadData extends Command
{
    protected $signature = 'locationdemografia:install {--loadonly}';

    //add command tag to only feed countries or states etc

    protected $description = 'This command will load countries , states and cities from the given endpoint';

    public function handle()
    {
        if ($this->option('loadonly') == false) {
            $this->info('initiating loading data LocationDemografia...');

            ///  $this->info('Publishing configuration...');
            $this->call('vendor:publish', [
                '--provider' => "Epmnzava\LocationDemografia\LocationDemografiaServiceProvider"

            ]);

            $this->info('finished publishing the package');

            $this->info('begining to migrate');


            $this->call('migrate', []);

            $this->info('Finished  migrating');


            $this->loadDataFromApi();

            $this->info('Finished loading data');
        } else {
            $this->loadDataFromApi();
            $this->info('Finished loading dta');
        }
    }

    public function loadDataFromApi()
    {

        $reponse = json_decode($this->fetchData());



        foreach ($reponse->result as $nation) {
            $country = new Country();
            $country->name = $nation->name;
            $country->code = $nation->code;
            $country->state = json_encode($nation->states);
            $country->save();
            if ($nation->states != null) {

                foreach ($nation->states as $state) {
                    $st = new State;
                    $st->countryid = $country->id;
                    $st->name = $state->name;
                    $st->code = $state->code;
                    $st->save();
                }
            }
        }
    }

    public function fetchData()
    {
        $curl = curl_init();

        //make url fetch from config
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.printful.com/countries",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);


        return $response;
    }
}
