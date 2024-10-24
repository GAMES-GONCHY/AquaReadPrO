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
        
        // Buscar al socio en la base de datos
        $socio = $this->reporte_model->obtener_socio_por_codigo($criterio);
        
        if ($socio)
        {
            echo json_encode($socio);  // Retornar el socio encontrado en formato JSON
        }
        else 
        {
            echo 'false';  // Si no se encuentran resultados
        }
    }

}
