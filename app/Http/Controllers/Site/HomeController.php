<?php namespace APIcoLAB\Http\Controllers\Site;

class HomeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application welcome screen to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('site/index', array(
            'pageTitle' => 'API coLAB - Hack Day',
            'page' => 'index',
            'subPage' => '',
        ));
    }

}
