# Google Maps Links

[![Latest Version on Packagist](https://img.shields.io/packagist/v/pschocke/google-maps-links.svg?style=flat-square)](https://packagist.org/packages/pschocke/google-maps-links)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/pschocke/google-maps-links/run-tests?label=tests)](https://github.com/pschocke/google-maps-links/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/pschocke/google-maps-links.svg?style=flat-square)](https://packagist.org/packages/pschocke/google-maps-links)

This package adds a lightweight way to link to a specific location, start a direction, show a map or jump into street view in google maps. 

## Installation

You can install the package via composer:

```bash
composer require pschocke/google-maps-links
```

## Usage

#### Search

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
#### Direction

You can show a direction:

``` php
$gMapsDirection = new pschocke\GoogleMapsLinks\GMapsDirection();

// Get the link to start a direction from a specific place
$link = $gMapsDirection->from('Towerbridge')->get();

// Get the link to start a direction from a specific place to a specific place
$link = $gMapsDirection->from('Towerbridge')->to('Big Ben')->get();

// Optionally specify a travel method
$link = $gMapsDirection->from('Towerbridge')->to('Big Ben')->travelMethod('bicycling')->get();
```

#### Map

You can link to a map with no markers:

``` php
$gMapsMap = new pschocke\GoogleMapsLinks\GMapsMap();

// Get the link to start a map by specifing a center coordinate
$link = $gMapsMap->center('-33.712206', '150.311941')->get();

// Optionally specify a zoom level ranging from 0 (the whole world) to 21 (individual buildings), defaults to 15
$link = $gMapsMap->center('-33.712206', '150.311941')->zoom(6)->get();

// Optionally change the basemap (roadmap (default), satellite, or terrain)
$link = $gMapsMap->center('-33.712206', '150.311941')->basemap('satellite')->zoom(6)->get();

// Optionally change the layer of the map: none (default), transit, traffic, or bicycling
$link = $gMapsMap->center('-33.712206', '150.311941')->layer('transit')->basemap('satellite')->zoom(6)->get();
```

#### Street View

You can create a link to directly open a street view panorama
```
$gMapsStreetView = new pschocke\GoogleMapsLinks\GMapsStreetView();

// Get the link to display a panorama from a viewpoint cooridnate
$link = $gMapsStreetView->viewpoint('48.857832', '2.295226')->get();

// You can also provide a pano id, the viewpoint is used if the pano id does not exisits
$link = $gMapsStreetView->pano('tu510ie_z4ptBZYo2BGEJg')->viewpoint('48.857832', '2.295226')->get();

// Optionally you can change the heading, pitch and fov parameter
$link = $gMapsStreetView->pano('tu510ie_z4ptBZYo2BGEJg')->viewpoint('48.857832', '2.295226')->heading('-45')->pitch(38)->fov(80)->get();

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
