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
            <div class="col-lg-4 col-lg-offset-2">
                <p>Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the complete source files including HTML, CSS, and JavaScript as well as optional LESS stylesheets for easy customization.</p>
            </div>
            <div class="col-lg-4">
                <p>Whether you're a student looking to showcase your work, a professional looking to attract clients, or a graphic artist looking to share your projects, this template is the perfect starting point!</p>
            </div>
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <a href="#" class="btn btn-lg btn-outline">
                    <i class="fa fa-download"></i> Download Theme
                </a>
            </div>
        </div>
    </div>
</section>
@stop