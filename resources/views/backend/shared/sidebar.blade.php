<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="#" aria-expanded="false">
                        <?php
                        $photo=Auth::user()->profile;

                        ?>
                        @if(empty($photo))
                            <img src="{{ asset('backend/profiles/default.jpg')}}" class="rounded-circle ml-2" width="30">
                        @else
                            <img src="{{ asset('backend/profiles/'.$photo)}}" class="rounded-circle ml-2" width="30">
                        @endif
                        <span class="hide-menu">{{ Auth::user()->name }}  </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('admin.viewProfile')}}" class="sidebar-link">
                                <i class="ti-user mr-1 ml-1"></i>
                                <span class="hide-menu"> My Profile </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.getPassword')}}" class="sidebar-link">
                                {{--<i class="ti-settings mr-1 ml-1"></i>--}}
                                <i class="fa fa-user-secret" aria-hidden="true"></i>
                                <span class="hide-menu"> Change Password </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.getInfo')}}" class="sidebar-link">
                                <i class="fa fa-user-edit"></i>
                                <span class="hide-menu">Edit Account  </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('admin.getProfile')}}" class="sidebar-link">
                                <i class="fa fa-user-edit"></i>
                                <span class="hide-menu">Change Profile  </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/home" aria-expanded="false">
                        <i class="mdi mdi-av-timer"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
{{--                @if(Auth::user()->level==3)--}}
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.province')}}" aria-expanded="false">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="hide-menu">Province</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.district')}}" aria-expanded="false">
                        <i class="fas fa-map-marker-alt"></i>
                        <span class="hide-menu">District</span>
                    </a>
                </li>

{{--                @endif--}}

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('admin.season')}}" aria-expanded="false">
                        <i class="fas fa-calendar-alt"></i>
                        <span class="hide-menu">Seasons</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark profile-dd" href="#" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="hide-menu">Candidates  </span>
                    </a>
                    <?php
                    $seasons=\App\Season::all();
                    ?>
                    <ul aria-expanded="false" class="collapse  first-level">
                        @foreach( $seasons as $season)
                        <li class="sidebar-item">
                            <a href="{{route('admin.seasonCandidate',['season'=>$season->id])}}" class="sidebar-link">
                                <i class="fa fa-users"></i>
                                <span class="hide-menu"> {{$season->period}} </span>
                            </a>
                        </li>

                        @endforeach
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
