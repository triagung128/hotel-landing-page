<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $judul; ?></title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text:300,400,700|Rubik:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/styles-merged.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/custom.css">
    <link href="<?php echo base_url()?>vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <link href="<?php echo base_url()?>assets/css/vendor/bootstrap-datepicker.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <!-- START: header -->
  <?php $this->load->view('templates/page_header'); ?>
  <!-- END: header -->

  <?php echo $contents; ?>

  <!-- START: footer -->
  <?php $this->load->view('templates/page_footer'); ?>
  <!-- END: footer -->

  <script src="<?php echo base_url()?>assets/js/scripts.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/main.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/custom.js"></script>

  <!--Date Picker -->
  <script src="<?php echo base_url()?>assets/js/vendor/bootstrap-datepicker.js"></script>

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