@extends('partials.master')

@section('content')

    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <div class="container" data-aos="fade-up">
            <div class="row">

                <div class="col-lg-5 col-md-6">
                    <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                        <img src="assets/img/vote.jpg" alt="">
                    </div>
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                        <h2>About Project</h2>
                        <h3>Smart Election System Project.</h3>
                        <p> Now you can vote your favorite candidate anywhere and get the result easily </p>
                        <h3> How you can do it
                          </h3>

                        <ul>
                            <li><i class="ion-android-checkmark-circle"></i> Get Mobile Application .</li>
                            <li><i class="ion-android-checkmark-circle"></i> Create Registration don't forget your biometric fingerprint then.</li>
                            <li><i class="ion-android-checkmark-circle"></i>Choose your favorite Candidate.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End About Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg" >
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <?php
                $squery=new \App\Http\Controllers\FrontController();
                $season=$squery->activeSeason();
                ?>
                <h3>Candidate for 's Election</h3>
                    @if($season)
                <p>Know more about your Candidate</p>
            </div>

            <div class="row">

                <div class="col-lg-4 col-md-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="member">
                        <img src="assets/img/lady1.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>ABAYISENGA Nadine </h4>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="member">
                        <img src="assets/img/men.jpg" class="img-fluid" alt="">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>HAKIZIMANA Jean Claude</h4>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <img src="assets/img/lady2.jpg" class="img-fluid" alt="" style="height: 350px ;">
                        <div class="member-info">
                            <div class="member-info-content">
                                <h4>NYIRANZABAMWITA Madeleine</h4>

                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <p style="color:darkorange;"><strong> No current Election Available</strong></p>
                @endif


            </div>

        </div>
    </section><!-- End Team Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="bg-secondary services section-bg" >
        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <h3>Election Statistics</h3>
                @if(!$season)
                    <p style="color:darkorange;"><strong> No current Election Available</strong></p>
                @else
                <p>Smart Election support the population to get the information for election at real time</p>
            </header>

            <div class="row">

                <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <div class="icon" style="background: #fceef3;"><i class="fa fa-id-card" style="color: #ff689b;"></i></div>
                        <h4 class="title"><a href=""> Lost &fount Identity</a></h4>
                        <p class="description">
                            Now you can publish your identity documents missed also you can notify the identity
                            you found in your way</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="box">
                        <div class="icon" style="background: #fff0da;"><i class="fa fa-drivers-license-o" style="color: #e98e06;"></i></div>
                        <h4 class="title"><a href="">Lost & Found Driver Lisence</a></h4>
                        <p class="description">Now you can publish your Driver Lisence documents missed also you can notify the Driver Lisence
                            you found in your way</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="box">
                        <div class="icon" style="background: #e6fdfc;"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
                        <h4 class="title"><a href="">Lost & Found Land's Documents</a></h4>
                        <p class="description">Now you can publish your Land's  documents missed also you can notify the Land's
                            you found in your way</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow" data-aos="zoom-in" data-aos-delay="100">
                    <div class="box">
                        <div class="icon" style="background: #eafde7;"><i class="fa fa-hospital-o" style="color:#41cf2e;"></i></div>
                        <h4 class="title"><a href="">Lost & Found Insurance Card</a></h4>
                        <p class="description">Now you can publish your Insurance Card documents missed also you can notify the Insurance Card
                            you found in your way</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class=" box">
                        <div class="icon" style="background: #e1eeff;"><i class="fa fa-graduation-cap" style="color: #2282ff;"></i></div>
                        <h4 class="title"><a href="">Lost & Found School Documents</a></h4>
                        <p class="description">Now you can publish your School documents missed also you can notify the School
                            you found in your way</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="box">
                        <div class="icon" style="background: #ecebff;"><i class="fa fa-certificate" style="color: #8660fe;"></i></div>
                        <h4 class="title"><a href="">Lost & Found Certificate</a></h4>
                        <p class="description">Now you can publish your Certificate documents missed also you can notify the Certificate
                            you found in your way</p>
                    </div>
                </div>

            </div>


            @endif
        </div>
    </section><!-- End Services Section -->

@endsection
