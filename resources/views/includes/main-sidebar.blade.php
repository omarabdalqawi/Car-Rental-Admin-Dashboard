<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <!-- menu item Dashboard-->
                    <!-- menu title -->

                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">{{ trans('dashboard.pages') }} </li>


                    <li>
                        <a href="{{route('dashboard')}}"><i class="ti-home text-danger mt-10"></i><span class="right-nav-text">{{ trans('dashboard.dashboard') }}</span> </a>
                    </li>
                    <!-- menu item list-->
                    <li>
                        <a href="{{route('products.index')}}"><i class="ti-pencil-alt text-success"></i><span class="right-nav-text">{{ trans('dashboard.products') }}</span> </a>
                    </li>
                    @can('user-list')
                    <li>
                        <a href="{{route('users.index')}}"><i class="text-warning ti-user"></i><span class="right-nav-text">{{ trans('dashboard.users') }}</span> </a>
                    </li>
                   @endcan
                    @can('role-list')
                    <li>
                        <a href="{{route('roles.index')}}"><i class="text-info ti-settings"></i><span class="right-nav-text">{{ trans('dashboard.roles') }}</span> </a>
                    </li>
                    @endcan
                    <li>
                        <a href="{{route('cars.index')}}"><i class="ti-truck text-primary"></i><span class="right-nav-text">{{ trans('dashboard.cars') }}</span> </a>
                    </li>
                    <!-- menu item Auth-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">
                            <div class="pull-left"><i class="ti-reload"></i><span
                                    class="right-nav-text">{{ trans('dashboard.auth') }}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="auth" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('signin')}}">{{ trans('dashboard.login') }}</a></li>
                            <li><a href="{{route('signup')}}">{{ trans('dashboard.singup') }}</a></li>

                        </ul>
                    </li>

            @endguest


                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
