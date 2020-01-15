@extends('layouts.master')
@section('head')
    <title>Admin Dashboard</title>
@endsection
@section('page-content')


    <section id="about-section">
        <div class="container">
            <div class="clearfix">
                <div class="float-left w-25">
                    <input class="form-control my-1" id="myInput" type="text" placeholder="Type here to search">
                    <br>
                </div>
                <div class="float-left w-25"></div>
                <div class="float-right w-50">
                    @if (Session::get('success'))
                        <div class="alert alert-info alert-dismissable"> <a class="panel-close close" data-dismiss="alert">×</a>
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
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-1 bg-info text-white rounded">Pending Resorts List</div>
            </div>
            <!-- show all resort  section -->
            @if($resorts->isEmpty())
                <center>
                    <h3 class="text-secondary mt-5">No Pending Resorts Available !</h3><br><br>
                </center>
            @endif
            <table class="table table-hover xm-auto">
                <tbody id="myTable">
                @foreach($resorts as $resort)
                    <tr>
                        <td>
                            <div>
                                <div class="media p-2">
                                    <img src="{{URL::asset('assets/resorts/'.$resort->resort_image)}}" alt="Reload Please" class="img-thumbnail" style="height: 120px; width: 180px;">
                                    <div id="myDIV" class="media-body pl-3">
                                        <h4><a class="text-info" href="{{ url('resort-info') }}/{{ encrypt($resort->id) }}">{{ $resort->name }}</a></h4>
                                        <p class="text-secondary">Category: <span class="text-success"> {{ $resort->resort_category->category }} </span>
                                            <br>Address:  {{ $resort->location }}</p>
                                    </div>
                                </div>
                            </div>

                        </td>
                        <td>
                        <td>
                            <div class="btn-group">
                                <button class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-cog text-info"> Pending</i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="btn btn-warning dropdown-item" href="{{ url('approve-resort') }}/{{ encrypt($resort->id) }}"><i class=" btn btn-success fas fa-check">Approve</i></a>
                                    <a class="btn btn-danger dropdown-item" href="{{ url('remove-resort') }}/{{ encrypt($resort->id) }}"><i class="btn btn-danger far fa-trash-alt"> Remove</i></a>
                                </div>
                            </div>
                        </td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- //show all resort section -->
    </section>

@endsection
