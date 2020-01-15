<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom Theme files -->
    <link href="{{ asset('css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- //Custom Theme files -->

    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- //online-fonts -->

    <style type="text/css">
        .first-column {
            width: 48%;
            float: left;
        }

        .second-column {
            width: 48%;
            float: right;
        }
    </style>

    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
            @if (Session::get('success'))
            $('#userMessageModal').modal('show');//For Success Message
            @endif
            @if(Session::get('error'))
            $('#userLoginModal').modal('show'); //For Login Error Message
            @endif
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

</head>
<body>
<!-- Header -->
@include('inc.navbar')
<!-- //Header -->

<!-- page Content -->
@yield('content')
<!-- //page Content -->




<!-- Footer -->
@yield('footer')
<!-- //Footer -->

<!-- //Login Registration section -->

<!-- User Message-->
<div class="modal fade" id="userMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userMessageModal">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if (Session::get('success'))
                    <div class="alert alert-success alert-block" style="overflow: hidden">
                        @if(is_array(Session::get('success')))
                            <ul>
                                @foreach(Session::get('success') as $msg)
                                    <li><strong>{!! $msg !!}</strong></li>
                                @endforeach
                            </ul>
                        @else
                            <strong>{!! Session::get('success') !!}</strong>

                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- //User Message -->

<!-- Login modal -->
<div class="modal fade" id="userLoginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">User Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @if (Session::get('error'))
                <div class="alert alert-danger alert-block" style="overflow: hidden">
                    @if(is_array(Session::get('error')))
                        <ul>
                            @foreach(Session::get('error') as $msg)
                                <li><strong>{!! $msg !!}</strong></li>
                            @endforeach
                        </ul>
                    @else
                        <strong>{!! Session::get('error') !!}</strong>

                    @endif
                </div>
            @endif
            <div class="modal-body">
                <form action="{{ url('verify-user') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-email" class="col-form-label">Email</label>
                        <input type="email" class="form-control border" placeholder="example@email.com" name="user_login_email" id="recipient-email" required="">
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-form-label">Password</label>
                        <input type="password" class="form-control border" placeholder="Enter your password" name="user_login_password" id="password" required="">
                    </div>
                    <div class="right-w3l">
                        <input type="submit" class="form-control border text-white btn-theme" value="Login">
                    </div>
                    <div class="row sub-w3l my-3">
                        <div class="col sub-agile">
                            <input type="checkbox" id="brand1" value="">
                            <label for="brand1" class="text-muted">
                                <span></span>Remember me?</label>
                        </div>
                        <div class="col forgot-w3l text-right text-dark">
                            <a href="#" class="text-white">Forgot Password?</a>
                        </div>
                    </div>
                    <p class="text-center">Don't have an account?
                        <a href="#" data-toggle="modal" data-target="#userRegisterModa1" class="text-secondary font-weight-bold">
                            Register Now</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //Login modal -->
<!-- Register modal -->
<div class="modal fade" id="userRegisterModa1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body" style="padding:0rem 3rem 3rem 3rem">
                <form action="{{ url('save-user-data') }}" method="post">
                {{ csrf_field() }}
                <!--First Column-->
                    <div class="first-column">
                        <div class="form-group">
                            <label for="recipient_full_name" class="col-form-label">Full Name</label>
                            <input type="text" class="form-control border" placeholder="Enter your name" name="name" id="recipient_full_name" required="">
                        </div>


                        <div class="form-group">
                            <label for="recipient-gender" class="col-form-label">Gender</label>
                            <select class="form-control" name="gender" id="recipient-gender" required>
                                <option value="">--Select Gender--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="recipient-mobile" class="col-form-label">Mobile</label>
                            <input type="text" class="form-control border" placeholder="Enter your mobile number" name="mobile" id="recipient-mobile" required="">
                        </div>

                        <div class="form-group">
                            <label for="recipient-email" class="col-form-label">Email</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Enter your email" name="email" value="{{ old('email') }}" id="recipient-email" required="">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <!--//First Column-->

                    <!--Second Column-->
                    <div class="second-column">

                        <div class="form-group">
                            <label for="password1" class="col-form-label">Password</label>
                            <input type="password" class="form-control border" placeholder="Enter your password" name="password" id="password1" required="">
                        </div>
                        <div class="form-group">
                            <label for="password2" class="col-form-label">Repeat Password</label>
                            <input type="password" class="form-control border" placeholder="Confirm password" name="Confirm Password" id="password2" required="">
                        </div>

                        <div class="form-group">
                            <label for="recipient-address" class="col-form-label">Address</label>
                            <textarea class="form-control" name="address" id="recipient-address" required></textarea>
                        </div>
                        <br>
                        <div class="form-group">
                            <input type="checkbox" id="brand2"  value=""><label for="brand2" class="text-muted">I Accept to the Terms & Conditions</label>
                        </div>
                    </div>
                    <!--//Second Column-->
                    <div class="right-w3l" style="margin-top: 1rem">
                        <input type="submit" class="form-control btn-theme text-white" value="Register">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- // Register modal -->

<!-- //End of Login Registration section -->



<!-- // Register modal -->
<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
<!-- Banner Responsiveslides -->
<script src="{{ asset('js/responsiveslides.min.js') }}"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<!-- // Banner Responsiveslides -->
<!-- Flexslider-js for-testimonials -->
<script src="js/jquery.flexisel.js"></script>
<script>
    $(window).load(function () {
        $("#flexiselDemo1").flexisel({
            visibleItems: 1,
            animationSpeed: 1000,
            autoPlay: false,
            autoPlaySpeed: 3000,
            pauseOnHover: true,
            enableResponsiveBreakpoints: true,
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 1
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 1
                }
            }
        });

    });
</script>
<!-- //Flexslider-js for-testimonials -->
<!-- sticky nav bar-->
<script>
    $(() => {

        //On Scroll Functionality
        $(window).scroll(() => {
            var windowTop = $(window).scrollTop();
            windowTop > 100 ? $('nav').addClass('navShadow') : $('nav').removeClass('navShadow');
            windowTop > 100 ? $('ul.nav-agile').css('top', '50px') : $('ul.nav-agile').css('top', '160px');
        });

        //Click Logo To Scroll To Top
        $('#logo').on('click', () => {
            $('html,body').animate({
                scrollTop: 0
            }, 500);
        });

        //Smooth Scrolling Using Navigation Menu
        $('a[href*="#"]').on('click', function (e) {
            $('html,body').animate({
                scrollTop: $($(this).attr('href')).offset().top - 100
            }, 500);
            e.preventDefault();
        });

        //Toggle Menu
        $('#menu-toggle').on('click', () => {
            $('#menu-toggle').toggleClass('closeMenu');
            $('ul').toggleClass('showMenu');

            $('li').on('click', () => {
                $('ul').removeClass('showMenu');
                $('#menu-toggle').removeClass('closeMenu');
            });
        });

    });
</script>
<!-- //sticky nav bar -->
<!-- smooth-scrolling-of-move-up -->
<script>
    $(document).ready(function () {
        /*
         var defaults = {
           containerID: 'toTop', // fading element id
           containerHoverID: 'toTopHover', // fading element hover id
           scrollSpeed: 1200,
           easingType: 'linear'
         };
         */

        $().UItoTop({
            easingType: 'easeOutQuart'
        });

    });
</script>
<script src="{{ asset('js/SmoothScroll.min.js') }}"></script>
<!-- //smooth-scrolling-of-move-up -->
<!-- start-smooth-scrolling -->
<script src="{{ asset('js/move-top.js') }}"></script>
<script src="{{ asset('js/easing.js') }}"></script>
<script>
    jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });

        //For Hint a text to the user
        $('[data-toggle="tooltip"]').tooltip();

        //For Table search

        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
            //For Div
            $("#myDIV").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- script for password match -->
<script>
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }

    function validatePassword() {
        var pass2 = document.getElementById("password2").value;
        var pass1 = document.getElementById("password1").value;
        if (pass1 != pass2)
            document.getElementById("password2").setCustomValidity("Passwords Don't Match");
        else
            document.getElementById("password2").setCustomValidity('');
        //empty string means no validation error
    }
</script>
<!-- script for password match -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.js') }}">
</script>
<!-- //Bootstrap Core JavaScript -->
</body>
</html>
