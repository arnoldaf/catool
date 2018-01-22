<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.head') 
        <!-- BEGIN PAGE STYLE -->
        <link href="{{URL::asset('assets/global/plugins/metrojs/metrojs.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/global/plugins/maps-amcharts/ammap/ammap.css')}}" rel="stylesheet">
        <!-- END PAGE STYLE -->
    </head>

    <!-- BEGIN BODY -->
    <body class="sidebar-light fixed-topbar theme-sltl bg-light-dark color-default dashboard">
        <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <section>
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar"> @include('includes.sidebar')</div>
            <!-- END SIDEBAR -->
            <div class="main-content">
                <!-- BEGIN TOPBAR -->
                <div class="topbar">@include('includes.header')</div>
                <!-- END TOPBAR -->
                <!-- BEGIN PAGE CONTENT -->
                <div>
                    <h2>Welcome<strong>MYCATOOL</strong></h2>
                </div>
                <!-- END PAGE CONTENT -->

                <div class="footer">
                    <div class="copyright">
                        <p class="pull-left sm-pull-reset">
                            <span>Copyright <span class="copyright">©</span> 2018 </span>
                                <span>MyCATool</span>.
                            <span>All rights reserved. </span>
                        </p>
                        <p class="pull-right sm-pull-reset">
                            <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT -->
            <!-- BEGIN BUILDER -->

            <!-- END BUILDER -->
        </section>
        <!-- BEGIN QUICKVIEW SIDEBAR -->

        <!-- END QUICKVIEW SIDEBAR -->
        <!-- BEGIN SEARCH -->

        <!-- END SEARCH -->

        @include('includes.footer') 
        <!-- BEGIN PAGE SCRIPT -->
        <script src="{{URL::asset('assets/global/plugins/noty/jquery.noty.packaged.min.js')}}"></script>  <!-- Notifications -->
        <script src="{{URL::asset('assets/global/plugins/bootstrap-editable/js/bootstrap-editable.min.js')}}"></script> <!-- Inline Edition X-editable -->
        <script src="{{URL::asset('assets/global/plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js')}}"></script> <!-- Context Menu -->
        <script src="{{URL::asset('assets/global/plugins/multidatepicker/multidatespicker.min.js')}}"></script> <!-- Multi dates Picker -->
        <script src="{{URL::asset('assets/global/js/widgets/todo_list.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/metrojs/metrojs.min.js')}}"></script> <!-- Flipping Panel -->
        <script src="{{URL::asset('assets/global/plugins/charts-chartjs/Chart.min.js')}}"></script>  <!-- ChartJS Chart -->
        <script src="{{URL::asset('assets/global/plugins/charts-highstock/js/highstock.js')}}"></script> <!-- financial Charts -->
        <script src="{{URL::asset('assets/global/plugins/charts-highstock/js/modules/exporting.js')}}"></script> <!-- Financial Charts Export Tool -->
        <script src="{{URL::asset('assets/global/plugins/maps-amcharts/ammap/ammap.js')}}"></script> <!-- Vector Map -->
        <script src="{{URL::asset('assets/global/plugins/maps-amcharts/ammap/maps/js/worldLow.js')}}"></script> <!-- Vector World Map  -->
        <script src="{{URL::asset('assets/global/plugins/maps-amcharts/ammap/themes/black.js')}}"></script> <!-- Vector Map Black Theme -->
        <script src="{{URL::asset('assets/global/plugins/skycons/skycons.min.js')}}"></script> <!-- Animated Weather Icons -->
        <script src="{{URL::asset('assets/global/plugins/simple-weather/jquery.simpleWeather.js')}}"></script> <!-- Weather Plugin -->
        <script src="{{URL::asset('assets/global/js/widgets/widget_weather.js')}}"></script>
        <script src="{{URL::asset('assets/global/js/pages/dashboard.js')}}"></script>
        <!-- END PAGE SCRIPT -->

    </body>
</html>