<!--=================================
 header start-->
<nav class="admin-header navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- logo -->
    <div class="text-left navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}"><img
                src="{{ asset('assets/images/logo.jpg') }}" alt=""></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img
                src="{{ asset('assets/images/logo.jpg') }}" alt=""></a>
    </div>

    <!-- Top bar left -->
    <ul class="nav navbar-nav mr-auto">
        <li class="nav-item">
            <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left" href="javascript:void(0);"><i
                    class="zmdi zmdi-menu ti-align-right"></i></a>
        </li>
        <li class="nav-item">
            <div class="search">
                <a class="search-btn not_click" href="javascript:void(0);"></a>
                <div class="search-box not-click">
                    <input type="text" class="not-click form-control" placeholder="Search" value="" name="search">
                    <button class="search-button" type="submit"> <i class="fa fa-search not-click"></i></button>
                </div>
            </div>
        </li>
    </ul>

    <!-- top bar right -->
    <ul class="nav navbar-nav ml-auto">
        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <li class="nav-item">
            <a rel="alternate" hreflang="{{ $localeCode }}"
                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                {{ $properties['native'] }}
            </a>
        </li>
        @endforeach
        <li class="nav-item fullscreen">
            <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
        </li>

        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-status"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big dropdown-notifications">
                <div class="dropdown-header notifications">
                    <strong>Notifications</strong>
                    <span class="badge badge-pill badge-warning">
                        {{ session('notifications') ? count(session('notifications')) : 0 }}
                    </span>
                </div>
                <div class="dropdown-divider"></div>

                <a href="#" class="dropdown-item">New registered user <small class="float-right text-muted time">Just
                        now</small></a>

                {{-- إشعارات صلاحية --}}
                @if(session('notifications'))
                @foreach(session('notifications') as $note)
                <a href="#" class="dropdown-item text-danger">
                    <img src="{{ $note['icon'] }}" alt="خطأ" class="w-5 h-5 mr-2">
                    {{ $note['message'] }}
                    <small class="float-right text-muted time">{{ $note['time'] }}</small>
                </a>
                @endforeach
                @endif
            </div>

        </li>
        <li class="nav-item dropdown ">
            <a class="nav-link top-nav" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="true"> <i class=" ti-view-grid"></i> </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-big">
                <div class="dropdown-header">
                    <strong>Quick Links</strong>
                </div>
                <div class="dropdown-divider"></div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-files text-primary"></i>
                        <h5>New Task</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-check-box text-success"></i>
                        <h5>Assign Task</h5>
                    </a>
                </div>
                <div class="nav-grid">
                    <a href="#" class="nav-grid-item"><i class="ti-pencil-alt text-warning"></i>
                        <h5>Add Orders</h5>
                    </a>
                    <a href="#" class="nav-grid-item"><i class="ti-truck text-danger "></i>
                        <h5>New Orders</h5>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item dropdown mr-30">
            {{-- <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('assets/images/userComment.png') }}" alt="avatar">
            </a> --}}
            <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                @if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('owner'))
                <img src="{{ asset('assets/images/omar.jpg') }}" alt="avatar">
                @else
                <img src="{{ asset('assets/images/userComment.png') }}" alt="avatar">
                @endif
            </a>


            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header">
                    <div class="media">
                        <div class="media-body">
                            <h5 class="mt-0 mb-0">{{ Auth::user()->name }}</h5>
                            <span>{{ Auth::user()->email }}</span>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-secondary ti-reload"></i>Activity</a>
                <a class="dropdown-item" href="#"><i class="text-success ti-email"></i>Messages</a>
                <a class="dropdown-item" href="#"><i class="text-warning ti-user"></i>Profile</a>
                <a class="dropdown-item" href="#"><i class="text-dark ti-layers-alt"></i>Projects <span
                        class="badge badge-info">6</span> </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"><i class="text-info ti-settings"></i>Settings</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">Log out</a>
                </form>
            </div>
        </li>
    </ul>
</nav>

<!--=================================
 header End-->
