<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('user.index')}}">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-car"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Cars</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0" />

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="{{route('user.index')}}">
          <i class="fas fa-fw fa-qrcode"></i>
          <span>Dashboard</span></a>
      </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities101"
               aria-expanded="true" aria-controls="collapseUtilities101">
                <i class="fas fa-car-side"></i>

                <span>Post Vehicle</span>
            </a>
            <div id="collapseUtilities101" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Post Option</h6>
                    <a class="collapse-item" href="{{route('user.product.index')}}">Post A Vehicle</a>
                    <a class="collapse-item" href="{{route('user.products.all')}}">Vehicle Listings</a>
                </div>
            </div>
        </li>



{{--      <li class="nav-item">--}}
{{--        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"--}}
{{--          aria-expanded="true" aria-controls="collapseUtilities">--}}
{{--            <i class="fas fa-gavel"></i>--}}

{{--            <span>Auction Asset</span>--}}
{{--        </a>--}}
{{--        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">--}}
{{--          <div class="bg-white py-2 collapse-inner rounded">--}}
{{--            <h6 class="collapse-header">Post Option</h6>--}}
{{--            <a class="collapse-item" href="{{route('admin.auction')}}">Auction Asset</a>--}}
{{--            <a class="collapse-item" href="{{route('admin.auction')}}">View Listings</a>--}}
{{--          </div>--}}
{{--        </div>--}}
{{--      </li>--}}





        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities105"
               aria-expanded="true" aria-controls="collapseUtilities105">
                <i class="fas fa-hand-holding"></i>
                <span>Service Requests</span>
            </a>
            <div id="collapseUtilities105" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Post Option</h6>
                    <a class="collapse-item" href="{{route('users.view.reports')}}">User-Reported Vendors</a>
                    <a class="collapse-item" href="{{route('users.view.requests')}}">Car Requests</a>
                    <a class="collapse-item" href="{{route('users.evaluate.all')}}">Asset Evaluation</a>
                </div>
            </div>
        </li>




        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities106"
               aria-expanded="true" aria-controls="collapseUtilities106">
                <i class="fas fa-cogs"></i>
                <span>Part</span>
            </a>
            <div id="collapseUtilities106" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Post Option</h6>
                    <a class="collapse-item" href="{{route('users.parts')}}">Upload Car Parts</a>
                    <a class="collapse-item" href="{{route('users.all.parts')}}">Part Listings</a>
                </div>
            </div>
        </li>



        <li class="nav-item">
        <a class="nav-link" href="{{route('user.dashboard.profile')}}">
          <i class="fas fa-fw fa-user-circle"></i>
          <span>Profile</span></a>
      </li>


      <li class="nav-item">
        <a class="nav-link" href="{{route('all.message.users')}}">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Message</span></a>
      </li>


        <li class="nav-item">
            <a class="nav-link" href="{{route('user.verify')}}">
                <i class="fas fa-fw fa-file"></i>
                <span>Request Verification</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities108"
               aria-expanded="true" aria-controls="collapseUtilities108">
                <i class="fas fa-ban"></i>
                <span>Blacklist</span>
            </a>
            <div id="collapseUtilities108" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Post Option</h6>
                    <a class="collapse-item" href="{{route('users.stolen.view')}}">Upload Stolen Cars</a>
                    <a class="collapse-item" href="{{route('users.stolen.all')}}">View Stolen Listings</a>
                </div>
            </div>
        </li>




      <li class="nav-item">
        <a class="nav-link" href="{{route('sold.all')}}">
          <i class="fas fa-fw fa-file"></i>
          <span>Sold History</span></a>
      </li>




      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block" />

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                aria-label="Search" aria-describedby="basic-addon2" />
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">
            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                      aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-bell fa-fw"></i>
                  <!-- Counter - Alerts -->
                  <span class="badge badge-danger badge-counter">{{ $unreadNotificationsCount }}</span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                  aria-labelledby="alertsDropdown">
                  <h6 class="dropdown-header">Alerts Center</h6>
                  @foreach ($notifications ?? [] as $notification)
                      <a class="dropdown-item d-flex align-items-center" href="{{ route('mark_As_read', ['id' => $notification->id]) }}">
                          <div class="mr-3">
                              <div class="icon-circle bg-primary">
                                  <i class="fas fa-file-alt text-white"></i>
                              </div>
                          </div>
                          <div>
                              <div class="small text-gray-500">{{ $notification->created_at->format('F d, Y') }}</div>
                              <span class="font-weight-bold">{{ $notification->data['message'] }}</span>
                          </div>
                      </a>
                  @endforeach

                  <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
              </div>
          </li>


            <!-- Nav Item - Messages -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                <img class="img-profile rounded-circle" src="/img/undraw_profile.svg" />
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{route('process.logout')}}" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->

         @yield('page.content')
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website {{ date('Y') }}</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
