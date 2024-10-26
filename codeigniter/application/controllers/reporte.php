<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller
{
    public function historialpagos()
    {
        //$data['historial'] = $this->reporte_model->get_pagos();
        $this->load->view('incrustaciones/vistascoloradmin/headreportes');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('historialreportes');
        $this->load->view('incrustaciones/vistascoloradmin/footerreportes');
    }
    public function buscar_socio() 
    {
        // Recibir el código del socio desde la petición AJAX
        $criterio = $this->input->post('criterio');  // Cambiado a $criterio
        $fechaInicio = $this->input->post('fechaInicio');
        $fechaFin = $this->input->post('fechaFin');
        
        // Buscar al socio en la base de datos
        $socio = $this->reporte_model->obtener_socio_por_criterio($criterio);
        
        if ($socio)
        {
            echo json_encode($socio);  // Retornar el socio encontrado en formato JSON
        }
        else 
        {
            echo 'false';  // Si no se encuentran resultados
        }
    }
    // public function filtrar_reportes()
    // {
    //     $criterio = $this->input->post('criterio');  // Código o apellido del socio
    //     $fechaInicio = $this->input->post('fechaInicio');
    //     $fechaFin = $this->input->post('fechaFin');
        
    //     // Llama al modelo para obtener los reportes filtrados
    //     $data['reportes'] = $this->reporte_model->obtener_reportes($criterio, $fechaInicio, $fechaFin);
        
    //     // Retorna los datos como JSON para ser usados por JavaScript
    //     echo json_encode($data['reportes']);
    // }
    // public function generar_reporte() 
    // {
    //     // Recibir datos del formulario
    //     $codigoSocio = $this->input->post('codigoSocio');
    //     $fechaInicio = $this->input->post('fechaInicio');
    //     $fechaFin = $this->input->post('fechaFin');

    //     // Llama al modelo para obtener los datos del reporte
    //     $reporteData = $this->reporte_model->obtener_historial_pagos($codigoSocio, $fechaInicio, $fechaFin);

    //     // Verifica si hay datos para el reporte
    //     if ($reporteData) {
    //         // Aquí puedes generar el reporte, por ejemplo, en formato PDF o devolver una vista
    //         // Para este ejemplo, supongamos que generas una URL para visualizar el reporte
    //         $response = ['url' => base_url("path/to/generated/report.pdf")];
    //         echo json_encode($response);
    //     } else {
    //         echo json_encode(['error' => 'No se encontraron datos para el reporte.']);
    //     }
    // }

    public function obtener_historial_pagos() 
    {
        // Recibir datos del formulario
        $codigoSocio = $this->input->post('codigoSocio');
        $fechaInicio = $this->input->post('fechaInicio');
        $fechaFin = $this->input->post('fechaFin');

        // Llama al modelo para obtener los datos del historial de pagos
        $historialPagos = $this->reporte_model->obtener_historial_pagos($codigoSocio, $fechaInicio, $fechaFin);

        // Retorna los datos como JSON
        echo json_encode($historialPagos);
    }


}
