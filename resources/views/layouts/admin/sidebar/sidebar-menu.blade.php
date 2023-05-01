<!-- Brand Logo -->
<a href="index3.html" class="brand-link">
    <img src="{{asset('templates/img/football.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">FutsalnyaPadang</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('templates/img/user.png') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a style="color:white;" href="{{ route('admin.profil.index') }}" data-toggle="tooltip" data-placement="bottom" title="Profil Owner" class="d-block">
            <u><b>Admin</b></u> </a>
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
                        <span class="right badge badge-danger">New</span>
                    </p>
                </a>
            </li>
            <li @if(Route::currentRouteName()=="admin.admin.index" || Route::currentRouteName()=="admin.admin.edit" ||
                Route::currentRouteName()=="admin.admin.create" || Route::currentRouteName()=="admin.owner.index" ||
                Route::currentRouteName()=="admin.owner.create" || Route::currentRouteName()=="admin.owner.edit" ||
                Route::currentRouteName()=="admin.customer.index" || Route::currentRouteName()=="admin.customer.create"
                || Route::currentRouteName()=="admin.customer.edit" ) class="nav-item menu-open" @else class="nav-item"
                @endif>
                <a @if(Route::currentRouteName()=="admin.admin.index" || Route::currentRouteName()=="admin.admin.edit"
                    || Route::currentRouteName()=="admin.admin.create" || Route::currentRouteName()=="admin.owner.index"
                    || Route::currentRouteName()=="admin.owner.create" || Route::currentRouteName()=="admin.owner.edit"
                    || Route::currentRouteName()=="admin.customer.index" ||
                    Route::currentRouteName()=="admin.customer.create" ||
                    Route::currentRouteName()=="admin.customer.edit" ) class="nav-link active" @else class="nav-link"
                    @endif href="#">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Pengguna
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a @if(Route::currentRouteName()=="admin.admin.index" ||
                            Route::currentRouteName()=="admin.admin.edit" ||
                            Route::currentRouteName()=="admin.admin.create" ) class="nav-link active" @else
                            class="nav-link" @endif href="{{ route('admin.admin.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @if(Route::currentRouteName()=="admin.owner.index" ||
                            Route::currentRouteName()=="admin.owner.create" ||
                            Route::currentRouteName()=="admin.owner.edit" ) class="nav-link active" @else
                            class="nav-link" @endif href="{{ route('admin.owner.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pemilik Venue Lapangan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @if(Route::currentRouteName()=="admin.customer.index" ||
                            Route::currentRouteName()=="admin.customer.create" ||
                            Route::currentRouteName()=="admin.customer.edit" ) class="nav-link active" @else
                            class="nav-link" @endif href="{{ route('admin.customer.index') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Penyewa Lapangan</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li @if(Route::currentRouteName()=="admin.venue.index.admin" ||
                Route::currentRouteName()=="admin.venue.show-index" ||
                Route::currentRouteName()=="admin.venue.index1.admin" ||
                Route::currentRouteName()=="admin.venue.show1-index" ||
                Route::currentRouteName()=="admin.venue.index2.admin" ||
                Route::currentRouteName()=="admin.venue.show2-index" ) class="nav-item menu-open" @else class="nav-item"
                @endif>
                <a @if(Route::currentRouteName()=="admin.venue.index.admin" ||
                    Route::currentRouteName()=="admin.venue.show-index" ||
                    Route::currentRouteName()=="admin.venue.index1.admin" ||
                    Route::currentRouteName()=="admin.venue.show1-index" ||
                    Route::currentRouteName()=="admin.venue.index2.admin" ||
                    Route::currentRouteName()=="admin.venue.show2-index" ) class="nav-link active" @else
                    class="nav-link" @endif href="#" class="nav-link">
                    <i class="nav-icon fas fa-columns"></i>
                    <p>
                        Venue
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a @if(Route::currentRouteName()=="admin.venue.index.admin" ||
                            Route::currentRouteName()=="admin.venue.show-index" ) class="nav-link active" @else
                            class="nav-link" @endif href="{{ route('admin.venue.index.admin') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Perlu Konfirmasi</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @if(Route::currentRouteName()=="admin.venue.index2.admin" ||
                            Route::currentRouteName()=="admin.venue.show2-index" ) class="nav-link active" @else
                            class="nav-link" @endif href="{{ route('admin.venue.index2.admin') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Ditolak</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a @if(Route::currentRouteName()=="admin.venue.index1.admin" ||
                            Route::currentRouteName()=="admin.venue.show1-index" ) class="nav-link active" @else
                            class="nav-link" @endif href="{{ route('admin.venue.index1.admin') }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Terkonfirmasi</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li @if(Route::currentRouteName()=="admin.field-type.index" ) class="nav-item menu-open" @else class="nav-item"
                @endif>
                <a @if(Route::currentRouteName()=="admin.field-type.index" ) class="nav-link active" @else class="nav-link"
                    @endif href="{{ route('admin.field-type.index') }}">
                    <i class="nav-icon fas fa-file"></i>
                    <p>
                        Tipe Lapangan
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <nav class="mt-2" style="position:absolute; bottom:20px;background-color:#DA2F3F;color:white;border-radius:5px;">
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false">
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