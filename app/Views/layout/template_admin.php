<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Simple Tables</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Other tags -->
    <meta name="dicoding:email" content="biyanoscar@gmail.com">
    <!-- Other tags -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte3/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte3/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?= $this->include('layout/navbar_admin'); ?>

        <!-- Main Sidebar Container -->
        <?= $this->include('layout/sidebar_admin'); ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?= $this->renderSection('content') ?>
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">

            <strong>Copyright &copy; 2020 Biyan.</strong> All rights
            reserved.
        </footer>


    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/adminlte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="/adminlte3/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="/adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

    <!-- AdminLTE App -->
    <script src="/adminlte3/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/adminlte3/dist/js/demo.js"></script>
    <script>
        $(function() {
            $("#maintable").DataTable({
                "responsive": true,
                "autoWidth": false,
            });

        });
    </script>
    <?= $this->renderSection('script_content') ?>
</body>

</html>