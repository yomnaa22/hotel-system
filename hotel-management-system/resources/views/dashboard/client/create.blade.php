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
                    <li class="breadcrumb-item active">General Form</li>
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
                        <h3 class="card-title">Add Client</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('client.store')}}" enctype="multipart/form-data">
                        @csrf
                        @if($errors)
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter name">
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail" placeholder="Enter email">
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMobile">Mobile Number</label>
                                <input type="text" name="mobile" class="form-control" id="exampleInputMobile" placeholder="Enter mobile number">
                                <span class="text-danger">{{$errors->first('mobile')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            </div>
                            <div class="form-group">
                                <label>Country</label>
                                <select class="form-control" name="country">
                                    @foreach ($countries as $country)
                                    <option value="{{$country}}">{{$country}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female" value="female" checked>
                                <label class="form-check-label" for="female">
                                    Female
                                </label>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input class="form-control" type="file" name="avatar_img" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        <span class="text-danger">{{$errors->first('avatar_img')}}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        @endif
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