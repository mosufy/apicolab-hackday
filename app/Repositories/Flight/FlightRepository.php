<?php namespace APIcoLAB\Repositories\Flight;
 
interface FlightRepository
{
    public function getCheapestFlightByOriginByDestination($origin_place_id, $destination_place_id, $country_origin, $country_destination);

    public function setUserFlights($flights, $country_origin, $country_destination);

    public function getUserFlights();

    public function setUserLikeFlights($id);

    public function setUserDislikeFlights($id);
}
