@extends('layouts.master')
@section('head')
    <title>User Dashboard</title>
@endsection
@section('page-content')

    <!-- Booking History section -->
    <section id="boking-history-section">
        <div class="container">
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-1 bg-info text-white rounded">Booking History</div>
            </div>
            <table class="table table-responsive-md xm-auto">
                <thead>
                    <th colspan="2">Resort_Name</th>
                    <th>Category_</th>
                    <th>Address</th>
                    <th>S_Rooms</th>
                    <th>D_Rooms</th>
                    <th>_Check_In_</th>
                    <th>Check_Out</th>
                    <th>Total_cost</th>
                </thead>
                <tbody id="myTable">
                @foreach($booking_histories as $booking_history)
                    <tr>
                        <td><img src="{{URL::asset('assets/resorts/'.$booking_history->resort->resort_image)}}" alt="Reload Please" class="img-thumbnail" style="height: 50px; width: 150px;"></td>
                        <td>
                            <a class="text-info" href="{{ url('resort-info') }}/{{ encrypt($booking_history->resort->id) }}">{{ $booking_history->resort->name }}</a>
                        </td>
                        <td><span class="text-success">{{ $booking_history->resort->resort_category->category }}</span></td>
                        <td>{{ $booking_history->resort->location }}</td>
                        <td class="text-center">{{ $booking_history->single_bedrooms }}</td>
                        <td class="text-center">{{ $booking_history->double_bedrooms }}</td>
                        <td class="text-center">{{ $booking_history->check_in_date }}</td>
                        <td class="text-center">{{ $booking_history->check_out_date }}</td>
                        <td class="text-center">{{ $booking_history->total_cost }}</td>
                    </tr>
                @endforeach
                <!-- booking history -->
                </tbody>
            </table>
            @if($booking_histories->isEmpty())
                <center>
                    <h3 class="text-secondary mt-5">No History Available !</h3><br><br>
                </center>
            @endif
        </div>
    </section>
    <!-- //Booking History section -->

    <!-- Personal section -->
    <section id="boking-history-section">
        <div class="container">
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-1 bg-info text-white rounded">Your Personal Resort</div>
            </div>
            <!-- show all resort  section -->
            @if($personal_resorts->isEmpty())
                <center>
                    <h3 class="text-secondary mt-5">You haven't create any personal resort yet !</h3><br><br>
                </center>
            @endif
            <table class="table table-hover xm-auto">
                <tbody id="myTable">
                @foreach($personal_resorts as $personal_resort)
                    <tr>
                        <td>
                            <div>
                                <div class="media p-2">
                                    <img src="{{URL::asset('assets/resorts/'.$personal_resort->resort_image)}}" alt="Reload Please" class="img-thumbnail" style="height: 120px; width: 180px;">
                                    <div id="myDIV" class="media-body pl-3">
                                        <h4><a class="text-info" href="{{ url('resort-booking-updates') }}/{{ encrypt($personal_resort->id) }}">{{ $personal_resort->name }}</a></h4>
                                        <p class="text-secondary">Category: <span class="text-success"> {{ $personal_resort->resort_category->category }} </span>
                                            <br>Address:  {{ $personal_resort->location }}</p>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>
                        <td>
                            <div class="btn-group">
                                <button class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                                    @if($personal_resort->active_status == true)
                                        <i class="fas fa-cog text-success"> Published </i>
                                    @else
                                        <i class="fas fa-cog text-warning"> Pending</i>
                                    @endif
                                </button>
                                <div class="dropdown-menu">
                                    <a class="btn btn-danger dropdown-item" href="{{ url('remove-resort') }}/{{ encrypt($personal_resort->id) }}"><i class="btn btn-danger far fa-trash-alt"> Remove</i></a>
                                </div>
                            </div>
                        </td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <!-- //Personal Resort section -->

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
