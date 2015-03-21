<?php namespace APIcoLAB\Http\Controllers\Api;

use Carbon\Carbon;

class ServiceController extends BaseController
{
    public function __construct()
    {
        //
    }

    public function ping()
    {
        $response = [
            'status' => 'OK',
            'timestamp' => Carbon::now()
        ];

        return $this->responseApi($response);
    }
    
}
