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
                <h1>Update Room</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Update Room</li>
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
                        <h3 class="card-title">Update Room</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="{{ route('room.update',$room->id) }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @csrf

                            <div class="form-group">
                                <label for="exampleInputName2">Capacity :</label>
                                <input type="number" name="capacity" class="form-control" id="exampleInputName2" class="@error('capacity') is-invalid @enderror" placeholder="Enter capacity of room" value="{{$room ->capacity}}">
                                @error('capacity')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName3">Price :</label>
                                <input type="number" name="price" class="form-control" id="exampleInputName3" class="@error('price') is-invalid @enderror" placeholder="Enter price of room" value="{{$room ->price}}">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName6">Status :</label>
                                <select class="form-control" name="status" id="exampleInputName6">
                                    <option value="0" @if ($room->status == 0) selected @endif>Empty</option>
                                    <option value="1" @if ($room->status == 1) selected @endif>Not Empty</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputName5">Floor Number :</label>
                                <select class="form-control" name="floor" id="floor" id="exampleInputName5">
                                    @foreach($floors as $floor )
                                    @if ($room->floor_id == $floor->id)
                                    <option value="{{$floor->id}}" selected>{{ $floor->number??'not found' }}</option>
                                    @else
                                    <option value="{{$floor->id}}">{{ $floor->number??'not found' }}</option>
                                    @endif
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