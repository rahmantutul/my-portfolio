<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('assets/backend/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/backend/vendors/base/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('assets/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('assets/backend/css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
  @yield('style')
</head>
<body>
  <div class="container-scroller">
        @include('backend.layouts.header')
        @include('backend.layouts.sidebar')
        <div class="main-panel">

        @yield('content')
        <!-- content-wrapper ends -->
        {{-- @include('backend.layouts.footer') --}}
        </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  @include('sweetalert::alert')

  <!-- endinject -->
  <script src="{{asset('assets/backend/vendors/base/vendor.bundle.base.js')}}"></script>
  <!-- Plugin js for this page-->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="{{asset('assets/backend/js/Admin.js')}}"></script>
  <script src="{{asset('assets/backend/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('assets/backend/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/backend/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>

  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('assets/backend/js/off-canvas.js')}}"></script>
  <script src="{{asset('assets/backend/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('assets/backend/js/template.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('assets/backend/js/dashboard.js')}}"></script>
  <script src="{{asset('assets/backend/js/data-table.js')}}"></script>
  <script src="{{asset('assets/backend/js/jquery.dataTables.js')}}"></script>
  <script src="{{asset('assets/backend/js/dataTables.bootstrap4.js')}}"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @yield('javascript')

</body>

</html>

