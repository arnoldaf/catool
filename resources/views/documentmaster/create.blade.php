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
                        <h2>Document Master</h2>
                       
                    </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
					<div class="row">
						<div class="col-md-12 portlets">
						  <div class="panel">
							<div class="panel-header panel-controls">
							  <h3><i class="icon-note"></i> <strong>Add</strong> Document Master</h3>
							</div>
							
							 {{ Form::open(array('url'=>'documentmaster')) }}
							 
							<div class="panel-content">
															
							  <div class="row">
								<div class="col-md-7">
								  <h3> <strong>Title</strong></h3>
								  <input style="" name="title" class="form-control form-white" type="text" placeholder="Subject">
								</div>
                                                              <div class="col-md-7">
								  <h3> <strong>Slug</strong></h3>
								  <input style="" name="slug" class="form-control form-white" type="text" placeholder="Subject">
								</div>
								
								<div class="col-md-7">
								  <h3>Description<strong></strong></h3>
								  <textarea class="form-control form-white" name="description"></textarea>
								</div>
								
								<div class="col-sm-9 col-sm-offset-3">
									<div class="pull-left">
									<p>&nbsp;</p>
									  <button type="submit" class="btn btn-embossed btn-primary m-r-20">Save</button>
									  <a href="{{ URL::to('documentmaster') }}"><button type="button" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel</button></a>
									</div>
								  </div>
						  
								
							  </div>
							</div>
							{{ Form::close() }}
							
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
		<!-- BEGIN PAGE SCRIPTS -->
		<script src="{{URL::asset('assets/global/plugins/summernote/summernote.min.js')}}"></script> <!-- Simple HTML Editor -->
		<script src="{{URL::asset('assets/global/plugins/cke-editor/ckeditor.js')}}"></script> <!-- Advanced HTML Editor -->
		<script src="{{URL::asset('assets/global/plugins/typed/typed.min.js')}}"></script> <!-- Animated Typing -->
		<script src="{{URL::asset('/assets/global/js/pages/editor.js')}}"></script>
		
		
		<!-- END PAGE SCRIPTS -->
	
    </body>
</html>