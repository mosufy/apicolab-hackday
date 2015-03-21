<?php namespace APIcoLAB\Repositories\Flight;

use Cache;
use Exception;
use Log;
use GuzzleHttp;
 
class SkyScannerFlightRepository implements FlightRepository
{
    public function __construct()
    {
        $this->skyscannerKey = env('SKYSCANNER_KEY', 'somekey');
    }

    public function getCheapestFlightByOriginByDestination($origin_place_id, $destination_place_id, $country_origin, $country_destination)
    {
        $key = 'getCheapestFlightByOriginByDestination' . $origin_place_id . $destination_place_id;
        $expire = 30;

        try {
            if (Cache::has($key))
                return Cache::get($key);

            $date_from = date('Y-m', strtotime(" "));

            $client = new GuzzleHttp\Client();
            $res = $client->get('http://partners.api.skyscanner.net/apiservices/browsequotes/v1.0/SG/SGD/en-GB/'.$origin_place_id.'/'.$destination_place_id.'/'.$date_from.'?apiKey='.$this->skyscannerKey, [
                    'headers' => [
                        'Content-Type' => 'application/json'
                    ]
                ]
            );

            if ($res->json()) {
                Cache::forget('setUserFlights');
                $flights = $this->setUserFlights($res->json(), $country_origin, $country_destination);
                Cache::put($key, $flights, $expire);
            } else {
                $flights = null;
            }

            return $flights;
        } catch (Exception $e) {
            dd($e);exit;
        }
    }

    public function setUserFlights($data, $country_origin, $country_destination)
    {
        $key = 'setUserFlights';

        if (Cache::has($key))
            return Cache::get($key);

        $flights = array();
        foreach($data['Quotes'] as $k) {
            foreach ($data['Carriers'] as $j) {
                if ($j['CarrierId'] == $k['OutboundLeg']['CarrierIds'][0]) {
                    $carrier = $j['Name'];
                }
            }

            $flights[] = [
                'minPrice' => $k['MinPrice'],
                'departureDate' => date('d M Y', strtotime($k['OutboundLeg']['DepartureDate'])),
                'carrier' => $carrier,
                'country_origin' => $country_origin,
                'country_destination' => $country_destination
            ];
        }

        Cache::forever($key, $flights);

        return $flights;
    }

    public function getUserFlights()
    {
        return Cache::get('setUserFlights');
    }

    public function setUserLikeFlights($id)
    {
        $flights = $this->getUserFlights();
        unset($flights[$id]);
        Cache::forever('setUserFlights', $flights);

        $likes = Cache::has('likes')? Cache::get('likes') +1 : 1;
        Cache::forever('likes', $likes);
        return $flights;
    }

    public function setUserDislikeFlights($id)
    {
        $flights = $this->getUserFlights();
        unset($flights[$id]);
        Cache::forever('setUserFlights', $flights);

        $unlikes = Cache::has('unlikes')? Cache::get('unlikes') +1 : 1;
        Cache::forever('unlikes', $unlikes);
        return $flights;
    }
}
