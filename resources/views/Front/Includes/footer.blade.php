
@section('footer')
    <div class="footer-w3l">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-3 footer-grid">
                            <img src="{{URL::to('Images/mainlogo.png')}}" align="left">
                    <ul>
                        <li><p><span class="glyphicon glyphicon-map-marker"> Putalisadak Kathmandu Nepal</span></p></li>
                        <li><p><span class="glyphicon glyphicon-envelope"> hello@miskiweb.com</span></p></li>
                        <li><p><span class="glyphicon glyphicon-phone-alt"> 977-878857655, 879868768</span></p></li>
                        <li><p><span class="glyphicon glyphicon-globe"> www.miksiweb.com</span></p></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4>My Account</h4>
                    <ul>
                        <li><a href="">Checkout</a></li>
                        <li><a href="{{URL::to('register')}}">Login</a></li>
                        <li><a href="{{URL::to('register')}}"> Create Account </a></li>

                        <li><a href="">Terms</a></li>
                        <li><a href=""> Privacy </a></li>
                        <li><a href=""> Blog</a></li>
                    </ul>
                </div>
                <div class="col-md-3 footer-grid">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="">About</a></li>
                        <li><a href="">Products</a></li>
                        <li><a href="">FAQs</a></li>
                        <li><a href="">Mail Us</a></li>

                    </ul>
                </div>
                <div class="col-md-3 footer-grid foot">
                    <h4>Social links</h4>
                    <div class="social-login">

                        <ul>
                            <li><a href=""><i class="fa fa-facebook"></i> Facebook</a></li><hr>
                            <li><a href=""><i class="fa fa-google-plus"></i> Google+</a></li>

                        </ul>
                    </div>

                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
    <!---footer--->
    <!--copy-->
    <div class="copy-section">
        <div class="container">
            <div class="copy-left">
                <p>&copy;2017 Miksiweb.com . All rights reserved</p>
            </div>
            {{--<img class="copy-right">--}}
            <p>Payment Partner</p>
            <a href=""><img src="{{URL::to('Images/esewa.jpg')}}" alt=""/></a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
 <script src="{{URL::to('js/Front/jquery.min.js')}}"></script>
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
   
    <!--search jQuery-->
    <script src="{{URL::to('js/Front/main.js')}}"></script>
    <!--search jQuery-->
    <script type="text/javascript" src="{{URL::to('js/Front/bootstrap-3.1.1.min.js')}}"></script>
    <!-- cart -->
    <script src="{{URL::to('js/Front/simpleCart.min.js')}}"></script>
    <!-- cart -->
    <script defer src="{{URL::to('js/Front/jquery.flexslider.js')}}"></script>
    <script src="{{URL::to('js/Front/imagezoom.js')}}"></script>

    <script>
        // Can also be used with $(document).ready()
        $(window).load(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>

    <!--mycart-->
    <!--start-rate-->
    <script src="{{URL::to('js/Front/jstarbox.js')}}"></script>
    <script type="text/javascript">
        jQuery(function() {
            jQuery('.starbox').each(function() {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function(event, value) {
                    if(starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' '+val);
                        return val;
                    }
                })
            });
        });
    </script>
    <script src="{{URL::to('js/Front/owl.carousel.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("#owl-demo").owlCarousel({
                items : 1,
                lazyLoad : true,
                autoPlay : true,
                navigation : false,
                navigationText :  false,
                pagination : true,
            });
        });
    </script>

    </body>
    </html>
@endsection