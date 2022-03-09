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
                    <li class="breadcrumb-item active">Update Reservation</li>
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
                        <h3 class="card-title">Update Reservation</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{route('reservation.update',['id'=>$id])}}">
                        @csrf
                        @if($errors)
                        <div class="card-body">
                            <div class="form-group">
                                <label for="accompany_number">Accompany number</label>
                                <input type="number" name="accompany_number" class="form-control" value="{{$reservation->accompany_number}}" id="accompany_number" placeholder="Enter accompany number">
                                <span class="text-danger">{{$errors->first('accompany_number')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="paid_price">Paid Price</label>
                                <input type="number" name="paid_price" class="form-control" value="{{$reservation->paid_price}}" id="paid_price" placeholder="Enter paid price">
                                <span class="text-danger">{{$errors->first('paid_price')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="room_number">Room Number</label>
                                <input type="number" name="room_number" class="form-control" value="{{$reservation->room_number}}" id="room_number" placeholder="Enter room number">
                                <span class="text-danger">{{$errors->first('room_number')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="client_id">client id</label>
                                <input type="number" name="client_id" class="form-control" value="{{$reservation->client_id}}" id="client_id" placeholder="client id">
                                <span class="text-danger">{{$errors->first('client_id')}}</span>
                            </div>
                            <div class="form-group">
                                <label for="receptionist_id">receptionist_id</label>
                                <input type="number" name="receptionist_id" class="form-control" value="{{$reservation->receptionist_id}}" id="receptionist_id" placeholder="recepionist id">
                                <span class="text-danger">{{$errors->first('receptionist_id')}}</span>
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