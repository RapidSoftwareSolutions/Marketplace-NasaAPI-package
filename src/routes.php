<?php
$routes = [
    'getPictureOfTheDay',
    'getClosestAsteroids',
    'getSingleAsteroid',
    'getAsteroidStats',
    'getAsteroids',
    'getEPICEarthImagery',
    'getEarthImagery',
    'getEarthAssets',
    'getMarsRoverPhotos',
    'getEONETEvents',
    'getEONETCategories',
    'getEONETLayers',
    'metadata'
];
foreach($routes as $file) {
    require __DIR__ . '/../src/routes/'.$file.'.php';
}

