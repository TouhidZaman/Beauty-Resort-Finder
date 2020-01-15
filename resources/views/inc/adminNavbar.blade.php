<!-- header -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: #1E2D3A" >
    <span style="font-size:30px; margin-left: 10px; color: #c6e0f5;   cursor:pointer" onclick="openNav()">&#9776;</span><a class="navbar-brand" style=" padding: 10px;" href="{{ url('admin/dashboard') }}"><img class="logo" height="60px" width="60px" src="{{ asset('assets/logo/logo.png') }}"/><span style="margin-left: 10px">BRF</span> </a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
            <a class="nav-link" href="{{ url('admin/dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('get-resort-list') }}" class="nav-link">Resort Updates</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('users-role') }}">Assign Roles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link">user feedback</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto mr-3">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @if(isset(Auth::user()->name))
                    <strong><span class="text-info">Admin : </span> </strong>
                    @if(Auth::user()->avatar == null)
                        @if(Auth::user()->gender == 'Male')
                            <img src="{{URL::asset('assets/avatars/avatar-male.png')}}"  class="rounded-circle p-2 mb-1" alt="Cinque" width="40" height="40">
                        @else
                            <img src="{{URL::asset('assets/avatars/avatar-female.png')}}" class="rounded-circle p-2 mb-1" alt="Cinque" width="40" height="40">
                        @endif
                    @else
                        <img src="{{URL::asset('assets/avatars/' . Auth::user()->avatar)}}" class="rounded-circle p-2 mb-1" alt="Cinque" width="40" height="40">
                    @endif
                    <strong> {{ Auth::user()->name }}</strong>
                @endif</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<!-- //header -->
