<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link elevation-4" style="text-align:center;">
      <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <i class="nav-icon fas fa-align-center"></i><span class="brand-text font-weight-light">&nbsp;<b>Stack Kelompok #92</b>&nbsp;
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ !empty(Auth::user()->name)?Auth::user()->name:'Guest' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
          <a href="{{ url('/') }}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="{{ url('/pertanyaan') }}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Pertanyaan
              
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/erd') }}" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                  ERD
                </p>
              </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ url('/tentang-kami') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Tentang Kami
                </p>
              </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>