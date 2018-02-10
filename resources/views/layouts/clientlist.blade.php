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
                        <h2>Client <strong>List</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li><a href="client">Add Client</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 portlets">
                            <div class="panel">

                                <div class="panel-content pagination2 table-responsive">
                                    <!--
                                    <table class="table table-hover table-dynamic-om">
                                        <thead>
                                            <tr>
                                                <th>Rendering engine</th>
                                                <th>Browser</th>
                                                <th>Platform(s)</th>
                                                <th>Engine version</th>
                                                <th>CSS grade</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet Explorer 4.0</td>
                                                <td>Win 95+</td>
                                                <td>4</td>
                                                <td>X</td>
                                            </tr>
                                            <tr>
                                                <td>Trident</td>
                                                <td>Internet Explorer 5.0</td>
                                                <td>Win 95+</td>
                                                <td>5</td>
                                                <td>C</td>
                                            </tr>

                                            <tr>
                                                <td>Other browsers</td>
                                                <td>All others</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>U</td>
                                            </tr>
                                        </tbody>
                                    </table>-->

                                    <table id="clientlist" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>First name</th>
                                                <th>Last name</th>
                                                <th>Email</th>
                                                <th>Brand Name</th>
                                                <th>Registered Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
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
        <script src="{{URL::asset('assets/global/plugins/datatables/jquery.dataTables.min.js')}}"></script> <!-- Tables Filtering, Sorting & Editing -->
        <script src="{{URL::asset('assets/global/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/js/pages/table_dynamic.js')}}"></script>
        <!-- END PAGE SCRIPTS -->
    </body>
    <script>

$(document).ready(function () {
    $('#clientlist').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "getClients",
        "columns": [
            {data: 'id', name: 'id'},
            {data: 'first_name', name: 'first_name'},
            {data: 'last_name', name: 'last_name'},
            {data: 'email', name: 'email'},
            {data: 'brand_name', name: 'brand_name'},
            {data: 'created_at', name: 'created_at'}
        ],
        'columnDefs': [

            {
                'targets': 6,
                'searchable': false,
                'orderable': false,
                'className': 'dt-body-center',
                'render': function (data, type, full, meta) {
                    return '<div> <a class="btn btn-small btn-info" href="client/' + full.id + '">EDIT</a></div><div><a  class ="btn btn-warning" href="javascript:void(0)" onClick="deleteClient(' + full.id + ')">DELETE</a></div>';
                },
            },
        ]
    });



});

function deleteClient(id) {
    var conf = confirm('Are you sure you want to do this?');
    if(conf === true) {
        
         $.ajax({
            type: "get",
            url: SITE_URL + "/deleteClient/"+id, //Relative or absolute path to response.php file
            data: {},
            success: function (data) {
                if (data.result === false) {
                   alert(data);
                } else {
                   alert(data);
                }
            }
        });

    }

}
    </script>

</html>