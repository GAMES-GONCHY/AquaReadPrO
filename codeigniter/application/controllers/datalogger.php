<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datalogger extends CI_Controller
{
	public function habilitados()
	{
		$data['datalogger'] = $this->datalogger_model->habilitados();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('dataloggershabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
    public function deshabilitados()
	{
		$data['datalogger'] = $this->datalogger_model->deshabilitados();

		$this->medidor_model->deshabilitados();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('dataloggersdeshabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function habilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 1;

		$this->datalogger_model->modificar($id, $data);
		redirect('datalogger/deshabilitados', 'refresh');
	}
	public function deshabilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 0;

		$this->datalogger_model->modificar($id, $data);
		redirect('datalogger/habilitados', 'refresh');
	}
	// public function agregar()
	// {
	// 	$this->load->view('incrustaciones/vistascoloradmin/head');
	// 	$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
	// 	$this->load->view('formagregardatalogger');
	// 	$this->load->view('incrustaciones/vistascoloradmin/footer');
	// }
	// public function agregarbd()
	// {
	// 	$data['latitud'] = $_POST['latitud'];
	// 	$data['longitud'] = $_POST['longitud'];
	// 	$data['idAutor']=$this->session->userdata('idUsuario');
	// 	$data['idUsuario'] = $_POST['codsocio'];

	// 	$lastId=$this->datalogger_model->agregar($data);

	// 	redirect('datalogger/agregar');
	// }
	
}
