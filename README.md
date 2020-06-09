# Google Maps Links

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pschocke/google-maps-links.svg?style=flat-square)](https://packagist.org/packages/pschocke/google-maps-links)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/pschocke/google-maps-links/run-tests?label=tests)](https://github.com/pschocke/google-maps-links/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/pschocke/google-maps-links.svg?style=flat-square)](https://packagist.org/packages/pschocke/google-maps-links)

This package adds a lightweight way to link to a specific location in google maps. 

## Installation

You can install the package via composer:

```bash
composer require pschocke/google-maps-links
```

## Usage

You can search for a location or coordinates. Optionally you can add a place id that google maps will use if it can't find your specified location/coordinates

``` php
$gMapsLocation = new pschocke\GoogleMapsLinks\GMapsLocation();

// Get the link to a specific search location
$link = $gMapsLocation->location('Towerbridge');

// Get the link to coordinates
$link = $gMapsLocation->coordinates('53.541321', '9.983945');

// Optionally attach a query_place_id
$link = $gMapsLocation->queryPlaceId('ChIJT8RwZwaPsUcRhkKYaCqr5LI')->coordinates('53.541321', '9.983945');
$link = $gMapsLocation->queryPlaceId('ChIJT8RwZwaPsUcRhkKYaCqr5LI')->location('Towerbridge');
```

## Testing

``` bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email patrick@ausbildung-ms.de instead of using the issue tracker.

## Credits

- [Patrick Schocke](https://github.com/pschocke)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
