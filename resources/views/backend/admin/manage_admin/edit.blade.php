@extends('layouts.admin.home')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Admin</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.admin.index') }}">List Data Admin</a></li>
                    <li class="breadcrumb-item active">Edit Data Admin</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title"><small>Edit Data Admin</small></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    {{ Form::open(array('method'=>'PATCH','url' => route('admin.admin.update', $admin->id), 'files' =>true)) }}
                    <div class="card-body">

                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input name="first_name" value="{{$admin->first_name}}" type="text"
                                        class="form-control" id="first_name" placeholder="">
                                    @error('first_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input name="last_name" value="{{$admin->last_name}}" type="text"
                                        class="form-control" id="last_name" placeholder="">
                                    @error('last_name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input name="address" value="{{$admin->address}}" type="text" class="form-control"
                                id="address" placeholder="">
                            @error('address')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <!-- text input -->
                                <div class="form-group">
                                    <label for="handphone">Phone Number</label>
                                    <input name="handphone" value="{{$admin->handphone}}" type="phone"
                                        class="form-control" id="handphone" placeholder="">
                                    @error('handphone')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input name="email" value="{{$admin->user->email}}" type="email"
                                        class="form-control" id="email" placeholder="" disabled="">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('admin.admin.index') }}">
                            <button class="btn btn-default" type="button">Back</button>
                        </a>
                        <a href="">
                            <button class="btn btn-primary" type="submit">Save Data</button>
                        </a>

                    </div>
                    {!! Form::close() !!}

                </div>
                <!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection