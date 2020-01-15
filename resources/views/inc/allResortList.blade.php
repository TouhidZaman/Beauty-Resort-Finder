<div class="mx-auto" style="min-height: 500px; width: 100%">
    <div class="float-left" id="resort-list" style="min-height: 770px;">
        <div class="card w-100 p-0 mb-3">
            <div class="d-flex flex-row bg-secondary rounded-top">
                <div class="px-3 py-1 bg-info text-white">Find a suitable resort</div>
            </div>
            <!-- show all resort  section -->
            @if($resorts->isEmpty())
                <center>
                    <h3 class="text-secondary mt-5">No Resorts Available !</h3><br><br>
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
                                        @if(Auth::user() !== Null)
                                            @if(Auth::user()->id == $resort->user_id)
                                                <h4><a class="text-info" href="{{ url('resort-booking-updates') }}/{{ encrypt($resort->id) }}">{{ $resort->name }}</a></h4>
                                            @else
                                                <h4><a class="text-info" href="{{ url('resort-info') }}/{{ encrypt($resort->id) }}">{{ $resort->name }}</a></h4>
                                            @endif
                                        @else
                                            <h4><a class="text-info" href="#userLoginModal" data-toggle="modal" data-placement="top" title="Please login first to view more info">{{ $resort->name }}</a></h4>
                                        @endif
                                        <p class="text-secondary">Category: <span class="text-success"> {{ $resort->resort_category->category }} </span>
                                        <br>Address:  {{ $resort->location }}</p>
                                    </div>
                                </div>
                            </div>

                        </td>
                        @if(Auth::user() !== Null)
                            @if((Auth::user()->roles->first()->name == 'Admin') or (Auth::user()->id == $resort->user_id) )
                                <td>
                                    <div class="btn-group">
                                        <button class="btn py-1 dropdown-toggle" data-toggle="dropdown">
                                            <i class="fas fa-cog text-info"> Action</i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="btn btn-danger dropdown-item" href="{{ url('remove-resort') }}/{{ encrypt($resort->id) }}"><i class="btn btn-danger far fa-trash-alt"> Remove</i></a>
                                        </div>
                                    </div>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- //show all resort section -->
        </div>
    </div>
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
