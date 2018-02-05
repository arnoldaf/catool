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

                                            <form class="wizard" data-style="arrow" role="form" method="post" id="create_client" name="create_client">
                                                <div id="basic-preview" class="preview active alert-message hide">
                                                    <div class="alert media fade in alert-danger">
                                                    </div>
                                                </div>


                                                {{ Form::open(array('url'=>'form-submit')) }}
                                                <fieldset>
                                                    <legend>Basic</legend>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Client First Name</label>
                                                                {{ Form::text('first_name', isset($user['first_name'])? $user['first_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter First Name')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Client Middle Name</label>
                                                                {{ Form::text('middle_name',isset($user['middle_name'])? $user['middle_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Middle Name')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Client Last Name</label>
                                                                {{ Form::text('last_name',isset($user['last_name'])? $user['last_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Last Name')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Type</label>
                                                                {{ Form::select('client_type',array('ca'=>'CA','lawyer'=>'Lawyer','cs'=>'CS'),'CA') }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">URL</label>
                                                                {{ Form::text('url',isset($user['url'])? $user['url'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Client URL')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Client Code</label>
                                                                {{ Form::text('client_code','CA-MYCA218',array('id'=>'','class'=>'form-control','placeholder'=>'Enter Client Code')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Email</label>
                                                                {{ Form::email('client_email',isset($user['email'])? $user['email'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Client Email')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Mobile</label>
                                                                {{ Form::text('client_mobile',isset($user['mobile'])? $user['mobile'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Client Mobile')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Login Password</label>
                                                                {{ Form::password('client_password',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Client Password')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Confirm Login Password</label>
                                                                {{ Form::password('confirm_password',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Confirm Password')) }}
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
                                                                {{ Form::text('phone',isset($user['phone'])? $user['phone'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Personal Phone')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Email</label>
                                                                {{ Form::text('personal_email',isset($user['personal_email'])? $user['personal_email'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Personal Email')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Address</label>
                                                                {{ Form::text('address',isset($user['address'])? $user['address'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Address')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">City</label>
                                                                {{ Form::text('city',isset($user['city_name'])? $user['city_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter City')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">State</label>
                                                                {{ Form::text('state',isset($user['state_id'])? $user['state_id'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter State')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Country</label>
                                                                {{ Form::text('country',isset($user['country_id'])? $user['country_id'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Country')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Zip Code</label>
                                                                {{ Form::text('zipcode',isset($user['zipcode'])? $user['zipcode'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter ZipCode')) }}
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
                                                                {{ Form::text('office_address',isset($user['office_address'])? $user['office_address'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Office Address')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Office Phone</label>
                                                                {{ Form::text('office_phone',isset($user['office_phone'])? $user['office_phone'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Office Phone')) }}
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
                                                                {{ Form::text('gst_number',isset($user['gst_number'])? $user['gst_number'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter GST Number')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">PAN Number</label>
                                                                {{ Form::text('pan_number',isset($user['pan_number'])? $user['pan_number'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter PAN Number')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Adhar Number</label>
                                                                {{ Form::text('adhar_number',isset($user['adhar_number'])? $user['adhar_number'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Adhar Number')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Brand Name/Tag Name</label>
                                                                {{ Form::text('brand_name',isset($user['brand_name'])? $user['brand_name'] : '',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Brand Name')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Referral Code </label>
                                                                {{ Form::text('referal_code','',array('id'=>'','class'=>'form-control ','placeholder'=>'Enter Referral Code')) }}
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