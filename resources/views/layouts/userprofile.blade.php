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

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel">

                                <div>
                                    <div class="tab_left">
                                        <ul  class="nav nav-tabs nav-red">
                                            <li class="active"><a href="#tab3_1" data-toggle="tab">Profile</a></li>
                                            <li><a href="#tab3_2" data-toggle="tab">Financial</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-Trial Balance</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-P/L Account</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-Balance Sheet</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-IT Statement</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-IT Returns</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-Form 16, 16 A</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-Misc Documents</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-CA Certificates</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-Pending Documents</a></li>
                                            <li><a href="#tab3_3" data-toggle="tab">-Other Documents</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade  active in" id="tab3_1">
                                                <div class="col-md-12">
                                                    <div class="panel panel-default no-bd">
                                                        <div class="panel-header bg-dark">
                                                            <h2 class="panel-title"><strong>Update</strong> Profile</h2>
                                                        </div>
                                                        <div class="panel-body bg-white">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">

                                                                    <form role="form" class="form-validation"  method="post" id="create_users" name="create_users">
                                                                        {{ Form::open(array('url'=>'form-submit')) }}
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">First Name</label>
                                                                                    <div class="append-icon">
                                                                                        {{ Form::text('first_name', isset($user['first_name'])? $user['first_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter First Name')) }}
                                                                                        {{ Form::hidden('id', isset($user['id'])? $user['id'] : '',array('id'=>'','class'=>'form-control ')) }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Last Name</label>
                                                                                    <div class="append-icon">
                                                                                        {{ Form::text('last_name', isset($user['last_name'])? $user['last_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Last Name')) }}

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Email Address</label>
                                                                                    <div class="append-icon">
                                                                                        {{ Form::email('email', isset($user['last_name'])? $user['email'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Email Address')) }}

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Phone Number</label>
                                                                                    <div class="append-icon">
                                                                                        {{ Form::text('phone', isset($user['phone'])? $user['phone'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Phone')) }}
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">City</label>
                                                                                    <div class="append-icon">
                                                                                        {{ Form::text('city', isset($user['city_name'])? $user['city_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter City')) }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">State</label>
                                                                                    <div class="append-icon">
                                                                                        {{ Form::text('state', isset($user['state_id'])? $user['state_id'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter State')) }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">PAN</label>
                                                                                    <div class="append-icon">
                                                                                        {{ Form::text('pan_number', isset($user['pan_number'])? $user['pan_number'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter PAN Number')) }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">PAN Uploader</label>
                                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">

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
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Adhar</label>
                                                                                    <div class="append-icon">
                                                                                        {{ Form::text('adhar_number', isset($user['adhar_number'])? $user['adhar_number'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter ADHAR Number')) }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Adhar Uploader</label>
                                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">

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
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">New Password</label>
                                                                                    <div class="append-icon">
                                                                                        <input type="password" name="n_password" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Confirm Password</label>
                                                                                    <div class="append-icon">
                                                                                        <input type="password" name="c_password" class="form-control"  placeholder="Confirm Password">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Income Tax Filing</label>
                                                                                    <div class="append-icon"> https://incometaxindiaefiling.gov.in/

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">User ID</label>
                                                                                    <div class="append-icon">
                                                                                        <input type="text" name="itr_id" id="itr_id" class="form-control" placeholder="User ID" >
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">Password</label>
                                                                                    <div class="append-icon">
                                                                                        <input type="password" name="mobile" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label">DOB</label>
                                                                                    <div class="append-icon">
                                                                                        <input type="date" name="dob" class="form-control"  placeholder="DOB">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="text-center  m-t-20">
                                                                            <button name="submit" type="submit" class="btn btn-embossed btn-primary">Update</button>
                                                                            <button type="reset" class="cancel btn btn-embossed btn-default m-b-10 m-r-0">Cancel</button>
                                                                        </div>
                                                                        {{ Form::close() }}
                                                                    </form>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab3_2">
                                                <h4>"SOONER OR LATER, THOSE WHO WIN ARE THOSE WHO THINK THEY CAN."</h4>
                                                <p>Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                                            </div>
                                            <div class="tab-pane fade" id="tab3_3">
                                                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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