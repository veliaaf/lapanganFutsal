@extends('layouts.owner.home')

@section('content')
<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kelola Venue</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">Kelola Venue</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section class="content">
    
    @if ($venues->count() == 0)
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Data Venue
                        </h3>
                        @if (Auth::user()->owner->ktp)
                        <a style="float:right; margin-right:5px;" href="{{ route('owner.venue.create') }}">
                            <button class="btn btn-primary" type="button">Tambah Venue</button>
                        </a>
                        @else
                        <a style="float:right; margin-right:5px;" href="#">
                            <button onclick="warning()" class="btn btn-primary" type="button">Tambah Venue</button>
                        </a>
                        @endif
                        
                    </div>
                    <div class="card-body">
                        <h3><center>Data Venue Masih Kosong !</center> </h3>
                        <p><center>Venue kamu telah terkonfirmasi oleh admin, mari isi data venue anda dengan lengkap dan benar</center></p>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
    </div>
    @else
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">List Data Venue
                        </h3>
                        @if (Auth::user()->owner->ktp)
                        <a style="float:right; margin-right:5px;" href="{{ route('owner.venue.create') }}">
                            <button class="btn btn-primary" type="button">Tambah Venue</button>
                        </a>
                        @else
                        <a style="float:right; margin-right:5px;" href="#">
                            <button onclick="warning()" class="btn btn-primary" type="button">Tambah Venue</button>
                        </a>
                        @endif
                    </div>
                    <div class="card-body">
                    <div class="row sortable-card">
                        @foreach ($venues as $venue)
                        <div class="col-4 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b>{{$venue->name}}</b></h2>
                                            <p class="text-muted text-sm"><b></b></p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span>
                                                    Address: {{$venue->address}}</li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span> Phone:
                                                    {{$venue->phone_number}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="{{ asset('images/venue/'.$venue->FirstImage()->image) }}"
                                                alt="venue" class="img-circle img-fluid" style="width:500px; height:100px;">
                                            @if($venue->status == 0)
                                            <span class="badge badge-info" style="width:100%">Menunggu Konfirmasi</span>
                                            @elseif ($venue->status == 1)
                                            <span class="badge badge-success" style="width:100%">Aktif</span>
                                            @else
                                            <span class="badge badge-danger" style="width:100%">Ditolak</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a class="btn btn-sm btn-primary" @if ($venue->status ==
                                            1)
                                            href="{{ route('owner.venue.show', $venue->id) }}"
                                            @elseif ($venue->status == 2) onclick="edit_venue({{$venue->id}})"
                                            href="javascript:void(0)"
                                            @elseif ($venue->status == 0) onclick="confirm_venue()"
                                            href="javascript:void(0)"
                                            @endif>
                                            View Venue  &ensp;<i class="fas fa-arrow-right"></i>  
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
    </div>
    @endif

</section>

{!! Form::open(['method'=>'PATCH', 'route' => ['owner.venue.edit', 0], 'style' =>'display:none','id'=>'edit_venue']) !!}
{!! Form::close() !!}
@endsection

@section('script')
<script type="text/javascript">
    function edit(id, name, address, latitude, longitude) {
        if ($('#edit').is(":visible")) {
            $('#edit').hide('500');
        } else {
            console.log(id);
            $('#edit').show('500');
            $('#e_name').val(name);
            $('#e_address').val(address);
            $('#e_latitude').val(latitude);
            $('#e_longitude').val(longitude);
            $('#form-update').attr('action', "{{route('owner.venue.index')}}/" + id);
        }
    }

    function show(id, name, address, latitude, longitude) {
        $('#s_name').val(name);
        $('#s_address').val(address);
        $('#s_latitude').val(latitude);
        $('#s_longitude').val(longitude);
    }

    function confirm_venue(id) {
        swal({
            title: "Venue kamu belum dikonfirmasi !",
            text: "Harap menunggu admin untuk mengkonfirmasi venue kamu",
            type: "warning",
            confirmButtonColor: "#f02b2b",
            confirmButtonText: "OK",
            closeOnConfirm: false,
            closeOnCancel: false
        });
    }

    function edit_venue(id) {
        swal({
                title: "Apakah kamu ingin melengkapi data venue?",
                text: "Data venue yang telah dilengkapi akan diajukan lagi untuk dikonfirmasi oleh admin!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#5cc744",
                confirmButtonText: "Ya, konfirmasi!",
                cancelButtonText: "Tidak, batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    swal("Lengkapi data!", "Kamu akan dipindahkan ke halaman untuk melengkapi data kos.",
                        "success");
                    location.href = "{{route('owner.venue.index')}}/" + id + "/edit?data=request";
                } else {
                    swal("Dibatalkan", "Kamu batal melengkapi data kos", "error");
                }
            });
    }

    function warning() {
        swal({
                title: "Apakah kamu ingin melengkapi data ktp anda?",
                text: "Sebelum menambahkan venue, anda harus menginputkan ktp anda !",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#5cc744",
                confirmButtonText: "Ya, lengkapi!",
                cancelButtonText: "Tidak, batalkan!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    swal("Lengkapi data!", "Kamu akan dipindahkan ke halaman untuk melengkapi data ktp.",
                        "success");
                    location.href = "{{route('owner.profil.index')}}";
                } else {
                    swal("Dibatalkan", "Kamu batal melengkapi data ktp", "error");
                }
            });
    }
</script>
@endsection