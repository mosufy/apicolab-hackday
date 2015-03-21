<?php namespace APIcoLAB\Http\Controllers\Api;

class Flightontroller extends BaseController
{
    public function __construct()
    {
        //
    }

    public function index()
    {
        $response = [
            'status' => 'OK',
            'timestamp' => Carbon::now()
        ];

        return $this->responseApi($response);
    }
    
}
