@extends('layouts.master')
@section('head')
    <title>Resorts list</title>
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
    </style>
@endsection
@section('page-content')
    @include('inc.allResortList')
    <!-- Create New Resort-->
    <div class="modal fade" id="createNewResortModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassRoomModal">Create New Resort</h5>
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

