<!-- Brand Logo -->
<a class="brand-link">
    <img src="{{asset('templates/img/football.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
    <span class="brand-text font-weight-light">FutsalnyaPadang</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img @if (Auth::user()->owner->avatar == NULL)
            src="{{ asset('templates/img/user.png') }}"
            @else
            src="{{ asset('images/owner/'.Auth::user()->owner->avatar) }}"
            @endif class="img-circle elevation-2"
            alt="User Image">
        </div>
        <div class="info">
            <a style="color:#659972;" href="{{ route('owner.profil.index') }}" data-toggle="tooltip"
                data-placement="bottom" title="Profil Owner" class="d-block">
                <u><b> {{Auth::user()->owner->first_name}} {{Auth::user()->owner->last_name}}</b></u> </a>
        </div>
    </div>

    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a @if(Route::currentRouteName()=="home.index" ) class="nav-link active" @else class="nav-link" @endif
                    href="{{ route('home.index') }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        <span class="right badge badge-danger"></span>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a @if(Route::currentRouteName()=="owner.venue.index" || Route::currentRouteName()=="owner.venue.edit"
                    || Route::currentRouteName()=="owner.venue.show" || Route::currentRouteName()=="owner.venue.create"
                    || Route::currentRouteName()=="owner.venue.field.create" || Route::currentRouteName()=="owner.field.edit"
                    || Route::currentRouteName()=="owner.venue.field-show" ) class="nav-link active" @else class="nav-link"
                    @endif href="{{ route('owner.venue.index') }}">
                    <i class="nav-icon fas fa-columns"></i>
                    <p>Kelola Venue</p>
                </a>
            </li>


            <li class="nav-item">
                <a @if(Route::currentRouteName()=="owner.booking.index" || Route::currentRouteName()=="owner.booking.show") class="nav-link active" @else class="nav-link"
                    @endif href="{{ route('owner.booking.index') }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Booking</p>
                </a>
            </li>
            <li class="nav-item">
                <a @if(Route::currentRouteName()=="owner.history.index" || Route::currentRouteName()=="owner.history.show") class="nav-link active" @else class="nav-link"
                    @endif href="{{ route('owner.history.index') }}">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>History</p>
                </a>
            </li>
            <li class="nav-item">
                <a @if(Route::currentRouteName()=="owner.chat.index.owner" ) class="nav-link active" @else
                    class="nav-link" @endif href="{{ route('owner.chat.index.owner') }}">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>Chat</p>
                </a>
            </li>
            <li class="nav-item">
                <a @if(Route::currentRouteName()=="owner.report.index" ) class="nav-link active" @else class="nav-link"
                    @endif href="{{ route('owner.report.index') }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Transaksi</p>
                </a>
            </li>

        </ul>
    </nav>
    <nav class="mt-2" style="position:absolute; bottom:20px;background-color:#DA2F3F;color:white;border-radius:5px;">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a class="nav-link" onclick="logout()">
                    <i class="fas fa-sign-out-alt"></i>
                    <p> &ensp; Logout</p>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>