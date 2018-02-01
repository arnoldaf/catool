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
                        <h2>MY <strong>User</strong></h2>
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
                                                                <label for="exampleInput"> First Name</label>
                                                                {{ Form::text('first_name','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter First Name')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput"> Middle Name</label>
                                                                {{ Form::text('middle_name','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Middle Name')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput"> Last Name</label>
                                                                {{ Form::text('last_name','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Last Name')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Type</label>
                                                                {{ Form::select('client_type',array('individual'=>'Individual','sole_proprietorship'=>'Sole Proprietorship','HUF'=>'HUF (Hindu Undivided Family)','AOP'=>'AOP ( Association of Person )','BOI'=>'BOI ( Body of Individual )','limited_liability_partnership_firm'=>'Limited Liability Partnership Firm','private_limited_company'=>'Private Limited Company','public_company'=>'Public Company'),'Individual') }}
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">User Code</label>
                                                                {{ Form::text('client_code','CA-MYCA-218',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Client Code')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Email</label>
                                                                {{ Form::email('client_email','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Client Email')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Mobile</label>
                                                                {{ Form::text('client_mobile','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Client Mobile')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Login Password</label>
                                                                {{ Form::password('client_password',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Client Password')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Confirm Login Password</label>
                                                                {{ Form::password('confirm_password',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Confirm Password')) }}
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
                                                                {{ Form::text('phone','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Personal Phone')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Email</label>
                                                                {{ Form::text('personal_email','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Personal Email')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Address</label>
                                                                {{ Form::text('address','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Address')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">City</label>
                                                                {{ Form::text('city','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter City')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">State</label>
                                                                {{ Form::text('state','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter State')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Country</label>
                                                                {{ Form::text('country','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Country')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Zip Code</label>
                                                                {{ Form::text('zipcode','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter ZipCode')) }}
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
                                                                {{ Form::text('office_address','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Office Address')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label for="exampleInput">Office Phone</label>
                                                                {{ Form::text('office_phone','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Office Phone')) }}
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
                                                                {{ Form::text('gst_number','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter GST Number')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">PAN Number</label>
                                                                {{ Form::text('pan_number','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter PAN Number')) }}
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInput">Adhar Number</label>
                                                                {{ Form::text('adhar_number','',array('id'=>'','class'=>'form-control required','placeholder'=>'Enter Adhar Number')) }}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">

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