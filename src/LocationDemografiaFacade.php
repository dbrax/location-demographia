<?php

/**
 * Author: Emmanuel Paul Mnzava
 * Twitter: @epmnzava
 * Github:https://github.com/dbrax/location-demographia
 * Email: epmnzava@gmail.com
 * 
 */

namespace Epmnzava\LocationDemografia;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Epmnzava\LocationDemografia\Skeleton\SkeletonClass
 */
class LocationDemografiaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'location-demografia';
    }
}
