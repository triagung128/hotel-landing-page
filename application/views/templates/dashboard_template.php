<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $judul; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="<?php echo base_url()?>assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="<?php echo base_url()?>assets/admin/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
    
    <link href="<?php echo base_url()?>assets/css/vendor/bootstrap-datepicker.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <?php $this->load->view('templates/dashboard_header'); ?>

        <div id="page-wrapper">
            <?php echo $contents; ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/admin/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()?>assets/admin/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- CKEditor -->
    <script src="<?php echo base_url()?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

    <!-- DataTables JavaScript -->
    <script src="<?php echo base_url()?>assets/admin/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>assets/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!--Date Picker -->
  <script src="<?php echo base_url()?>assets/js/vendor/bootstrap-datepicker.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url()?>assets/admin/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

    <!-- Date Picker -->
  <script type="text/javascript">
    $(document).ready(function () {
      $('.tgl-dtg').datepicker({
        format: "dd-mm-yyyy",
        autoclose:true
      });
    });
  </script>

</body>

</html>
