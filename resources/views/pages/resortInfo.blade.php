@extends('layouts.master')
@section('head')
    <title>Resort information </title>
    <style type="text/css">
        .card {
            /* Add shadows to create the "card" effect */
            transition: 0.3s;
            padding: 2% 2% 0 2%;
            margin: 0% 0 3% 2%;
            width: 45%;

        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }
        #resort-list{
            padding-left: 0%;
            width: 64%;
        }
        .carousel-inner img {
            width: 100%;
            height: 350px;
        }
    </style>
@endsection
@section('page-content')
    <div class="mx-auto" style="min-height: 500px; width: 100%">
        <!-- Resort info section -->
        <div class="float-left" id="resort-list" style="min-height: 770px;">
            <div class="card w-100 p-0 mb-3">
                <!-- slider section -->
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{URL::asset('assets/resorts/'.$resort->resort_image)}}" alt="Los Angeles" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>Resort Image</h3>
                                <span class="text-warning">{{ $resort->location }}</span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{URL::asset('assets/resorts/'.$resort->single_bed_sample)}}" alt="Chicago" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>Single Bed Image</h3>
                                <span class="text-warning">Per night: <span class="text-success">{{ $resort->single_bed_cost }}tk only</span></span>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{URL::asset('assets/resorts/'.$resort->double_bed_sample)}}" alt="New York" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>Double bed Image</h3>
                                <span class="text-warning">Per night: <span class="text-success">{{ $resort->double_bed_cost }}tk only</span> </span>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                <!-- //slider section -->

                <!-- Resort information section -->
                <div class="p-3  p-0 w-100">
                    <h4 class="py-0 pl-2 text-info my-0">Resort Information</h4>
                        <h6 class="text-secondary">
                            <table class="table table-hover">
                                <tr>
                                    <td>Resort Name: </td>
                                    <td>{{ $resort->name }} </td>
                                </tr>
                                <tr>
                                    <td>Category:</td>
                                    <td>{{ $resort->resort_category->category }} </td>
                                </tr>
                                <tr>
                                    <td>Single bedrooms:</td>
                                    <td>{{ $resort->single_bed }} </td>
                                </tr>
                                <tr>
                                    <td>Double bedrooms:</td>
                                    <td>{{ $resort->double_bed }} </td>
                                </tr>
                                <tr>
                                    <td>Single Bed Cost:</td>
                                    <td>{{ $resort->single_bed_cost }}tk only</td>
                                </tr>
                                <tr>
                                    <td>Double Bed Cost:</td>
                                    <td>{{ $resort->double_bed_cost }}tk only</td>
                                </tr>
                                <tr>
                                    <td>Address: </td>
                                    <td>{{ $resort->location }}</td>
                                </tr>
                                <tr>
                                    <td>Contact: </td>
                                    <td>01700000000</td>
                                </tr>

                                <tr>
                                    <td colspan="2"><a href="#bookNowModal" data-toggle="modal" class="btn btn-info btn-block"><i class="fas fa-hotel"> Book Now</i></a></td>
                                </tr>

                            </table>
                        </h6>
                </div>
                <!-- //Resort information section -->
            </div>

        </div>
        <!-- //Resort info section -->


        <div class="float-right" id="right-menu" style="width: 32%;">
            <div class="mr-4 pr-5" style="position: fixed; top: 120px;">
                <input class="form-control rounded my-1 ml-2" id="myInput" type="text" placeholder="Search here">
                <br>
                <div class="card w-100 p-0 mb-3 mr-5">
                    <div class="d-flex flex-row bg-secondary rounded-top">
                        <div class="px-3 py-1 bg-info text-white">Your Actions</div>
                    </div>
                    <div class="container  py-2 px-3">
                        @if(Auth::user() !== Null)
                            <a href="#createNewResortModal" data-toggle="modal" class="btn btn-info my-1 px-2 py-1 float-left"><i class="fas fa-plus-square"> Create new Post</i></a>
                        @else
                            <a href="#userLoginModal" data-toggle="modal" data-placement="top" title="Please login first to create new post" class="btn btn-info my-1 px-2 float-left"><i class="fas fa-plus-square"> Create new Post</i></a>
                        @endif
                    </div>
                </div>

                <div class="card w-100 p-0">
                    <div class="d-flex flex-row bg-secondary rounded-top">
                        <div class="px-3 py-1 bg-info text-white">Resort Categories</div>
                        @if(Auth::user() !== Null)
                            @if(Auth::user()->roles->first()->name == 'Admin')
                                <div class="p-2 ml-auto"><h4 class="p-0 m-0"> <a  href="#createResortCategory" data-toggle="modal"><i class="text-white mr-2 fas fa-plus-square"></i></a> </h4></div>
                            @endif
                        @endif
                    </div>
                    <div class="container  pt-4 px-3">
                        <table class="table">
                            @foreach($resort_categories as $resort_category)
                                <tr>
                                    <td>
                                        <h6 class="text-info my-0"><a href="{{ url('resorts') }}/{{ $resort_category->category }}"> <i class="fas fa-angle-double-right text-secondary"></i> {{ $resort_category->category }} ({{ $resort_category->resorts->where('active_status', true)->count() }})</a></h6>
                                    </td>
                                    @if(Auth::user() !==Null)
                                        @if(Auth::user()->roles->first()->name == 'Admin')
                                            <td>
                                                <div class="btn-group">
                                                    <i  data-toggle="dropdown" class="fas fa-ellipsis-h text-secondary"></i>
                                                    <div class="dropdown-menu dropdown-menu-right" >
                                                        <a class="dropdown-item text-secondary" href="{{ url('edit-category') }}/{{ encrypt($resort_category->id) }}"><i class="far fa-edit"> </i>Edit</a>
                                                        <a data-toggle="tooltip" data-placement="top" title="Warning ! this action will remove all posts and comments related to this category" class="dropdown-item text-secondary" href="{{ url('remove-category') }}/{{ encrypt($resort_category->id) }}"><i class="far fa-trash-alt"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        @endif
                                    @endif
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix">

        </div>
    </div>

    <!-- Create New Resort-->
    <div class="modal fade" id="createNewResortModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Create New Resort</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pl-5 pr-5 pb-5" style="">
                    <form enctype="multipart/form-data" action="{{ url('Create-new-resort') }}" method="post">
                    {{ csrf_field() }}

                    <!--First Column-->
                        <div class="first-column">

                            <div class="form-group">
                                <label for="resort_name" class="col-form-label">Resort Name</label>
                                <input type="text" class="form-control border" placeholder="Enter Resort Name" name="name" id="resort_name" required="">
                            </div>

                            <div class="form-group">
                                <label for="location" class="col-form-label">Location</label>
                                <input type="text" placeholder="Enter Resort Location" id="location" name="location" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <label for="single_bed" class="col-form-label">Single Bedroom</label>
                                <input type="number" placeholder="How many single rooms ?" id="single_bed" name="single_bed" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <label for="single_bed_cost" class="col-form-label">Cost Per Night</label>
                                <input type="number" placeholder="Enter cost per night for single bed" id="single_bed_cost" name="single_bed_cost" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <h6 class="m-t-2">Sample Image (single bedroom)</h6>
                                <label class="custom-file">
                                    <input type="file" name="single_bed_sample" id="single_bed_sample">
                                </label>
                            </div>
                        </div>
                        <!--//First Column-->

                        <!--Second Column-->
                        <div class="second-column">

                            <div class="form-group">
                                <h6 class="m-t-1">Resort Image</h6>
                                <label class="custom-file">
                                    <input type="file" name="resort_image" id="resort_image">
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="resort_category" class="col-form-label">Resort Category</label>
                                <select required id="resort_category" name="resort_category_id"  class="group_member form-control">
                                    <option value="">--Select Resort Category--</option>
                                    @foreach($resort_categories as $resort_category)
                                        <option value="{{$resort_category->id}}">{{ $resort_category->category }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="double_bed" class="col-form-label">Double Bedroom</label>
                                <input type="number" placeholder="How many double rooms ?" id="double_bed" name="double_bed" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <label for="double_bed_cost" class="col-form-label">Cost Per Night</label>
                                <input type="number" placeholder="Enter cost per night for double bed" id="double_bed_cost" name="double_bed_cost" class="form-control" required/>
                            </div>

                            <div class="form-group">
                                <h6 class="m-t-2">Sample Image (Double bedroom)</h6>
                                <label class="custom-file">
                                    <input type="file" name="double_bed_sample" id="double_bed_sample">
                                </label>
                            </div>
                        </div>
                        <!--//Second Column-->
                        <div class="right-w3l mt-4">
                            <input type="submit" class="form-control border text-white btn-theme" value="Create Now">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //Create new resort -->


    <!-- check-availability section-->
    <div class="modal fade" id="bookNowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookNowModal1">Book This Resort Now</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pl-5 pr-5 pb-5" style="">
                    <form enctype="multipart/form-data" action="{{ url('check-availability') }}" method="post">
                    {{ csrf_field() }}
                        <input value="{{ encrypt($resort->id) }}" name="resort_id" type="hidden">
                        <div class="form-group">
                            <label for="check_in_date" class="col-form-label">Check-in-date</label>
                            <input type="date" class="form-control border" placeholder="Enter check in date" name="check_in_date" id="resort_name" required="">
                        </div>

                        <div class="form-group">
                            <label for="check_out_date" class="col-form-label">Check-out-date</label>
                            <input type="date" class="form-control border" placeholder="Enter check out date" name="check_out_date" id="resort_name" required="">
                        </div>

                        <div class="form-group">
                            <label for="single_bedrooms" class="col-form-label">Single bedrooms</label>
                            <select required id="single_bedrooms" name="single_bedrooms"  class="group_member form-control">
                                <option value="">--Select rooms--</option>
                                <?php $single_room = 0 ?>
                                @while($single_room <= $resort->single_bed)
                                    <option value="{{ $single_room }}">{{ $single_room }}</option>
                                    <?php $single_room += 1 ?>
                                @endwhile
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="double_bedrooms" class="col-form-label">Double bedrooms</label>
                            <select required id="double_bedrooms" name="double_bedrooms"  class="group_member form-control">
                                <option value="">--Select rooms--</option>
                                <?php $double_room = 0 ?>
                                @while($double_room <= $resort->double_bed)
                                    <option value="{{ $double_room }}">{{ $double_room }}</option>
                                    <?php $double_room += 1 ?>
                                @endwhile
                            </select>
                        </div>

                        <div class="right-w3l mt-4">
                            <input type="submit" class="form-control border text-white btn-theme" value="Check Availability">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //Resort Book now section-->


    <!-- Create New Category-->
    <div class="modal fade" id="createResortCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="">Add New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-4 pb-5 px-5" style="">
                    <form enctype="multipart/form-data" action="{{ url('add-category') }}" method="post">
                        {{ csrf_field() }}
                        <div class="clearfix pt-3">
                            <div class="float-left w-75">
                                <div class="form-group">
                                    <input  type="text" class="form-control" name="category" placeholder="Enter new Category" required></input>
                                </div>
                            </div>
                            <div class="float-right w-25">
                                <div class="right-w3l">
                                    <input type="submit" class="form-control border text-white btn-info" value="Add Now">
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //Create New Category -->

    <!-- Payment Procedure -->
    <div class="modal fade" id="PaymentProcedureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userMessageModal">Payment Procedure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (Session::get('CheckSuccess'))
                        <div class="alert alert-success alert-block py-2" style="overflow: hidden">
                            @if(is_array(Session::get('CheckSuccess')))
                                <ul>
                                    @foreach(Session::get('CheckSuccess') as $msg)
                                        <li><strong>{!! $msg !!}</strong></li>
                                    @endforeach
                                </ul>
                            @else
                                <strong>{!! Session::get('CheckSuccess') !!}</strong>

                            @endif
                        </div>
                    @endif

                    <form class="" enctype="multipart/form-data" action="{{ url('confirm-resort') }}" method="post">
                        {{ csrf_field() }}
                        <center><img src="{{ asset('assets\logo\bkash.png') }}" height="140px" alt="Avatar" style="width:90%"></center>
                        <input value="{{ encrypt($resort->id) }}" name="resort_id" type="hidden">
                        <div class="px-5">
                            <div class="form-group">
                                <label for="bkash_account_number" class="col-form-label">Bkash Account Number</label>
                                <input type="text" class="form-control border" placeholder="Enter bkash account number" name="bkash_account_number" id="" required="">
                            </div>

                            <div class="form-group">
                                <label for="bkash_account_pin" class="col-form-label">Bkash Pin number</label>
                                <input type="password" class="form-control border" placeholder="XXXX" name="bkash_account_pin" id="" required="">
                            </div>

                            <div class="right-w3l mt-2">
                                <input type="submit" class="form-control border text-white btn-theme" value="Confirm Now">
                            </div>
                            <br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- // Payment Procedure -->

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

    <!-- User warning Message-->
    <div class="modal fade" id="userWarningMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userMessageModal">Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (Session::get('warning'))
                        <div class="alert alert-warning alert-block" style="overflow: hidden">
                            @if(is_array(Session::get('warning')))
                                <ul>
                                    @foreach(Session::get('warning') as $msg)
                                        <li><strong>{!! $msg !!}</strong></li>
                                    @endforeach
                                </ul>
                            @else
                                <strong>{!! Session::get('warning') !!}</strong>

                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- //User warning Message -->
@endsection

