<!DOCTYPE html>
<html lang="en">
<head>
    @yield('head')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Custom Theme files -->
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/bootstrap.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/w3.css') }}" type="text/css" rel="stylesheet" media="all">
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!-- //Custom Theme files -->

    <!-- online-fonts -->
    <link href="//fonts.googleapis.com/css?family=Nunito+Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">
    <!-- //online-fonts -->

    <style>
        .first-column {
            width: 48%;
            float: left;
        }

        .second-column {
            width: 48%;
            float: right;
        }
        /* Stackoverflow preview fix, please ignore */
        .navbar{
            width: 100vw;
            height: 90px;
            background: #1e2d3a;
            grid-template-columns: 1fr 1fr;
            position: fixed;
            top:0;
            z-index: 10;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            overflow: visible;

        }
        .navbar-nav {
            flex-direction: row;
        }
        .nav-link {
            padding-right: .5rem !important;
            padding-left: .5rem !important;
        }

        /* Fixes dropdown menus placed on the right side */
        .ml-auto .dropdown-menu {
            left: auto !important;
            right: 0px;
        }

        /* For side Navbar*/
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 90%;
            width: 21%;
            position: fixed;
            z-index: 1;
            left: 0;
            background-color: #E9ECFE;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            top: 90px;
        }

        .sidenav a {
            padding: 3px 3px 3px 32px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }
        /* //For side Navbar*/
    </style>

    <script>

        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
            @if (Session::get('warning'))
            $('#userWarningMessageModal').modal('show');//For Warning Message
            @endif
            @if (Session::get('success'))
            $('#userMessageModal').modal('show');//For Success Message
            @endif
            @if (Session::get('CheckSuccess'))
            $('#PaymentProcedureModal').modal('show');//For Success Message
            @endif

        }, false);


        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>

</head>
<body>
@if((Auth::user()->roles->first()->name)=='Admin')
    @include('inc.adminNavbar')
@else
    @include('inc.userNavbar')
@endif
<!--Main Area-->
<section id="main-section">
    <div class="container-fluid " style="min-height: 600px; margin-top: 120px;">

        @if((Auth::user()->roles->first()->name)=='Admin')
            <div class="clearfix">
                <div class="float-left" style="width: 21%">
                    @include('inc.adminSidebar')
                </div>
                <div class="float-right" style="width: 79%;" id="main">
                    @yield('page-content')
                </div>
            </div>
        @else
            <div class="clearfix">
                <div class="float-left" style="width: 23%">
                    @include('inc.userSidebar')
                </div>
                <div class="float-right" style="width: 75%">
                    @yield('page-content')
                </div>
            </div>
        @endif
    </div>
</section>
<!--//Main Area-->

<!-- footer -->
@include('inc.simpleFooter')
<!-- //footer -->


<script src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script>
    jQuery(document).ready(function ($) {

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


        // End Department and Subject DropDown

        $(".scroll").click(function (event) {
            event.preventDefault();

            $('html,body').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });
    });
</script>
<!-- //end-smooth-scrolling -->
<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.js') }}">
</script>
<!-- //Bootstrap Core JavaScript -->
</body>
</html>
