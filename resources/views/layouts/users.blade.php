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
                        <h2>MY <strong>User</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li><a href="user">Add User</a>
                                </li>

                            </ol>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12 portlets">


                            <div class="panel">


                                <div class="panel-content pagination2 table-responsive">

                                    <table class="table table-bordered table-dynamic filter-footer">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Type</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Date of Reg</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @foreach($usersdata as $key => $value)
                                            <tr>
                                                <td>{{$value['client_code']}}</td>
                                                <td>Individual</td>
                                                <td>{{$value['first_name']}}</td>
                                                <td>{{$value['phone']}}</td>
                                                <td>{{$value['email']}}</td>
                                                <td>{{$value['created_at']}}</td>
                                                <td>Active</td>
                                                <td><a class="edit btn btn-sm btn-default" href="user/{{$value['id']}}"><i class="icon-note"></i></a></td>  
                                           
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
        <script src="{{URL::asset('assets/global/plugins/datatables/jquery.dataTables.min.js')}}"></script> 
        <!-- Tables Filtering, Sorting & Editing -->

        <script src="{{URL::asset('assets/global/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

        <script src="{{URL::asset('assets/global/js/pages/table_dynamic.js')}}"></script>
        <!-- END  PAGE SCRIPTS -->
    </body>
    
    
</html>