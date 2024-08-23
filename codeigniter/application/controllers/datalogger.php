<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datalogger extends CI_Controller
{
	public function geolocalizar()
	{
		$data['datalogger'] = $this->datalogger_model->medidores()->result_array();
		// Convertir el array a JSON
        $data['coordenadas'] = json_encode($data['datalogger']);
		$this->load->view('incrustaciones/vistascoloradmin/headmap');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('geomap',$data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
}