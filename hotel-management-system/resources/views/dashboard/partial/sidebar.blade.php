<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('custom-dashboard/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('custom-dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        @if(Auth::guard('admin')->check())

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Manage Admins
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Admin</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Admin</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Manage Managers
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('manager.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Managers</p>
              </a>
            </li>
            <li class="nav-item">

              <a href="{{ route('manager.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Manager</p>
              </a>
            </li>

          </ul>
        </li>

        @endif


        @if(Auth::guard('manager')->check()||Auth::guard('admin')->check())
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Manage Receptionists

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/dashboard/receptionists/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Receptionists</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/dashboard/receptionists/create" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Receptionists</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Manage Floors

              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="/dashboard/floors/" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Floors</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/dashboard/floors/create" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Floor</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Manage Rooms
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">

              <a href="{{ route('room.index') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Rooms</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('room.create') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Room</p>
              </a>
            </li>

          </ul>
        </li>


        @endif


        @if(Auth::guard('manager')->check()||Auth::guard('admin')->check() || Auth::guard('receptionist')->check())
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Manage Clients
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('client.index')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Clients to Approve</p>
              </a>
            </li>
            <li class="nav-item">

              <a href="{{route('client.approve')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Approved clients</p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Reservations
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('reservation.showReservations')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>List Reservations</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('reservation.manage')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage Reservations</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('reservation.approved')}}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Approved Reservations</p>
              </a>
            </li>

          </ul>

        </li>

        @endif




        @if(Auth::guard('client')->check())
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Available Rooms
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('room.showAvail') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Show Available Rooms</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              My Reservations
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('reservation.show') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Show My Reservations</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
      </ul>
      </li>



    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>