@extends('dashboard.layout.master')

@section('title')
<title>AdminLTE 3 | DataTables</title>
@endsection

@section('customstyles')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{asset('custom-dashboard/plugins/fontawesome-free/css/all.min.css')}}">
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('custom-dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('custom-dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('custom-dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Theme style -->
<link rel="stylesheet" href="{{asset('custom-dashboard/dist/css/adminlte.min.css')}}">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>DataTables</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">DataTables</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Manage Reservations</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Accompany Number</th>
                                    <th>Paid Price</th>
                                    <th>Room Number</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                <tr>
                                    <td>{{$reservation->client->name}}</td>
                                    <td>{{$reservation->accompany_number}}</td>
                                    <td>{{$reservation->paid_price}}</td>
                                    <td>{{$reservation->room_number}}</td>
                                    <td>
                                        <form method="post" action="{{ route('reservation.approve',['id' => $reservation->id])}}" class="d-inline">
                                            @csrf
                                            <button class="btn btn-none btn-success" type="submit">Approve</button>
                                        </form>
                                        <form method="post" action="{{ route('reservation.reject',['id' => $reservation->id])}}" class="d-inline">
                                            @csrf
                                            <button class="btn btn-none btn-danger" type="submit">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Client Name</th>
                                    <th>Accompany Number</th>
                                    <th>Paid Price</th>
                                    <th>Room Number</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection

@section('custom-scripts')

<!-- jQuery -->
<script src="{{asset('custom-dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('custom-dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<!-- DataTables  & Plugins -->
<script src="{{asset('custom-dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('custom-dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}')}}"></script>

<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>



@endsection