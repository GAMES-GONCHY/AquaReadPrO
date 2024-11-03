<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medidor extends CI_Controller
{
	public function habilitados()
	{
		$data['medidor'] = $this->medidor_model->habilitados();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('medidoreshabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
    public function deshabilitados()
	{
		$data['medidor'] = $this->medidor_model->deshabilitados();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('medidoresdeshabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footercruduser');
	}
	public function habilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 1;

		$this->medidor_model->modificar($id, $data);
		redirect('medidor/deshabilitados', 'refresh');
	}
	public function deshabilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 0;

		$this->medidor_model->modificar($id, $data);
		redirect('medidor/habilitados', 'refresh');
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
