@extends('layouts.master')
@section('head')
    <title>Resort Booking Updates</title>
    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            padding: 2% 2% 0 2%;
            margin: 0% 2% 2% 0%;
            width: 40%;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
    </style>
@endsection
@section('page-content')

    <div style="min-height: 770px;">
        <!--View Classroom header -->
        <div class="card mt-0 mx-auto pr-5" style="width: 90%;">
            <img src="{{URL::asset('assets/resorts/'.$resort->resort_image)}}" height="170px" alt="Avatar" style="width:100%;">
            <div class="container">
                <div class="clearfix">
                    <div class="float-left w-75">
                        <h4><b>{{ $resort->name }} <span class="text-success">(All booking updates)</span></b></h4>
                    </div>
                    <div class="float-left w-250">
                        <h5 class="float-right mr-2">
                            <b></b>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- // View resort header -->

        <!--resort members -->
        @foreach($booking_histories as $booking_history)
            <div class="card float-left ml-5 mr-5 pb-3">
                <div class="w-100 clearfix">
                    <div class="float-left w-25">
                        @if($booking_history->user->avatar == null)
                            @if($booking_history->user->gender == 'Male')
                                <img src="{{URL::asset('assets/avatars/avatar-male.png')}}" alt="Avatar" style="width:90%; margin-left: 3%">
                            @else
                                <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" alt="Avatar" style="width:90%; margin-left: 3%">
                            @endif
                        @else
                            <img src="{{URL::asset('assets/avatars/' . $booking_history->user->avatar)}}" class="rounded-circle" alt="Avatar" style="width:90%; margin-left: 3%">
                        @endif
                    </div>
                    <div class="float-left w-75">
                        <h4><b><a class="text-info" href="{{ url('profile') }}/{{ encrypt($booking_history->user->id) }}">{{ $booking_history->user->name }}</a></b></h4>
                        <table class="table-hover text-secondary">
                            <tr>
                                <td> Check-in: {{ $booking_history->check_in_date }}</td>
                            </tr>
                            <tr>
                                <td>Check-out: {{ $booking_history->check_out_date }}</td>
                            </tr>
                            <tr>
                                <td>Single Rooms: {{ $booking_history->single_bedrooms }}</td>
                            </tr>
                            <tr>
                                <td>Single Rooms: {{ $booking_history->double_bedrooms }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
    @endforeach
    <!--//Classroom members -->



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


@endsection
