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





    <!-- DataTables CSS -->
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>coloradmin/assets/plugins/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" />



    
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

<style>
  .toggle-checkbox {
    width: 16px;
    height: 16px;
    cursor: pointer;
    appearance: none;
    background-color: #ddd;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
    transition: background-color 0.3s ease;
}

.toggle-checkbox:checked {
    background-color: #4CAF50;
    border-color: #4CAF50;
}
</style>
<style>
/* Fondo oscuro con transparencia */
.bg-dark-transparent {
  background-color: rgba(0, 0, 0, 0.6); /* Fondo oscuro con transparencia */
}

/* Estilo para el botón de configuración */
.btn-outline-light {
  transition: background-color 0.3s, color 0.3s;
  border-color: rgba(255, 255, 255, 0.7); /* Borde claro y sutil */
}

.btn-outline-light:hover {
  background-color: rgba(255, 255, 255, 0.2); /* Fondo claro al hacer hover */
  color: #ffffff;
  border-color: #ffffff;
}

/* Estilo del encabezado */
h1.h3 {
  font-weight: bold;
}
</style>


<!-- stilos para modal avisos -->
<style>
  
/* Definir el color verde esmeralda */
:root {
  --main-green: rgb(80, 200, 120); /* Verde esmeralda */
  --dark-green: rgb(60, 160, 100); /* Un verde esmeralda más oscuro para hover y degradado */
}

/* Estilo general del modal */
.custom-modal-content {
  background: linear-gradient(135deg, #f0f2f5, #ffffff);
  border: none;
  border-radius: 10px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Encabezado del modal */
.custom-modal-header {
  background: linear-gradient(to right, var(--main-green), var(--dark-green));
  color: white;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.custom-modal-header .modal-title {
  font-weight: bold;
  font-size: 1.25rem;
}

.custom-modal-header .close {
  color: #ffffff;
  opacity: 0.8;
}

.custom-modal-header .close:hover {
  opacity: 1;
}

/* Cuerpo del modal */
.custom-modal-body {
  padding: 20px;
}

/* Secciones de información dentro del modal */
.info-section {
  background: #e9ecef;
  border: 1px solid #dee2e6;
  border-radius: 8px;
  margin-bottom: 10px;
  box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.1);
}
.info-section p,
.info-section ul li {
  font-size: 1.0rem; /* Tamaño de letra más grande para mejorar la legibilidad */
  color: #333; /* Color de texto para mantener buen contraste */
}

/* Ajuste para los títulos y valores importantes */
.info-section strong {
  font-size: 1.0rem; /* Aumentar el tamaño de los títulos para destacarlos */
  color: #000; /* Color más oscuro para un mayor énfasis */
}
/* Listas dentro del modal */
ul {
  margin: 0;
  padding-left: 20px;
}

ul li {
  font-size: 0.95rem;
  color: #333;
}

/* Pie del modal */
.custom-modal-footer {
  background: #f8f9fa;
  border-bottom-left-radius: 10px;
  border-bottom-right-radius: 10px;
  box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
}

/* Botones dentro del modal */
.btn-primary {
  background-color: var(--main-green);
  border-color: var(--main-green);
  transition: background-color 0.3s, box-shadow 0.3s;
}

.btn-primary:hover {
  background-color: var(--dark-green);
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

/* Mejora del estilo para el botón de cerrar "X" */
.close-button {
  background-color: transparent; /* Mantener el fondo transparente */
  color: #dc3545; /* Color rojo para el icono "X" */
  border: none; /* Sin borde para un diseño limpio */
  font-size: 1.8rem; /* Tamaño del icono "X" para mejor visibilidad */
  padding: 0.2rem; /* Espaciado reducido para un área de clic precisa */
  cursor: pointer; /* Mostrar puntero para indicar que es interactivo */
  transition: color 0.2s ease, transform 0.2s ease; /* Transición suave para hover */
}

.close-button:hover {
  color: #c82333; /* Cambiar a un rojo más oscuro en hover */
  transform: scale(1.1); /* Aumentar ligeramente el tamaño en hover */
}
</style>
<!-- color de letras en tablas colapsadas -->
<style>
.dtr-title {
    color: #ffffff !important; /* Cambia el color a blanco para los títulos */
}

.dtr-data {
    color: #cccccc !important; /* Cambia el color a un gris claro para los datos */
}

</style>
<style>
div.pt-2 .parsley-errors-list li {
    color: red !important;
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