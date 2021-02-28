

[![Latest Version on Packagist](https://img.shields.io/packagist/v/epmnzava/location-demografia.svg?style=flat-square)](https://packagist.org/packages/epmnzava/location-demografia)
[![Build Status](https://img.shields.io/travis/epmnzava/location-demografia/master.svg?style=flat-square)](https://travis-ci.org/epmnzava/location-demografia)
[![Quality Score](https://img.shields.io/scrutinizer/g/epmnzava/location-demografia.svg?style=flat-square)](https://scrutinizer-ci.com/g/epmnzava/location-demografia)
[![Total Downloads](https://img.shields.io/packagist/dt/epmnzava/location-demografia.svg?style=flat-square)](https://packagist.org/packages/epmnzava/location-demografia)

## About location-demografia

From time to time  we as developers  require to fill up world countries and fetch cities from countries etc. This library package provides you a qucik and easy  way to get started with location ( countries , cities and  states ).You are welcome to use , reuse and distribute under ( MIT license).


## Version Matrix

Version | Laravel   | PHP Version
------- | --------- | ------------
1.5     | 8.0       | >= 8.0
1.4     | 8.0       | >= 7.3
1.2     | 7.0       | >= 7.2.5



## Installation


You can install the package via composer:

```bash
composer require epmnzava/location-demografia
```


# Update your config (for Laravel 5.4 and below)
Add the service provider to the providers array in config/app.php:

```
"Epmnzava\LocationDemografia\LocationDemografiaServiceProvider"::class
```

Add the facade to the aliases array in config/app.php:

```
'Location'=>Epmnzava\LocationDemografia\LocationDemografiaFacade,
```

After you add the above classes on config/app.php run below command to publish config , run migrations  and load data thus ( countries and their states). 
```bash
php artisan  locationdemografia:install
```

If you have the necessary tables already on your database you can easily run the following command to only load the necessary location data.

```bash
php artisan  locationdemografia:install --loadonly
```

## Usage

``` php
<?php

use Epmnzava\LocationDemografia;

class TestController extends Controller{
public function test(){

$location= new LocationDemografia;

//get all countries 
$countries=$location->getCountries();

//get all countries states

$states=$location->getCountriesState($countryid);

//search countries
$country=$location->search_country($countryid);


}

}
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email epmnzava@gmail.com instead of using the issue tracker.

## Credits

- [Emmanuel Mnzava](https://github.com/dbrax)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Any questions or comments hit me up on
[Mail](mailto:epmnzava@gmail.com)       epmnzava@gmail.com 
[Twitter](https://twitter.com/epmnzava) https://twitter.com/epmnzava
[Github](https://github.com/dbrax)      https://github.com/dbrax

