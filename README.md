# NasaAPI Package
Get NASA's collection of asteroids and space pictures.
* Domain: nasa.gov
* Credentials: apiKey

## How to get credentials: 
**You do not need to authenticate in order to explore the NASA data.**
However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a [NASA developer key](https://api.nasa.gov/index.html#apply-for-an-api-key).

## NasaAPI.getPictureOfTheDay
This endpoint structures the APOD imagery and associated metadata so that it can be repurposed for other applications. In addition, if the concept_tags parameter is set to True, then keywords derived from the image explanation are returned.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| date          | String     | Optional: The date of the APOD image to retrieve. Format: YYYY-MM-DD. Default "today".
| highResolution| String     | Optional: Retrieve the URL for the high resolution image. Default false.

## NasaAPI.getClosestAsteroids
Retrieve a list of Asteroids based on their closest approach date to Earth.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| startDate| String     | Optional: Starting date for asteroid search. Format: YYYY-MM-DD. Default: "today"
| endDate  | String     | Optional: Ending date for asteroid search. Format: YYYY-MM-DD. Default: 7 days after startDate.

## NasaAPI.getSingleAsteroid
Lookup a specific Asteroid based on its NASA JPL small body (SPK-ID) ID.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| asteroidId| String     | Optional: Asteroid SPK-ID correlates to the NASA JPL small body.

## NasaAPI.getAsteroidStats
Get the Near Earth Object data set totals.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.

## NasaAPI.getAsteroids
Retieve a paginated list of Near Earth Objects.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| page  | String     | Optional: The page number of the results. Default: 0
| size  | String     | Optional: The number of returned results per page. Default: 20

## NasaAPI.getEPICEarthImagery
Retieve a paginated list of Near Earth Objects.

| Field         | Type       | Description
|---------------|------------|----------
| apiKey        | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| date          | String     | Optional: Retrieve matadata for all imagery available for a given date. Format: YYYY-MM-DD.
| availableDates| String     | Optional: Retrieve a listing of all dates with available imagery.

## NasaAPI.getPatents
This endpoint provides structured, searchable developer access to NASA’s patents that have been curated to support technology transfer.

| Field      | Type       | Description
|------------|------------|----------
| apiKey     | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| query      | String     | Optional: Search text to filter results.
| conceptTags| String     | Optional: Return an ordered dictionary of concepts from the patent abstract.
| limit      | String     | Optional: number of patents to return.

## NasaAPI.getSpaceSounds
This endpoint provides a series of space sounds via sound cloud.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| query | String     | Optional: Search text to filter results.
| limit | String     | Optional: number of patents to return.

## NasaAPI.getEarthImagery
This endpoint retrieves the Landsat 8 image for the supplied location and date. The response will include the date and URL to the image that is closest to the supplied date.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| latitude  | String     | Required: Latitude.
| longitude | String     | Required: Longitude.
| dimension | String     | Optional: width and height of image in degrees.
| date      | String     | Optional: date of image; if not supplied, then the most recent image (i.e., closest to today) is returned. Format: YYYY-MM-DD.
| cloudScore| String     | Optional: calculate the percentage of the image covered by clouds. Default false.

## NasaAPI.getEarthAssets
This endpoint retrieves the date-times and asset names for available imagery for a supplied location.

| Field    | Type       | Description
|----------|------------|----------
| apiKey   | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| latitude | String     | Required: Latitude.
| longitude| String     | Required: Longitude.
| begin    | String     | Optional: beginning of date range. Format: YYYY-MM-DD.
| end      | String     | Optional: end of date range. Format: YYYY-MM-DD.

## NasaAPI.getMarsRoverPhotos
This API is designed to collect image data gathered by NASA's Curiosity, Opportunity, and Spirit rovers on Mars and make it more easily available to other developers, educators, and citizen scientists.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| sol   | String     | Optional: sol (ranges from 0 to max found in endpoint).
| camera| String     | Optional: Abbreviation of the camera.
| page  | String     | Optional: The page number. 25 items per page returned.

## NasaAPI.getEONETEvents
This method returns most recent EONET (Earth Observatory Natural Event Tracker) events.

| Field | Type       | Description
|-------|------------|----------
| apiKey| credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| source| String     | Optional: Filter the returned events by the Source. Multiple sources can be included in the parameter: comma separated, operates as a boolean OR.
| status| String     | Optional: Events that have ended are assigned a closed date and the existence of that date will allow you to filter for only-open or only-closed events. Omitting the status parameter will return only the currently open events.
| days  | String     | Optional: Limit the number of prior days (including today) from which events will be returned.

## NasaAPI.getEONETCategories
This method returns EONET (Earth Observatory Natural Event Tracker) categories.

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| categoryId| String     | Optional: Filter the returned events by the Category.
| source    | String     | Optional: Filter the returned events by the Source. Multiple sources can be included in the parameter: comma separated, operates as a boolean OR.
| status    | String     | Optional: Events that have ended are assigned a closed date and the existence of that date will allow you to filter for only-open or only-closed events. Omitting the status parameter will return only the currently open events.
| limit     | String     | Optional: Limits the number of events returned.
| days      | String     | Optional: Limit the number of prior days (including today) from which events will be returned.

## NasaAPI.getEONETLayers
This endpoint is a reference to a specific web service (e.g., WMS, WMTS) that can be used to produce imagery of a particular NASA data parameter. Layers are mapped to categories within EONET in order to provide a category-specific list of layers (e.g., the 'Volcanoes' category is mapped to layers that can provide imagery in true color, SO2, aerosols, etc.). 

| Field     | Type       | Description
|-----------|------------|----------
| apiKey    | credentials| Optional: Your ApiKey obtained from NASA for expanded usage. You do not need to authenticate in order to explore the NASA data. However, if you will be intensively using the APIs to, say, support a mobile application, then you should sign up for a NASA developer key.
| categoryId| String     | Optional: Filter the returned events by the Category.

