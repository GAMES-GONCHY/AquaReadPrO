
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Membresia extends CI_Controller
{
	public function recuperarmembresia()
	{
		$idsocio = $this->input->post('id');  // Asegúrate de que este ID es correcto
		$idMembresia = $this->membresia_model->membresia($idsocio);

		$this->session->set_userdata('idMembresia', $idMembresia);
		$idDatalogger;
		if($this->datalogger_model->contardl()<1)
		{
			$idDatalogger = 1;
		}
		else
		{
			if($this->datalogger_model->recuperaridmax()->row()>0)
			{
				$idDatalogger=$this->datalogger_model->recuperaridmax()->row()->idDatalogger;
			}
		}
		// $idDatalogger=$this->datalogger_model->recuperaridmax()->row()->idDatalogger;
		$this->session->set_userdata('idDatalogger', $idDatalogger);
		redirect('geodatalogger/geolocalizar');
	}
}
