<?php

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
