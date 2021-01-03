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
    <!-- ======= Services Section ======= -->
    <section id="services" class="bg-secondary services section-bg" >
        <div class="container" data-aos="fade-up">
            <?php
            $voting=new \App\Http\Controllers\VotingController();
            $rs=$voting->getVoteStatus();
            header('Content-Type: application/json');
            $data=$rs->getOriginalContent();
            $message=$data['message'];
            $season=$data['season'];
            $candidates=$data['candidates'];
            ?>

                @if($message=="upcoming")
                    <header class="section-header">
                    <h3 style="color: midnightblue">Upcoming Election</h3>
                        <div class="col-md-6 offset-3">
                            <div class="container" style="margin: 0 !important;padding: 0 !important;">
                                <div class="jumbotron">
                                    <h1 style="text-align: center !important;">{{$season->period}}</h1>
                                    <p class="lead">
                                        <span><strong> <b>Start Date :</b></strong>{{$season->start_date}}</span><br>
                                        <span><strong><b>End Date : </b></strong>{{$season->end_date}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <h3>Candidate for 's Election</h3>
                        <p>Know more about your Candidate</p>
                        <div class="row">
                            @foreach($candidates as $candidate)
                                <div class="col-md-6 col-lg-6 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="candidates" style="background: #fceef3;">
                                                    <img src="{{asset('backend/candidates/'.$candidate->profile)}}" alt="" style="width: 80px;height: 80px">
                                                </div>
                                                <h4 class="title"><a href=""> {{$candidate->name}}</a></h4>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="icon" style="background: #fceef3;">
                                                    <img src="{{asset('backend/logos/'.$candidate->logo)}}" alt="" style="width: 40px;height: 40px">
                                                </div>
                                                <h4 class="title"><a href=""> {{$candidate->party}}</a></h4>
                                            </div>
                                        </div>


                                        <h4 class="title"><a href="" style="color: darkblue">Candidate Detail</a></h4>
                                        <p class="description">
                                            <span><strong><b> Province:</b> </strong> {{$candidate->province->name}}</span><br>
                                            <span><strong><b> District:</b> </strong>{{$candidate->district->name}}</span><br>
                                            <span><strong><b> Date of Birth:</b> </strong> {{$candidate->dob}}</span><br>
                                            <span><strong><b> Message :  </b> </strong>{{$candidate->strength}}</span><br>

                                        </p>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                    </header>
                @elseif($message=="previous")
                    <header class="section-header">
                        <h3 style="color: midnightblue">Previous Election </h3>
                        <div class="col-md-6 offset-3">
                            <div class="container" style="margin: 0 !important;padding: 0 !important;">
                                <div class="jumbotron">
                                    <h1 style="text-align: center !important;">{{$season->period}}</h1>
                                    <p class="lead">
                                        <span><strong> <b>Start Date :</b></strong>{{$season->start_date}}</span><br>
                                        <span><strong><b>End Date : </b></strong>{{$season->end_date}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <h3>Candidate for 's Election</h3>
                        <p>Know more about your Candidate</p>
                        <div class="row">
                            @foreach($candidates as $candidate)
                                <div class="col-md-6 col-lg-6 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="candidates" style="background: #fceef3;">
                                                    <img src="{{asset('backend/candidates/'.$candidate->profile)}}" alt="" style="width: 80px;height: 80px">
                                                </div>
                                                <h4 class="title"><a href=""> {{$candidate->name}}</a></h4>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="icon" style="background: #fceef3;">
                                                    <img src="{{asset('backend/logos/'.$candidate->logo)}}" alt="" style="width: 40px;height: 40px">
                                                </div>
                                                <h4 class="title"><a href=""> {{$candidate->party}}</a></h4>
                                            </div>
                                        </div>


                                        <h4 class="title"><a href="" style="color: darkblue">Candidate Detail</a></h4>
                                        <p class="description">
                                            <span><strong><b> Province:</b> </strong> {{$candidate->province->name}}</span><br>
                                            <span><strong><b> District:</b> </strong>{{$candidate->district->name}}</span><br>
                                            <span><strong><b> Date of Birth:</b> </strong> {{$candidate->dob}}</span><br>
                                            <span><strong><b> Message :  </b> </strong>{{$candidate->strength}}</span><br>

                                        </p>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                    </header>
                @elseif($message=="active")
                    <header class="section-header">
                        <h3 style="color: midnightblue">Current Election</h3>
                        <div class="col-md-6 offset-3">
                            <div class="container" style="margin: 0 !important;padding: 0 !important;">
                                <div class="jumbotron">
                                    <h1 style="text-align: center !important;">{{$season->period}}</h1>
                                    <p class="lead">
                                        <span><strong> <b>Start Date :</b></strong>{{$season->start_date}}</span><br>
                                        <span><strong><b>End Date : </b></strong>{{$season->end_date}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <h3>Candidate for 's Election</h3>
                        <p>Know more about your Candidate</p>
                        <div class="row">
                            @foreach($candidates as $candidate)
                                <div class="col-md-6 col-lg-6 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="candidates" style="background: #fceef3;">
                                                    <img src="{{asset('backend/candidates/'.$candidate->profile)}}" alt="" style="width: 80px;height: 80px">
                                                </div>
                                                <h4 class="title"><a href=""> {{$candidate->name}}</a></h4>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="icon" style="background: #fceef3;">
                                                    <img src="{{asset('backend/logos/'.$candidate->logo)}}" alt="" style="width: 40px;height: 40px">
                                                </div>
                                                <h4 class="title"><a href=""> {{$candidate->party}}</a></h4>
                                            </div>
                                        </div>


                                        <h4 class="title"><a href="" style="color: darkblue">Candidate Detail</a></h4>
                                        <p class="description">
                                            <span><strong><b> Province:</b> </strong> {{$candidate->province->name}}</span><br>
                                            <span><strong><b> District:</b> </strong>{{$candidate->district->name}}</span><br>
                                            <span><strong><b> Date of Birth:</b> </strong> {{$candidate->dob}}</span><br>
                                            <span><strong><b> Message :  </b> </strong>{{$candidate->strength}}</span><br>

                                        </p>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                    </header>

                @elseif($message=="suspend")

                    <header class="section-header">
                        <h3 style="color: midnightblue"> Election Suspended waiting</h3>
                        <div class="col-md-6 offset-3">
                            <div class="container" style="margin: 0 !important;padding: 0 !important;">
                                <div class="jumbotron">
                                    <h1 style="text-align: center !important;">{{$season->period}}</h1>
                                    <p class="lead">
                                        <span><strong> <b>Start Date :</b></strong>{{$season->start_date}}</span><br>
                                        <span><strong><b>End Date : </b></strong>{{$season->end_date}}</span>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <h3>Candidate for 's Election</h3>
                        <p>Know more about your Candidate</p>
                        <div class="row">
                            @foreach($candidates as $candidate)
                                <div class="col-md-6 col-lg-6 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="box">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="candidates" style="background: #fceef3;">
                                                    <img src="{{asset('backend/candidates/'.$candidate->profile)}}" alt="" style="width: 80px;height: 80px">
                                                </div>
                                                <h4 class="title"><a href=""> {{$candidate->name}}</a></h4>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="icon" style="background: #fceef3;">
                                                    <img src="{{asset('backend/logos/'.$candidate->logo)}}" alt="" style="width: 40px;height: 40px">
                                                </div>
                                                <h4 class="title"><a href=""> {{$candidate->party}}</a></h4>
                                            </div>
                                        </div>


                                        <h4 class="title"><a href="" style="color: darkblue">Candidate Detail</a></h4>
                                        <p class="description">
                                            <span><strong><b> Province:</b> </strong> {{$candidate->province->name}}</span><br>
                                            <span><strong><b> District:</b> </strong>{{$candidate->district->name}}</span><br>
                                            <span><strong><b> Date of Birth:</b> </strong> {{$candidate->dob}}</span><br>
                                            <span><strong><b> Message :  </b> </strong>{{$candidate->strength}}</span><br>

                                        </p>
                                    </div>
                                </div>

                            @endforeach


                        </div>
                    </header>
                @else
                    <header class="section-header">
                        <p style="color:darkorange;"><strong> No current Candidate Available</strong></p>
                    </header>

                @endif

        </div>
    </section>
    <!-- ======= Services Section ======= -->
    <section id="services" class="bg-secondary services section-bg" >
        <div class="container" data-aos="fade-up">
            <?php
            $pp=new \App\Http\Controllers\VotingController();
            $loaded=$pp->voteStatistic();
            header('Content-Type: application/json');
            $contents=$loaded->getOriginalContent();
            $state=$contents['state'];
            $mess=$contents['message'];
            $votes=$contents['votes'];
//            $provinces=$contents['province'];

            ?>
            <header class="section-header">
                @if($state=="ok")
                    @if($mess=="active")
                        <h3>Current Voting Statistics</h3>
                    @else
                        <h3>Previous Election Statistics</h3>
                    @endif
                        <div class="row">
                            <div class="col-md-10 offset-1">
                                <div id="container" style="border: 1px solid #ccc;height: 60vh;width: auto"></div>
                            </div>
                        </div>


                @else
                <h3> Neither current nor previous Election Statistic Available </h3>
                @endif

            </header>

        </div>
    </section>

@endsection
@section('js')

    <script>
        anychart.onDocumentReady(function() {

            // set the data
            var data = {
                header: ["Candidate", "Points"],
                rows: [
                    <?php
                    foreach ($votes as $det_key => $vote)
                        echo "['".$vote['candidate_id']."', ".$vote['points']."],"

                    //                        }
                    ?>

                ]};

            // create the chart
            var chart = anychart.column();

            // add data
            chart.data(data);

            // set the chart title
            chart.title("Voting Result");
            chart.pointWidth(20);

            // draw
            chart.container("container");
            chart.draw();
        });
    </script>

@endsection
