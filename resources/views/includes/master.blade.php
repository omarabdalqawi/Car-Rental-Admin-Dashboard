<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    <style>
        table  td, table th{
        vertical-align:middle;
        text-align:center;
        padding:20px!important;
        }
      /* table th{
        background-color:#7e89a9;
      } */
        #img{
            border-radius: 32px;
        }
    </style>
</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
        <!-- main-content -->
        <div class="content-wrapper">

            @yield('page-header')

            @yield('content')

            <!--=================================wrapper -->

            <!--================================= footer -->

            @include('layouts.footer')
        </div> <!-- main content wrapper end-->
    </div>



    <!--=================================
 footer -->

    @include('layouts.footer-scripts')

</body>

</html>
