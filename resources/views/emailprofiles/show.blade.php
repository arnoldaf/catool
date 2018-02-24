<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.head') 
        <!-- BEGIN PAGE STYLE -->
        <link href="{{URL::asset('assets/global/plugins/datatables/dataTables.min.css')}}" rel="stylesheet">
        <!-- END PAGE STYLE -->             
    </head>
    <!-- BEGIN BODY -->
    <body class="sidebar-light fixed-topbar theme-sltl bg-light-dark color-default">
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
                <div class="page-content">
                    <div class="header">
                        <h2>Email Profile </h2>
                        <!--                        <div class="breadcrumb-wrapper">
                                                    <ol class="breadcrumb">
                                                        <li><a href="dashboard.html">Make</a>
                                                        </li>
                                                        <li><a href="tables.html">Tables</a>
                                                        </li>
                                                        <li class="active">Tables Dynamic</li>
                                                    </ol>
                                                </div>-->
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <h4><strong>Name: </strong> {{ $emailprofile->name }}</h4>
                            <h4><strong>Host: </strong> {{ $emailprofile->host }}</h4>
                            <h4><strong>Port: </strong> {{ $emailprofile->port }}</h4>
                            <h4><strong>Email: </strong> {{ $emailprofile->email }}</h4>
                            <h4><strong>Password: </strong> {{ $emailprofile->password }}</h4>
                            <h3><strong>Created At:</strong> {{ $emailprofile->created_at }}</h3>
              
                        </div>


                    </div>

                    <div class="footer">
                        <div class="copyright">
                            <p class="pull-left sm-pull-reset">
                                <span>Copyright <span class="copyright">©</span> 2016 </span>
                                <span>THEMES LAB</span>.
                                <span>All rights reserved. </span>
                            </p>
                            <p class="pull-right sm-pull-reset">
                                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- END PAGE CONTENT -->
            </div>
            <!-- END MAIN CONTENT -->

        </section>

        @include('includes.footer') 
        <!-- BEGIN PAGE SCRIPTS -->
        <script src="{{URL::asset('assets/global/plugins/datatables/jquery.dataTables.min.js')}}"></script> <!-- Tables Filtering, Sorting & Editing -->
        <script src="{{URL::asset('assets/global/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/js/pages/table_dynamic.js')}}"></script>
        <!-- END PAGE SCRIPTS -->
    </body>
</html>