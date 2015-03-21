<?php namespace APIcoLAB\Repositories\Country;
 
interface CountryRepository
{
    public function getCountryList();

    public function getCountryIdByCountryIso($country_iso);

    public function insert($data);
}
