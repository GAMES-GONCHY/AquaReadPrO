
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Membresia extends CI_Controller
{
	public function recuperarmembresia()
	{
		$idsocio = $this->input->post('id');  // Asegúrate de que este ID es correcto
		$idMembresia = $this->membresia_model->membresia($idsocio);

		$this->session->set_userdata('idMembresia', $idMembresia);

		redirect('geodatalogger/geolocalizar');
	}
}
