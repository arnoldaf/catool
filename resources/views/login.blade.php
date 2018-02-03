<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> MyCAtool.com </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="../assets/global/images/favicon.png">
        <link href="{{URL::asset('assets/global/css/style.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/global/css/ui.css')}}" rel="stylesheet">
        <link href="{{URL::asset('assets/global/plugins/bootstrap-loading/lada.min.css')}}" rel="stylesheet">
        <script> 
            var SITE_URL = "{{url('')}}";
        </script>
        <style> .alert { padding: 10px;} </style>
    </head>
    <body class="account2" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <i class="user-img icons-faces-users-03"></i>
            <div class="account-info">
                 
                <img src="{{URL::asset('assets/global/images/logo/mycatool-logo.png')}}" width="233" height="47" title="mycatools"> 
                <ul>
                    <li><i class="fa fa-database"></i>Data Security</li>     
                    <li><i class="icon-layers"></i>Bills Management</li>
                    <li><i class="icon-credit-card"></i>Payment Gateway</li>                    
                    <li><i class="icon-lock"></i>Financial Digital Locker</li>
                    <li><i class="icon-envelope-letter"></i>SMS and Email Notification</li>
                    <li></li>
                    <li style="text-align:center"><i>www.mycatool.com</i></li>
                </ul>
            </div>
            <div class="account-form">
                <div class="col-sm-12" style="padding:0px">
                    <div class="col-sm-3" style="padding-left:0px">
                         <img src="{{URL::asset('assets/global/images/clients/ca_logo.png')}}" title="client logo">
                    </div>
                    <div class="col-sm-9" style="padding-left:24px">
                        <h3 style="margin:0px 0px 9px 0px"><b> {{ Session::get('brand_name') }}</b></h3>
                        <span style="color: #81b84d; font-size: 12px; font-weight: bold"> CHARTERED ACCOUNTANT </span>
                    </div>    
                </div>
                <p> &nbsp; </p>
                {!! Form::open(['url' => '#', 'role' => 'form', 'class' => 'form-signin']) !!}
                
                    <h3><strong>Sign in</strong> to your account</h3>
                    <div class="alert alert-danger resp-msg hide"> This one </div>
                    <div class="append-icon">
                        <input type="text" name="email" id="email" class="form-control form-white username" placeholder="Email or Mobile Number" required>
                        <i class="icon-user"></i>
                    </div>
                    <div class="append-icon m-b-20">
                        <input type="password" name="password" id="password" class="form-control form-white password" placeholder="Password" required>
                        <i class="icon-lock"></i>
                    </div>
                    <button type="submit" id="submit-form" class="btn btn-lg btn-dark btn-rounded ladda-button" data-style="expand-left">Sign In</button>
                    <span class="forgot-password"><a id="password" href="account-forgot-password.html">Forgot password?</a></span>
                    
                {!! Form::close() !!}
                <!--<form class="form-password" role="form">
                    <h3><strong>Reset</strong> your password</h3>
                    <div class="append-icon m-b-20">
                        <input type="password" name="password" class="form-control form-white password" placeholder="Password" required>
                        <i class="icon-lock"></i>
                    </div>
                    <button type="submit" id="submit-password" class="btn btn-lg btn-danger btn-block ladda-button" data-style="expand-left">Send Password Reset Link</button>
                    <div class="clearfix m-t-60">
                        <p class="pull-left m-t-20 m-b-0"><a id="login" href="#">Have an account? Sign In</a></p>
                        <p class="pull-right m-t-20 m-b-0"><a href="user-signup2.html">New here? Sign up</a></p>
                    </div>
                </form> -->
            </div>
            <!--<div id="account-builder">
                 <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <i class="fa fa-spin fa-gear"></i> 
                            <h3><strong>Customize</strong> Login Page</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Social Login</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="social-cb" type="checkbox" class="switch-input" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Background Image</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="image-cb" type="checkbox" class="switch-input" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Background Slides</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="slide-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">User Image</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="user-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> -->
            <p class="account-copyright">
                <span>Copyright © 2018 </span><span>MyCaTool.com</span>.<span> All rights reserved.</span>
            </p>
        </div>
        <!-- END LOCKSCREEN BOX -->
        
       <script src="{{URL::asset('assets/global/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/gsap/main-gsap.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/tether/js/tether.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/backstretch/backstretch.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/bootstrap-loading/lada.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/js/pages/login-v2.js?'.time())}}"></script>
    </body>
</html>