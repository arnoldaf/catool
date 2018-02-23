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
                        <h2>Email Profile Setting <strong>List</strong>&nbsp;
                            <a href="{{ URL::to('/admin/email-profiles/create') }}">Add New</a></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li><a href="{{ URL::to('/admin/email-profiles/create') }}">Add New</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- will be used to show any messages -->
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12 portlets">
                            <div class="panel">

                                <div class="panel-content pagination2 table-responsive">
                                    <table class="table table-hover table-dynamic">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Host</th>
                                                <th>Port</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($emailprofiles as $key => $value)
                                            <tr>
                                                <td>{{ $value->name }}</td>
                                                <td>{{ $value->host }}</td>
                                                <td>{{ $value->port }}</td>
                                                <td>{{ $value->email }}</td>
                                                <td>{{ $value->password }}</td>
                                                <td>{{ $value->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <!-- add show, edit, and delete buttons -->
                                                <td>
                                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                                    <!-- we will add this later since its a little more complicated than the first two buttons -->
                                                    {{ Form::open(array('url' => '/admin/email-profiles/' . $value->id, 'class' => 'pull-right')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
                                                    {{ Form::close() }}

                                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                                    <a class="btn btn-small btn-success" href="{{ URL::to('/admin/email-profiles/' . $value->id) }}">Show</a>

                                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                    <a class="btn btn-small btn-info" href="{{ URL::to('/admin/email-profiles/' . $value->id . '/edit') }}">Edit</a>

                                                </td>
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
        <script src="{{URL::asset('assets/global/plugins/datatables/jquery.dataTables.min.js')}}"></script> <!-- Tables Filtering, Sorting & Editing -->
        <script src="{{URL::asset('assets/global/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/js/pages/table_dynamic.js')}}"></script>
        <!-- END PAGE SCRIPTS -->
    </body>
</html>