<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medidor extends CI_Controller 
{
	public function online()
	{
		$lista = $this->medidor_model->online();
		$data['medidores'] = $lista;
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('medidoresonline', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
}
