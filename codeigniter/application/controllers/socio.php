<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Socio extends CI_Controller
{
    public function pagaraviso()
    {
        $data['avisos'] = $this->avisocobranza_model->avisos_por_estado('enviado');
        $this->load->view('incrustaciones/vistascoloradmin/headsocio');
        $this->load->view('incrustaciones/vistascoloradmin/menusocio');
        $this->load->view('veravisos',$data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footersocios');
    }
    public function get_avisos() 
    {
        // Obtener el estado desde la solicitud AJAX
        $estado = $this->input->post('estado');
    
        // Llamar al modelo para obtener los avisos filtrados por estado
        $avisos = $this->avisocobranza_model->avisos_por_estado($estado);
    
        // Solo cargar el contenido de avisos (dentro de #avisos-container)
        $this->load->view('veravisos_parcial', ['avisos' => $avisos]);
    }
}
