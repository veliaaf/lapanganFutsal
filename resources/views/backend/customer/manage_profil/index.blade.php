@extends('layouts.landing.home')

@section('content')
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>Futsal</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
        <div class="container">
            
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-detail-link" data-toggle="tab" href="#tab-detail"
                                    role="tab" aria-controls="tab-detail" aria-selected="false">Detail Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-edit-link" data-toggle="tab" href="#tab-edit"
                                    role="tab" aria-controls="tab-edit" aria-selected="false">Edit Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-password-link" data-toggle="tab" href="#tab-password"
                                    role="tab" aria-controls="tab-password" aria-selected="false">Ubah Password</a>
                            </li>
                            <li class="nav-item">
                                <a onclick="logout()" class="nav-link" href="#">Log Out
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
                                </a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-detail" role="tabpanel"
                                aria-labelledby="tab-detail-link">
                                @foreach ($customers as $customer)

                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Profil</h3><!-- End .card-title -->

                                                <p>Nama &emsp;: {{$customer->first_name}} {{$customer->last_name}}<br>
                                                    Alamat &ensp;: {{$customer->address}}<br>
                                                    No HP&emsp;&ensp;: {{$customer->handphone}}<br></p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-4">
                                        <div class="card card-dashboard"><center>
                                        <img @if ($customer->avatar == NULL)
                                            src="{{ asset('templates/img/user.png') }}"
                                        @else
                                            src="{{ asset('images/customer/'.$customer->avatar) }}"
                                        @endif alt="Product image" style="width:200px; height:200px" class="product-image">
                                        </center>
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                                @endforeach
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-edit" role="tabpanel"
                                aria-labelledby="tab-edit-link">
                                @include('backend.customer.manage_profil.edit')
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="tab-password" role="tabpanel"
                                aria-labelledby="tab-password-link">
                                @include('auth.passwords.change')
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
</main><!-- End .main -->

{!! Form::open(['method'=>'GET','route'=>['customer.profil.edit',0], 'style'=>'display.none','id'=>'edit_profil'])!!}
{!! Form::close() !!}


@endsection

@section('script')

<script>
function edit(id) {
        $('#edit_profil').attr('action', "{{route('customer.profil.index')}}/" + id + "/edit");
        $('#edit_profil').submit();
    }
</script>
@endsection
