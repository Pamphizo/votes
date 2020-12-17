
<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">

        <h1 class="logo mr-auto"><a href="{{url('/')}}">Smart Election</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav class="main-nav d-none d-lg-block">
            <ul>
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                <li><a href="#about">About Us</a></li>
                <li><a href="#team">Candidate</a></li>
                <li><a href="#services">Analysis</a></li>

                @if (Route::has('login'))
                        @auth
                        <li><a href="{{url('/home')}}">Home</a></li>
                        @else
                        <li><a href="{{ route('login') }}">Login</a></li>

{{--                            @if (Route::has('register'))--}}
{{--                            <li><a href="{{ route('register') }}">Register</a></li>--}}
{{--                            @endif--}}
                        @endauth
                @endif
            </ul>
        </nav><!-- .main-nav-->

    </div>
</header><!-- End Header -->
