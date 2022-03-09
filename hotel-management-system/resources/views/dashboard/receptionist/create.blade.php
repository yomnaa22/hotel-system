@extends('dashboard.layout.master')

@section('title')
<title>AdminLTE 3 | DataTables</title>
@endsection

@section('customstyles')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('custom-dashboard/plugins/fontawesome-free/css/all.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('custom-dashboard/dist/css/adminlte.min.css')}}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Receptionist</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Receptionist</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start-->
                    <form enctype="multipart/form-data" method="POST" action="{{  route('dashboard.receptionist.store') }}">
                        @csrf
                        <div class="card-body">


                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>

                                <input class="form-control" class="@error('name') is-invalid @enderror" type="text" id="exampleInputName1" name="name" placeholder="Enter name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" class="@error('email') is-invalid @enderror" id="exampleInputEmail1" name="email" placeholder="Enter email">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputid">National ID</label>
                                <input type="text" class="form-control" class="@error('national_id') is-invalid @enderror" id="exampleInputid" name="national_id" placeholder="Enter ID">
                                @error('national_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>

                                <input type="password" class="form-control" class="@error('password') is-invalid @enderror" name="password" id="exampleInputPassword1" placeholder="Password">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">File input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input class="form-control" type="file" name="avatar_img" class="@error('avatar_img') is-invalid @enderror custom-file-input" id="exampleInputFile">
                                        @error('avatar_img')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <label for="manager_id">manager_id</label>
                                <br>

                                <select class="form-control" class="@error('manager_id') is-invalid @enderror" aria-label="Default select example" id="manager_id" name="manager_id">
                                    <option selected> select managaer</option>
                                    @foreach($manager as $manager)
                                    <option value="{{$manager-> id}}">{{ $manager -> name }}</option>
                                    @endforeach

                                </select>
                                @error('manager_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@section('custom-scripts')

<!-- jQuery -->
<script src="{{ asset('custom-dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('custom-dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('custom-dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('custom-dashboard/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('custom-dashboard/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>


@endsection