<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Color Admin | Search Results</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />


  <!-- Vendor CSS -->
  <link href="<?php echo base_url(); ?>coloradmin/assets/css/vendor.min.css" rel="stylesheet" />

  <!-- App CSS -->
  <link href="<?php echo base_url(); ?>coloradmin/assets/css/transparent/app.min.css" rel="stylesheet" />


<!-- Estilo para cambiar de backgroud -->
<style>
	.app-cover.new-background 
	{
		background-image: url('<?php echo base_url(); ?>coloradmin/assets/img/login-bg/login-bg-15.jpg'); /* Nueva imagen */
	}
</style>

<!-- stilos para modal -->
<style>
.modal-body {
    padding: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #212529; /* Color de texto principal oscuro */
}

.modal-title {
    font-size: 22px;
    font-weight: bold;
    color: #2c3e50; /* Un color oscuro y consistente para el título */
}

.table-borderless td {
    padding: 12px 15px;
    vertical-align: middle;
    color: #212529; /* Color oscuro para todo el texto */
}

.table-borderless td:first-child {
    font-weight: bold;
    color: #000; /* Negro para los títulos */
}

.text-secondary {
    color: #495057; /* Un gris más oscuro para los detalles */
}

.fw-bold {
    font-weight: bold;
}

.text-dark {
    color: #343a40;
}

.text-danger {
    color: #dc3545; /* Resalta fechas de vencimiento en rojo */
}

.bg-success {
    background-color: #28a745 !important; /* Color verde para el estado */
    color: white; /* Asegurar que el texto sea blanco en el badge */
    padding: 5px 10px;
    border-radius: 4px;
}

.btn {
    border-radius: 4px;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
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