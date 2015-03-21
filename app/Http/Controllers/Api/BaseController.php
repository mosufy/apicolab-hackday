<?php namespace APIcoLAB\Http\Controllers\Api;

use Response;

abstract class BaseController extends \APIcoLAB\Http\Controllers\Controller
{
    /**
     * Returns data as JSON formatted
     *
     * @param array $data the data in array format to send
     * @param integer $httpCode the Response HTTP Code
     * @param boolean $prettyPrint pretty print the json data on browser
     *
     * @return JSON encoded data
     */
    public function responseApi($data, $httpCode = 200, $prettyPrint = true)
    {
        return Response::json($data,200,array('Content-Type'=>'application/json'),JSON_PRETTY_PRINT);
    }
}
