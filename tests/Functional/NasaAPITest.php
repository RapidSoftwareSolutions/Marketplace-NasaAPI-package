<?php

namespace Tests\Functional;

class NasaAPITest extends BaseTestCase {
    
    public function testGetPictureOfTheDay() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3",
                            "date": "2016-05-01"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getPictureOfTheDay', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
     
    public function testGetClosestAsteroids() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getClosestAsteroids', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetSingleAsteroid() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3",
                            "asteroidId": "3761732"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getSingleAsteroid', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetAsteroidStats() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getAsteroidStats', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetAsteroids() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getAsteroids', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetEPICEarthImagery() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getEPICEarthImagery', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetPatents() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getPatents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetSpaceSounds() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3",
                            "limit": "1"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getSpaceSounds', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetEarthImagery() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3",
                            "latitude": "1.5",
                            "longitude": "100.75"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getEarthImagery', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetEarthAssets() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3",
                            "latitude": "1.5",
                            "longitude": "100.75"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getEarthAssets', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetMarsRoverPhotos() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3",
                            "sol": "10"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getMarsRoverPhotos', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetEONETEvents() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getEONETEvents', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetEONETCategories() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3",
                            "categoryId": "6"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getEONETCategories', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
    public function testGetEONETLayers() {
        
        $var = '{
                    "args": {
                            "apiKey": "mEUoWFpsdH2WGR8IwEY93KUZ5CCGHt3GnZaTQ2s3",
                            "categoryId": "6"
                    }
                }';
        $post_data = json_decode($var, true);

        $response = $this->runApp('POST', '/api/NasaAPI/getEONETLayers', $post_data);
        
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($response->getBody());
        $this->assertEquals('success', json_decode($response->getBody())->callback);
    }
    
}
