<header class="index-banner">
    <!-- nav -->
    <nav class="main-header">
        <div id="brand">
            <div id="logo">
                <a  href="{{ url('/')  }}">
                    <!-- <i class="fab fa-ethereum"></i> -->
                    <img src="{{ asset('assets/logo/logo.png') }}" alt="DIU">
                </a>
            </div>
            <div id="word-mark">
                <h1>
                    <a href="{{ url('/')  }}">BRF</a>
                </h1>
            </div>
        </div>
        <div id="menu">
            <div id="menu-toggle">
                <div id="menu-icon">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
            </div>
            <ul class="text-center text-capitalize nav-agile">
                <li>
                    <a href="{{ url('/') }}" class="active">home</a>
                </li>
                <li>
                    <a href="#about-section">about</a>
                </li>
                <li>
                    <a href="#services-section">services</a>
                </li>
                <li>
                    <a href="{{ url('contact') }}">contact</a>
                </li>
                <li>
                    <button type="button" class="btn w3ls-btn" data-toggle="modal" aria-pressed="false" data-target="#userLoginModal">
                        Login
                    </button>
                </li>
            </ul>
        </div>
    </nav>
    <!-- //nav -->
</header>
<!-- //header -->


