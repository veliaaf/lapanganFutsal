<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="dropdown category-dropdown">
                @if(Auth::user())
                <a onclick="logout()" href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-display="static" title="Browse Categories">
                    Logout
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                </a>
                @else
                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-display="static" title="Browse Categories">
                    Login Sebagai
                </a>
                @endif

                @if(Auth::user())
                <div class="dropdown-menu">
                    <nav class="side-nav">
                    </nav><!-- End .side-nav -->
                </div><!-- End .dropdown-menu -->
                @else
                <div class="dropdown-menu">
                    <nav class="side-nav">
                        <ul class="menu-vertical sf-arrows">
                            <li><a href="{{ route('login') }}?role=owner"
                                    style="background-color:#333333;color:white;">Pemilik</a></li>
                            <li><a href="{{ route('login') }}?role=customer"
                                    style="background-color:#333333;color:white;">Penyewa</a></li>
                        </ul><!-- End .menu-vertical -->
                    </nav><!-- End .side-nav -->
                </div><!-- End .dropdown-menu -->
                @endif



            </div><!-- End .category-dropdown -->
        </div><!-- End .col-lg-3 -->

        <div class="col-lg-9">
            <nav class="main-nav">
                @if(Auth::user())
                <ul class="menu sf-arrows">
                    <li  @if(Route::currentRouteName()=="landing.index" ) class="megamenu-container active" @else class="megamenu-container" @endif>
                        <a href="{{ route('landing.index') }}">Home</a>                      
                    </li>
                    <li  @if(Route::currentRouteName()=="customer.commerce.index" ) class="megamenu-container active" @else class="megamenu-container" @endif>
                        <a href="{{ route('customer.commerce.index') }}">Cari Venue</a>
                    </li>
                    <li @if(Route::currentRouteName()=="customer.booking.index" ) class="megamenu-container active" @else class="megamenu-container" @endif>
                        <a href="{{ route('customer.booking.index') }}">Booking</a>
                    </li>
                    <li @if(Route::currentRouteName()=="customer.history.index" ) class="megamenu-container active" @else class="megamenu-container" @endif>
                        <a href="{{ route('customer.history.index') }}">History</a>
                    </li>
                    <li @if(Route::currentRouteName()=="customer.profil.index" ) class="megamenu-container active" @else class="megamenu-container" @endif>
                        <a href="{{ route('customer.profil.index') }}">Profil</a>
                    </li>
                    <li @if(Route::currentRouteName()=="customer.chat.index" ) class="megamenu-container active" @else class="megamenu-container" @endif>
                        <a href="{{ route('customer.chat.index') }}">Chat</a>
                    </li>
                </ul><!-- End .menu -->
                @else
                <ul class="menu sf-arrows">
                    <li  @if(Route::currentRouteName()=="landing.index" ) class="megamenu-container active" @else class="megamenu-container" @endif>
                        <a href="{{ route('landing.index') }}">Home</a>                      
                    </li>
                    <li  @if(Route::currentRouteName()=="commerce.index" ) class="megamenu-container active" @else class="megamenu-container" @endif>
                        <a href="{{ route('commerce.index') }}">Cari Venue</a>
                    </li>
                </ul><!-- End .menu -->
                @endif
            </nav><!-- End .main-nav -->
        </div><!-- End .col-lg-9 -->
    </div><!-- End .row -->
</div>