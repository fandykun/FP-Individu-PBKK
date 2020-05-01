<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>{% block title %}{% endblock %}</title>
    <link rel="icon" type="image/png" href="{{ url('assets/img/logo.png') }}" />
  <!-- Custom fonts for this template-->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{ url('assets/sb-admin-2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="{{ url('assets/sb-admin-2/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this page -->
  <link href="{{ url('assets/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
{% block styles %}{% endblock %}
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    {% include 'admin/sidebar.volt' %}
    
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        {% include 'admin/header.volt' %}

        <!-- Begin Page Content -->
        <div class="container-fluid">
          {% block content %}{% endblock %}
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    {% include 'admin/footer.volt' %}
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ url('assets/sb-admin-2/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('assets/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ url('assets/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ url('assets/sb-admin-2/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('assets/sb-admin-2/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('assets/sb-admin-2/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ url('assets/sb-admin-2/js/demo/chart-pie-demo.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ url('assets/sb-admin-2/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ url('assets/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ url('assets/sb-admin-2/js/demo/datatables-demo.js') }}"></script>

  {% block scripts %}{% endblock %}
</body>

</html>
