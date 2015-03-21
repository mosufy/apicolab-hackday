<?php namespace APIcoLAB\Repositories\Place;
 
interface PlaceRepository
{
    public function getSuggestedPlaces($query);

    public function getFirstPlaceBySuggestion($query);
}
