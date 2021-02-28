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
use Illuminate\Database\Eloquent\Collection;
use phpDocumentor\Reflection\Types\Array_;
use phpDocumentor\Reflection\Types\Integer;

class Queries
{

    public function total_countries()
    {

        return Country::count();
    }

    public function total_states_in_country(Int $countryid): Int
    {


        return State::where('countryid', $countryid)->count();
    }


    public function search_country(string $country): Collection
    {

        return Country::where('name', '%' . $country)->get();
    }

    public function search_country_ajax(string $country)
    {

        return json_encode(Country::where('name', '%' . $country)->get());
    }
}
