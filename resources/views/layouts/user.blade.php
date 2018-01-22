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
                <div class="page-content page-wizard">
                    <div class="header">
                        <h2>MY <strong>Client</strong></h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs tabs-linetriangle">
                                <ul class="nav nav-tabs"></ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="style">
                                        <div class="wizard-div current wizard-arrow">
                                            <form class="wizard" data-style="arrow" role="form">
                                                {{ Form::open(array('url'=>'form-submit')) }}
                                                <fieldset>
                                                    <legend>Basic</legend>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Client First Name</label>
                                                                {{ Form::text('first_name','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter First Name','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Client Middle Name</label>
                                                                {{ Form::text('middle_name','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Middle Name','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Client Last Name</label>
                                                                {{ Form::text('last_name','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Last Name','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Type</label>
                                                                {{ Form::select('client_type',array('ca'=>'CA','lawyer'=>'Lawyer','cs'=>'CS'),'CA') }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">URL</label>
                                                                {{ Form::url('url','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Client URL','required'=>'required')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Client Code</label>
                                                                {{ Form::text('client_code','CA-MYCA218',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Client Code','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Email</label>
                                                                {{ Form::email('client_email','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Client Email','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Mobile</label>
                                                                {{ Form::text('client_mobile','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Client Mobile','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Login Password</label>
                                                                {{ Form::text('client_password','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Client Password','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Confirm Login Password</label>
                                                                {{ Form::text('confirm_password','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Confirm Password','required'=>'required')) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Primary Contact</legend>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Phone Number</label>
                                                                {{ Form::text('phone','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Personal Phone','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Email</label>
                                                                {{ Form::text('personal_email','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Personal Email','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Address</label>
                                                                {{ Form::text('address','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Address','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">City</label>
                                                                {{ Form::text('city','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter City','required'=>'required')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">State</label>
                                                                {{ Form::text('state','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter State','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Country</label>
                                                                {{ Form::text('country','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Country','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Zip Code</label>
                                                                {{ Form::text('zipcode','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter ZipCode','required'=>'required')) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Office Contact</legend>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Office Address</label>
                                                                {{ Form::text('office_address','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Office Address','required'=>'required')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Office Phone</label>
                                                                {{ Form::text('office_phone','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Office Phone','required'=>'required')) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <legend>Other</legend>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">GST Number</label>
                                                                {{ Form::text('gst_number','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter GST Number','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">PAN Number</label>
                                                                {{ Form::text('pan_number','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter PAN Number','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Adhar Number</label>
                                                                {{ Form::text('adhar_number','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Adhar Number','required'=>'required')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Brand Name/Tag Name</label>
                                                                {{ Form::text('brand_name','',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Brand Name','required'=>'required')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Plan Type</label>
                                                                {{ Form::select('plan_type',array('free'=>'Free','1_month'=>'1 Month','3_month'=>'3 Month','6_month'=>'6 Month','12_month'=>'12 Month'),'enabled') }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Status</label> 
                                                                {{ Form::radio('status','enabled',true) }} Enabled
                                                                {{ Form::radio('status','disabled') }} Disabled
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
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
                <!-- END PAGE CONTENT -->
            </div>
            <!-- END MAIN CONTENT -->

        </section>

        @include('includes.footer') 
        <!-- BEGIN PAGE SCRIPTS -->
        <script src="{{URL::asset('assets/global/plugins/step-form-wizard/plugins/parsley/parsley.min.js')}}"></script> <!-- OPTIONAL, IF YOU NEED VALIDATION -->
        <script src="{{URL::asset('assets/global/plugins/step-form-wizard/js/step-form-wizard.js')}}"></script> <!-- Step Form Validation -->
        <script src="{{URL::asset('assets/global/js/pages/form_wizard.js')}}"></script>
        <!-- END PAGE SCRIPTS -->
    </body>
</html>