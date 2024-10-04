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
    
    <!-- switches -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />

    
  <!-- Estilo para cambiar de backgroud -->
  <style>
      .app-cover.new-background 
      {
          background-image: url('<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-15.jpg'); /* Nueva imagen */
      }
              /* Aplicar a todos los modales */
      .modal {
          z-index: auto !important; /* Revertir cualquier cambio de z-index */  
      }

      .modal-backdrop {
          z-index: auto !important;
      }

      .modal .modal-title,
      .modal .form-control,
      .modal label,
      .modal .btn {
          color: #000000 !important; /* Color negro para todo el texto en los modales */
      }

      .modal {
    z-index: 1055 !important;
}


body.modal-open {
    overflow-y: hidden; /* Evita el desplazamiento de fondo mientras el modal está abierto */
}
  </style>



    <!-- estilo hover para botones de tablas -->
    <!-- Agrega los estilos CSS -->
<style>
  .hover-registrar:hover {
    color: #ffffff !important;
    background-color: #28a745 !important; /* Verde */
  }

  .hover-medidores:hover {
    color: #ffffff !important;
    background-color: #ffc107 !important; /* Amarillo */
  }

  .hover-eliminados:hover {
    color: #ffffff !important;
    background-color: #dc3545 !important; /* Rojo */
  }

  /* Efecto general */
  .hover-registrar:hover,
  .hover-medidores:hover,
  .hover-eliminados:hover {
    border-radius: 8px;
    transition: 0.3s;
    padding: 10px;
  }
</style>


<style>
  .modal-backdrop {
    background-color: transparent !important; /* Elimina el color de fondo oscuro */
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