<?php namespace APIcoLAB\Repositories\Place;

use Cache;
use Exception;
use Log;
use GuzzleHttp;
 
class SkyScannerPlaceRepository implements PlaceRepository
{
    public function __construct()
    {
        $this->skyscannerKey = env('SKYSCANNER_KEY', 'somekey');
    }

    public function getSuggestedPlaces($query)
    {
        $key = 'getSuggestedPlaces' . $query;
        $expire = 60;

        try {
            if (Cache::has($key))
                return Cache::get($key);

            $client = new GuzzleHttp\Client();
            $res = $client->get('http://partners.api.skyscanner.net/apiservices/autosuggest/v1.0/SG/SGD/en-GB?query='.$query.'&apiKey='.$this->skyscannerKey, [
                    'headers' => [
                        'Content-Type' => 'application/json'
                    ]
                ]
            );

            if ($res->json()['Places']) {
                $places = $res->json()['Places'];
                Cache::put($key, $places, $expire);
            } else {
                $placs = null;
            }

            return $places;
        } catch (Exception $e) {
            dd($e);exit;
        }
    }

    public function getFirstPlaceBySuggestion($query)
    {
        try {
            $places = $this->getSuggestedPlaces($query);
            $place = $places[0];

            return $place;
        } catch (Exception $e) {
            dd($e);exit;
        }
    }
}
