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
                        <h2>Document Master  <strong>List</strong>&nbsp;
                            <a href="{{ URL::to('documentmaster/create') }}">Add New</a></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li><a href="{{ URL::to('documentmaster/create') }}">Add New</a>
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
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Slug</th>
                                                <th>Description</th>
                                                <th>Created At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($documentmasters as $key => $value)
                                            <tr>
                                                <td>{{ $value->id }}</td>
                                                <td>{{ $value->title }}</td>
                                                <td>{{ $value->slug }}</td>
                                                <td>{{ str_limit($value->description, $limit = 80, $end = '...') }}</td>
                                                <td>{{ $value->created_at }}</td>
                                                <!-- add show, edit, and delete buttons -->
                                                <td>
                                                    <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
                                                    <!-- we will add this later since its a little more complicated than the first two buttons -->
                                                    {{ Form::open(array('url' => 'documentmaster/' . $value->id, 'class' => 'pull-right')) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}
                                                    {{ Form::submit('Delete', array('class' => 'delete-record btn btn-warning')) }}
                                                    {{ Form::close() }}

                                                    <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                                                    <a class="btn btn-small btn-success" href="{{ URL::to('documentmaster/' . $value->id) }}">Show</a>

                                                    <!-- edit this nerd (uses the edit method found at GET /nerds/{id}/edit -->
                                                    <a class="btn btn-small btn-info" href="{{ URL::to('documentmaster/' . $value->id . '/edit') }}">Edit</a>

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
                        
                        <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Do you want to delete this record?</p>
                                        <p class="debug-url"></p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-danger btn-ok confirm-delete">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="copyright">
                            <p class="pull-left sm-pull-reset">
                                <span>Copyright <span class="copyright">©</span> 2018 </span>
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
        
           <script>
            $(function () {
                var $this = '';
                //hang on event of form with class=delete-user
                $(".delete-record").click(function (e) {
                    //prevent Default functionality
                    e.preventDefault();
                    $this = $(this);
                    $('#confirm-delete').data('link',$this).modal('show');
                });

                $(".confirm-delete").click(function (e) {
                    //prevent Default functionality
                    e.preventDefault();
                    $this.closest("form").submit();

                });

            });

        </script>
        
    </body>
</html>