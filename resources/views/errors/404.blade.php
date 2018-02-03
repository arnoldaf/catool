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
                        <h1><span id="404"></span></h1>
                        <h3><span id="404-txt"></span></h3>
                        <h4><span id="404-txt-2"></span></h4>
                        <br>
                        <div class="row" id="content-404">
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
                $("#404").typed({
                    strings: ["404"],
                    typeSpeed: 200,
                    backDelay: 500,
                    loop: false,
                    contentType: 'html',
                    loopCount: false,
                    callback: function() {
                        $('h1 .typed-cursor').css('-webkit-animation', 'none').animate({opacity: 0}, 400);
                        $("#404-txt").typed({
                            strings: ["It seems that this page doesn't exist or has been removed."],
                            typeSpeed: 1,
                            backDelay: 500,
                            loop: false,
                            contentType: 'html', 
                            loopCount: false,
                            callback: function() {
                                $('h3 .typed-cursor').css('-webkit-animation', 'none').animate({opacity: 0}, 400);
                                $("#404-txt-2").typed({
                                    strings: ["Go back to our site or <a href='mailbox-send.html'>contact us</a> about the problem. "],
                                    typeSpeed: 1,
                                    backDelay: 500,
                                    loop: false,
                                    contentType: 'html', 
                                    loopCount: false,
                                    callback: function() {
                                        $('#content-404').delay(300).slideDown();
                                    },
                                }); 
                            }
                        });  
                    }
                });  
            });
        </script>
      <script src="{{URL::asset('assets/admin/layout3/js/layout.js')}}"></script>
  </body>
</html>