<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza extends CI_Controller
{
    public function gestion()
    {
        $data['pendientes'] = $this->avisocobranza_model->avisos_por_estado('pendiente');
        $data['pagados'] = $this->avisocobranza_model->avisos_por_estado('pagado');
        $data['vencidos'] = $this->avisocobranza_model->avisos_por_estado('vencido');
        // Cargar la vista principal con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('gestion_avisos', $data); // Carga la vista con las pestañas (sin datos)
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
}
