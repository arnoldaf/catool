<!DOCTYPE html>
<html>
    <head>
        @include('../includes.head');
    </head>
    <body class="sidebar-light error-page">
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12">
                <div class="error-container">
                    <div class="error-main">
                        <h2><span id="403"></span></h2>
                        
                        <br>
                        <div class="row" id="content-403">
                            <div class="col-md-6 col-md-offset-3 text-center">
                                
                            </div>
                            <div class="col-md-12 text-center">
                                <br><br>
                                <p>OR</p>
                                <br><br><br>
                                <div class="btn-group">
                                    <a class="btn btn-white" href="{{url('')}}">
                                    <i class="fa fa-angle-left"></i> Go back
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        <script src="{{URL::asset('assets/global/plugins/jquery/jquery-3.1.0.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/jquery/jquery-migrate-3.0.0.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/tether/js/tether.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{URL::asset('assets/global/plugins/typed/typed.js')}}"></script>
        <script>
            $(function(){
                $("#403").typed({
                    strings: ["Unauthorized Access"],
                    typeSpeed: 200,
                    backDelay: 500,
                    loop: false,
                    contentType: 'html',
                    loopCount: false,
                    callback: function() {
                        $('h2 .typed-cursor').css('-webkit-animation', 'none').animate({opacity: 0}, 400);
                        $("#403-txt").typed({
                            strings: [""],
                            typeSpeed: 1,
                            backDelay: 500,
                            loop: false,
                            contentType: 'html', 
                            loopCount: false,
                            
                        });  
                    }
                });  
            });
        </script>
      <script src="{{URL::asset('assets/admin/layout3/js/layout.js')}}"></script>
  </body>
</html>