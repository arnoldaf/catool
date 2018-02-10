<!DOCTYPE html>
<html lang="en">
    <head>
        @include('includes.head') 
        <!-- BEGIN PAGE STYLE -->
        <link href="{{URL::asset('assets/global/plugins/step-form-wizard/css/step-form-wizard.min.css')}}" rel="stylesheet">
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
                        <h2>New <strong>User</strong></h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li><a href="#">Make</a>
                                </li>
                                <li><a href="#">User</a>
                                </li>
                                <li class="active">Create New User</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="panel panel-default no-bd">
                                <div class="panel-header bg-dark">
                                    <h2 class="panel-title"><strong>Create</strong> New User</h2>
                                </div>
                                <div class="panel-body bg-white">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <form role="form" class="form-validation"  method="post" id="create_users" name="create_users">
                                                <div id="basic-preview" class="preview active alert-message hide">
                                                    <div class="alert media fade in alert-danger">
                                                    </div>
                                                </div>
                                              
                                                {{ Form::open(array('url'=>'form-submit')) }}
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Firstname</label>
                                                            <div class="append-icon">
                                                                {{ Form::text('first_name',isset($user['first_name'])? $user['first_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter First Name','required')) }}
                                                               {{ Form::hidden('id', isset($user['id'])? $user['id'] : '',array('id'=>'','class'=>'form-control ')) }}
                                                                <i class="icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Lastname</label>
                                                            <div class="append-icon">
                                                                 {{ Form::text('last_name',isset($user['last_name'])? $user['last_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Last Name','required')) }}
                                                                <i class="icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Email Address</label>
                                                            <div class="append-icon">
                                                                {{ Form::email('client_email',isset($user['email'])? $user['email'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Client Email','required')) }}
                                                                <i class="icon-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Choose client type</label>
                                                            <div class="option-group">
                                                                 {{ Form::select('client_type',array(
'1'=>'Individual ','2'=>'Sole Proprietorship','3'=>'HUF (Hindu Undivided Family)','4'=>'AOP ( Association of Person )','5'=>'BOI ( Body of Individual )','6'=>'Limited Liability Partnership Firm','cs'=>'Private Limited Company','7'=>'Public Company'),'Individual') }}
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Phone Number</label>
                                                            <div class="append-icon">
                                                                 {{ Form::text('client_mobile',isset($user['mobile'])? $user['mobile'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Client Mobile','required')) }}
                                                                <i class="icon-screen-smartphone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Upload your avatar</label>
                                                            <div class="file">
                                                                <div class="option-group">
                                                                    <span class="file-button btn-primary">Choose File</span>
                                                                    <input type="file" class="custom-file" name="avatar" id="avatar" onchange="document.getElementById('uploader').value = this.value;" >
                                                                    <input type="text" class="form-control" id="uploader" placeholder="no file selected" readonly="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Password</label>
                                                            <div class="append-icon">
                                                                {{ Form::password('client_password',array('id'=>'password','class'=>'form-control ','placeholder'=>'Between 4 and 16 characters','minlength'=>'4', 'maxlength'=>'16', 'required' )) }}
                                                                <i class="icon-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Repeat your password</label>
                                                            <div class="append-icon">
                                                                 {{ Form::password('confirm_password',array('id'=>'password2','class'=>'form-control ','placeholder'=>'Must be equal to your first password..','minlength'=>'4', 'maxlength'=>'16', 'required')) }}
                                                                <i class="icon-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">What's the result of 4 + 8 ?</label>
                                                            <input type="text" name="calcul" class="form-control" placeholder="Human verification!">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label">Are you OK with our terms?</label>
                                                            <div class="option-group">
                                                                <label  for="terms" class="m-t-10">
                                                                    <input type="checkbox" name="terms" id="terms" data-checkbox="icheckbox_square-blue" required/>
                                                                    I agree with terms and conditions
                                                                </label>    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center  m-t-20">
                                                    <button type="submit" name='submit' class="btn btn-embossed btn-primary">Create</button>
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
        <script src="{{URL::asset('assets/global/plugins/jquery-validation/jquery.validate.js')}}"></script> <!-- Form Validation -->
        <script src="{{URL::asset('assets/global/plugins/jquery-validation/additional-methods.min.js')}}"></script> <!-- Form Validation Additional Methods - OPTIONAL -->
        <!-- END  PAGE SCRIPTS -->
    </body>
</html>