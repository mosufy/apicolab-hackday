@extends('site.layouts.main')

@section('content')

<!-- Header -->
<header>
    <div class="container">
    <button class="btn btn-lg pull-right btn-danger">{{ $likes }} <i class="fa fa-heart"></i></button>

        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="intro-text">

                    @foreach($flights as $k=>$v)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-primary">
                                <div class="panel-heading"><i class="fa fa-plane fa-2x fa-fw"></i> 
                                    <span class="skills">{{ $v['country_origin']['CountryName'] }} - {{ $v['country_destination']['CountryName'] }}</span>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-primary skills">
                                                Depart: {{ $v['departureDate'] }}<br>
                                                Price: ${{ number_format($v['minPrice'],2,'.',',') }}<br>
                                                Carrier: {{ $v['carrier'] }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <a class="btn btn-danger pull-left btn-block" href="flights/swipe-left/{{ $k }}"><i class="fa fa-arrow-left pull-left" style="padding-top:3px;"></i>Nay!</a>
                                        </div>
                                        <div class="col-xs-6">
                                            <a class="btn btn-success pull-right btn-block" href="flights/swipe-right/{{ $k }}"><i class="fa fa-arrow-right pull-right" style="padding-top:3px;"></i>Yay!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</header>
@stop