<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Managed Tables - Extension Combination</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    
    
    <!-- Vendor CSS -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/css/vendor.min.css" rel="stylesheet" />

    <!-- App CSS -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/app.min.css" rel="stylesheet" />

    <!-- Gritter CSS -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">




    <!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />


    <!-- Dashboard / Apecharts -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/orange.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/lime.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/teal.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/cyan.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/red.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/pink.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/yellow.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/green.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/purple.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/indigo.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/black.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/theme/blue.min.css"> -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/jvectormap-next/jquery-jvectormap.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/nvd3/build/nv.d3.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- Uploads form -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-gallery/css/blueimp-gallery.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/css/jquery.fileupload.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>coloradmin/assets/plugins/blueimp-file-upload/css/jquery.fileupload-ui.css" rel="stylesheet" />

    <!-- Panel Socio -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/superbox/superbox.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/lity/dist/lity.min.css" rel="stylesheet" />
    <!-- datepicker range -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />

    
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css" rel="stylesheet" />
  




    
  <!-- Estilo para cambiar de backgroud -->
  <style>
      .app-cover.new-background 
      {
          background-image: url('<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-15.jpg'); /* Nueva imagen */
      }
  </style>

<style>
  .table-booking {
  display: block;
  text-decoration: none;
  color: inherit;
}

.table-booking {
  text-decoration: none;
}

</style>


<!-- modal reportes -->
 <style>

.daterangepicker {
  z-index: 1060 !important;
}
#advance-daterange {
  background-color: #fff; /* Fondo blanco */
  color: #000; /* Texto negro */
  border: 1px solid #000; /* Borde negro */
  padding: 10px; /* Relleno */
  border-radius: 5px; /* Bordes redondeados */
}

#advance-daterange i {
  color: #000; /* Color del ícono en el input */
}

#advance-daterange:hover {
  background-color: #e0e0e0; /* Fondo más oscuro en hover */
  border-color: #000; /* Mantiene el borde negro en hover */
}

#advance-daterange:focus {
  outline: none; /* Quita el contorno predeterminado en focus */
  box-shadow: 0 0 5px rgba(0, 0, 0, 0.5); /* Sombra al hacer focus */
}
#criterio::placeholder {
    color: #808080; /* Color gris */
  }
  .seleccionado {
    background-color: #d1e7dd; /* Color para indicar selección */
}
 </style>





</head>

<body>

    <div class="app-cover"></div>


    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>

<!-- START APP HEADER -->
    <div id="app" class="app app-header-fixed app-sidebar-fixed">

        <div id="header" class="app-header">