<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('/')}}admin/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{asset('/')}}admin/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('/')}}admin/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{asset('/')}}admin/vendors/datatables.net-bs4/dataTables.bootstrap4.css">

  <link rel="stylesheet" type="text/css" href="{{asset('/')}}admin/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('/')}}admin/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('/')}}admin/images/favicon.png" />
  <link rel="stylesheet" href="{{asset('/')}}admin/css/filecss.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('admin_layout.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->

      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('admin_layout.sidebar')
      <!-- partial -->
      <div class="main-panel">
        @yield('contect')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin_layout.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('/')}}admin/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('/')}}admin/vendors/chart.js/Chart.min.js"></script>
  <script src="{{asset('/')}}admin/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{asset('/')}}admin/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="{{asset('/')}}admin/js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('/')}}admin/js/off-canvas.js"></script>
  <script src="{{asset('/')}}admin/js/hoverable-collapse.js"></script>
  <script src="{{asset('/')}}admin/js/template.js"></script>
  <script src="{{asset('/')}}admin/js/settings.js"></script>
  <script src="{{asset('/')}}admin/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('/')}}admin/js/dashboard.js"></script>
  <script src="{{asset('/')}}admin/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
   <!-- Bootstrap JS -->
<!-- Bootstrap JS -->
<!-- jQuery ve Bootstrap JS dosyalarını doğru şekilde eklediğinizden emin olun -->
 
</body>

</html>