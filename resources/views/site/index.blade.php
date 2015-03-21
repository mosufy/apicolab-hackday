@extends('site.layouts.main')

@section('content')

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <form role="form" method="GET" action="flights">
                <div class="col-lg-6">
                    <input type="hidden" value="{!! csrf_token() !!}" name="_token">

                    <div class="intro-text">
                        <i class="fa fa-plane fa-5x"></i>
                        <span class="name">Flights</span>
                        <hr class="star-light">
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <input type="text" name="country_origin" placeholder="Enter Departure" class="form-control skills">
                            </div>
                        </div>

                        <p></p>

                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <input type="text" name="country_destination" placeholder="Enter Destination" class="form-control skills">
                            </div>
                        </div>

                        <p></p>

                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <button type="submit" class="btn btn-primary btn-block btn-sm skills">Go!</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <div class="col-lg-6">
                <div class="intro-text">
                    <i class="fa fa-bed fa-5x"></i>
                    <span class="name">Hotels</span>
                    <hr class="star-light">
                    <span class="skills">Enter Place</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section class="success" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>About</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p>This is concept app meant created during the API coLAB - Hack Day on 21 Mar 2015. This hack was produced within 6 hours to demonstrate the integration with SkyScanner API. Below is the 2-minute demonstration speech for reference.</p>
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <p>"Anyone here uses Tinder?" I'm sure the rest of you are too shy to own up but it's all good. I myself an "not" using Tinder.</p>
                <p>Everybody loves to travel. Especially so fo Singaporeans. You know this is true when you own government made an official announcement not to travel.</p>
                <p>Another fact is that Singaporeans are stingy when it comes to money. Scratch that, I mean are "value-conscious"</p>
                <p>So let me introduce to you "Tinder for Cheape Flights"!</p>
                <p>Simply enter the destination and origin country and let the app find for you the cheapest flights across a certain date-range. This app integrates with the SkyScanner API to auto-suggest the best-fit city or country based on your input. It then fetches the cheapest flight available across date range of about one-month from now.</p>
                <p>Once the country is shown, simply "swipe right" if you may consider the suggestion, or "swipe left" to totally ignore or remove the option.</p>
                <p>Using a learning algorithm, the app will pick out better and cheaper flight recommendations</p>
                <p>You will also receive notification via push notification, SMS or email once better flight deals appear</p>
                <p>When you found the perfect match, simply click the "Buy now" and it will bring it over to SkyScanner to complete your purchase.</p>
                <p>Thank you.</p>
            </div>
        </div>
    </div>
</section>
@stop