<?php namespace APIcoLAB\Http\Controllers\Site;

use APIcoLAB\Repositories\Flight\FlightRepository;
use APIcoLAB\Repositories\Place\PlaceRepository;
use Input;
use Redirect;
use Cache;

class FlightController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(FlightRepository $flight, PlaceRepository $place)
    {
        $this->flight = $flight;
        $this->place = $place;
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        if (Input::get('country_origin')) {
            $country_origin = $this->place->getFirstPlaceBySuggestion(Input::get('country_origin'));
            $country_origin_placeId = $country_origin['PlaceId'];

            $country_destination = $this->place->getFirstPlaceBySuggestion(Input::get('country_destination'));
            $country_destination_placeId = $country_destination['PlaceId'];

            $flights = $this->flight->getCheapestFlightByOriginByDestination($country_origin_placeId, $country_destination_placeId, $country_origin, $country_destination);
        } else {
            $flights = $this->flight->getUserFlights();
        }

        // echo '<pre>';
        // print_r($flights);exit;

        return view('site/flights', array(
            'pageTitle' => 'Flights',
            'page' => 'index',
            'subPage' => '',
            'flights' => $flights,
            'likes' => Cache::get('likes')
        ));
    }

    public function swipeRight($id)
    {
        $flights = $this->flight->setUserLikeFlights($id);

        return Redirect::to('flights');
    }

    public function swipeLeft($id)
    {
        $flights = $this->flight->setUserDislikeFlights($id);

        return Redirect::to('flights');
    }

}
