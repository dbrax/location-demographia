<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github:https://github.com/dbrax/location-demographia
 * Email: epmnzava@gmail.com
 * 
 */

namespace Epmnzava\LocationDemografia;

use Epmnzava\LocationDemografia\Models\Country;
use Epmnzava\LocationDemografia\Models\State;

class LocationDemografia extends Queries
{
    public function getCountries()
    {
        return Country::all();
    }

    public function getStates()
    {
        return State::all();
    }

    public function getCountriesState($countryid)
    {
        //keep a validation here to check if the country has states
        return State::where('countryid',$countryid)->get();
    }
}
