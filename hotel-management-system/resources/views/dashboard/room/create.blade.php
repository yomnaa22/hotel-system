@extends('dashboard.layout.master')

@section('title')
<title>AdminLTE 3 | DataTables</title>
@endsection

@section('customstyles')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('custom-dashboard/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('custom-dashboard/dist/css/adminlte.min.css') }}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add Room</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Create Room</li>
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
                        <h3 class="card-title">Create Room</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('room.store') }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName">Name : </label>
                                <input type="name" name="name" class="form-control" id="exampleInputName" class="@error('name') is-invalid @enderror" placeholder="Enter name">
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputName1">Number :</label>
                                <input type="number" name="number" class="form-control" id="exampleInputName1" class="@error('number') is-invalid @enderror" placeholder="Enter Number of room">
                                @error('number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName2">Capacity :</label>
                                <input type="number" name="capacity" class="form-control" id="exampleInputName2" class="@error('capacity') is-invalid @enderror" placeholder="Enter capacity of room">
                                @error('capacity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="exampleInputName3">Price in cent:</label>
                                <input type="number" name="price" class="form-control" id="exampleInputName3" class="@error('price') is-invalid @enderror" placeholder="Enter price of room">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="form-group">
                                <label for="exampleInputName4">Manager Id :</label>
                                <select class="form-control" name="manager" id="exampleInputName4">
                                    @foreach($managers as $manager )
                                    <option value="{{$manager->id}}"> {{ $manager->name??'not found' }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName5">Floor Number :</label>
                                <select class="form-control" name="floor" id="floor" id="exampleInputName5">
                                    @foreach($floors as $floor )
                                    <option value="{{$floor->id}}"> {{ $floor->number??'not found' }}</option>
                                    @endforeach
                                </select>
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
<script src="{{ asset('custom-dashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('custom-dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{ asset('custom-dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('custom-dashboard/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('custom-dashboard/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>
@endsection