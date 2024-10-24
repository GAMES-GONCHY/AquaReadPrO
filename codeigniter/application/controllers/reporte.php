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
}
