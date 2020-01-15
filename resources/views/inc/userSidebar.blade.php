<!-- User Menu -->
<div class="card shadow-lg p-4 mb-4 ml-3 mt-2" style="position: fixed; top: 110px; width: 23%; background-color: #FFFFFF; min-height:300px; border-radius:7px;  color: #1b4b72;">
    <div  style="padding-left:30px">
        @if(Auth::user()->avatar == null)
            @if(Auth::user()->gender == 'Male')
                <img src="{{asset('assets/avatars/avatar-male.png')}}"  class="rounded-circle" alt="Cinque" width="130px" height="120px">
            @else
                <img src="{{ asset('assets/avatars/avatar-female.png') }}" class="rounded-circle" alt="Cinque" width="130px" height="120px">
            @endif
        @else
            <img src="{{URL::asset('assets/avatars/' . Auth::user()->avatar)}}" class="rounded-circle" alt="Cinque" width="130px" height="120px">
        @endif
    </div>
    <br>
    <div class="d-flex flex-row bg-info">
        <div class="p-2 bg-info"></div>
    </div>
    <h4 style="margin-left:16px;">
            @if(isset(Auth::user()->name))
                <strong>{{ Auth::user()->name }}</strong>
            @endif
    </h4>
    <div class="panel-body">
        <ul>
            <li class="active"><a  href="{{ url('profile') }}/{{ encrypt(Auth::user()->id) }}"><span class="fas fa-user-tie p-2 ml-3"></span>My Profile</a></li>
            <li class="active"><a href="{{ url('edit-profile') }}/{{ encrypt(Auth::user()->id) }}"><span class="fas fa-user-edit p-2 ml-3"></span>Update Profile</a></li>
            <li class="active"><a  href="{{ url('get-resort-list') }}"><span class="fas fa-book-reader p-2 ml-3"></span>Find Resorts</a></li>
            @if((Auth::user()->roles->first()->name)=='Moderator')
                <li class="active"><a  href="{{ url('pending-resorts') }}"><span class="fas fa-book-open p-2 ml-3"></span>Pending Resorts</a></li>
            @endif
            <li class="active"><a href="#"><span class="fas fa-unlock-alt p-2 ml-3"></span>Change Password</a></li>
            <li class="active"><a href="{{ url('logout') }}"><span class="fas fa-sign-out-alt p-2 ml-3"></span>Logout</a></li>
        </ul>
    </div>
</div>
<!--// User Menu -->
