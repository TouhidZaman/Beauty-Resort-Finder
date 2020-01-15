@extends('layouts.app')
@section('head')
    <title>Please contact us if you have any queries </title>
@endsection

@section('content')
<!-- contact -->
<section id="user-contact-section" class="main-sec-w3 pb-lg-5">
    <div class="container py-sm-5  pb-5">
        <div class="wthree-inner-sec">
            <div class="text-center wthree-title pb-sm-5 pb-3">
                <h4 class="w3l-sub">contact</h4>
                <h5 class="sub-title py-3">Please give us your feedback to improve our services.</h5>
                <span></span>
            </div>
            <div class="row pt-lg-5 pt-lg-5">
                <div class="col-lg-3">
                    <div class="address">
                        <address>
                            <p class="contact-title">Head Office</p>
                            <p class="c-txt">4/2, Sobhanbag
                                <br>Mirpur Rd, Dhaka 1207
                                <br> +8801681941159
                            </p>
                        </address>
                    </div>
                    <div class="address">
                        <address>
                            <p class="contact-title">Emergency contact</p>
                            <p class="c-txt">+9928543728
                                <br> info@brfbd.com
                            </p>
                        </address>
                    </div>
                </div>
                <div class="col-lg-9 pl-lg-5">
                    <div class="form-wrapper">
                        <form action="#" method="post">
                            <div class="d-flex flex-column">
                                <label>Your Name:</label>
                                <input class="text-input" type="text" name="text1" id="text1" required>
                            </div>
                            <div class="d-flex flex-column my-sm-5 my-3">
                                <label>Your Email Address:</label>
                                <input class="text-input" type="email" name="email" id="email" required>
                            </div>
                            <div class="d-flex flex-column my-sm-5 my-3">
                                <div class="message">
                                    <h6>Add Your Message</h6>
                                </div>
                                <textarea name="t1" id="t1" required></textarea>
                            </div>
                            <input class="submit" type="submit" value="Send">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- //contact -->
@endsection
@section('footer')
    @include('inc.footer')
@endsection
