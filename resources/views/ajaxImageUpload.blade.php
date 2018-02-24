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
                        <h2>Document <strong>Upload</strong>&nbsp;
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li><a href="{{ URL::to('smstemplates/create') }}">Add New</a>
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
                                
                                <div class="panel-content">
                                 <div class="container">
                                     
                                      <form enctype="multipart/form-data">
                        <div class="form-group">
                          <p><strong>File selector</strong>
                          </p>
                          <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                            <div class="form-control" data-trigger="fileinput">
                              <i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>
                            </div>
                            <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Choose...</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="...">
                            </span>
                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                          </div>
                        </div>
                        <hr>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                          <p><strong>Image uploader</strong></p>
                          <div class="fileinput-new thumbnail">
                            <img data-src="" src="../assets/global/images/gallery/3.jpg" class="img-responsive" alt="gallery 3">
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Select image...</span><span class="fileinput-exists">Change</span>
                            <input type="file" name="...">
                            </span>
                            <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                          </div>
                        </div>
                      </form>
                                     
                                       <div class="col-md-9" > 
                                           
                                        <form action="{{ route('ajaxImageUpload') }}" enctype="multipart/form-data" method="POST">


                                            <div class="alert alert-danger print-error-msg" style="display:none">
                                                <ul></ul>
                                            </div>


                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                            
                                            <div class="form-group">
                                                <label>Rent Agrrement:</label>
                                                <input type="file" name="document1" class="form-control form-white">
                                            </div>
                                            
                                            <div class="form-group">
                                                <p><strong>File selector</strong>
                                                </p>
                                                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                  <div class="form-control" data-trigger="fileinput">
                                                    <i class="glyphicon glyphicon-file fileinput-exists"></i><span class="fileinput-filename"></span>
                                                  </div>
                                                  <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Choose...</span><span class="fileinput-exists">Change</span>
                                                  <input type="file" name="...">
                                                  </span>
                                                  <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                              </div>
                                            
                                            
                                            <div class="form-group">
                                                <label>Form 16:</label>
                                                <input type="file" name="document2" class="form-control form-white">
                                            </div>
                                             <div class="form-group">
                                                <label>Medical Bill:</label>
                                                <input type="file" name="document3" class="form-control form-white">
                                            </div>


                                            <div class="form-group">
                                                <button class="btn btn-success upload-image" type="submit">Save</button><button class="btn btn-success upload-image" type="button">Cancel</button>
                                            </div>


                                        </form>
                                       </div>

                                    </div>
                                
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
                                        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Documents uploaded Successfully.</p>
                                        <p class="debug-url"></p>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
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
        <script src="{{URL::asset('assets/global/plugins/dropzone/dropzone.min.js')}}"></script>  <!-- Upload Image & File in dropzone -->
        <!-- END PAGE SCRIPTS -->
        
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script type="text/javascript">
                                    $("body").on("click", ".upload-image", function (e) {
                                        $(this).parents("form").ajaxForm(options);
                                    });

                                    var options = {
                                        complete: function (response)
                                        {
                                            if ($.isEmptyObject(response.responseJSON.error)) {
                                                //$("input[name='title']").val('');
						$('.modal').modal('show');
                                                //alert('Documents uploaded Successfully.');
                                            } else {
                                                printErrorMsg(response.responseJSON.error);
                                            }
                                        }
                                    };


                                    function printErrorMsg(msg) {
                                        $(".print-error-msg").find("ul").html('');
                                        $(".print-error-msg").css('display', 'block');
                                        $.each(msg, function (key, value) {
                                            $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
                                        });
                                    }
                                    </script>
    </body>
</html>

