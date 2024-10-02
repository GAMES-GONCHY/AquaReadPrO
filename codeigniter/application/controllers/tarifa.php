<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifa extends CI_Controller 
{
	public function habilitados()
	{
		$lista=$this->tarifa_model->habilitados();
		$data['tarifas']=$lista;

		$this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('tarifashabilitadas', $data); // Mostrar las lecturas fallidas
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
		
	}
	public function deshabilitados()
	{
		$lista=$this->tarifa_model->deshabilitados();
		$data['tarifas']=$lista;

		$this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('tarifasdeshabilitadas', $data); // Mostrar las lecturas fallidas
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
		
	}
	public function agregar()
	{
		$data['tarifaMinima'] = $_POST['tarifaMinima1'];
		$data['tarifaVigente'] = $_POST['tarifaVigente1'];
		$data['fechaInicioVigencia'] = $_POST['fechaInicioVigencia1'];

		$this->tarifa_model->agregar($data);
		redirect('tarifa/habilitados');

	}

	public function deshabilitar()
	{
		$id = $this->input->post('id');
		$this->tarifa_model->deshabilitar($id);
		redirect('tarifa/habilitados');
	}
	public function habilitar()
	{
		$id = $this->input->post('id');
		$this->tarifa_model->habilitar($id);
		redirect('tarifa/deshabilitados');
	}
	// public function modificar()
	// {
	// 	$id = $_POST['id'];
	// 	$data['tarifaMinima'] = $_POST['tarifaMinima'];
	// 	$data['tarifaVigente'] = $_POST['tarifaVigente'];
	// 	$data['fechaInicioVigencia'] = $_POST['fechaInicioVigencia'];
	// 	$this->tarifa_model->modificar($id,$data);
	// 	redirect('tarifa/habilitados');
	// }
	public function modificar()
	{
		// Recibir los datos del formulario
		$id = $_POST['idTarifa'];
		$data['tarifaMinima'] = $_POST['tarifaMinima'];
		$data['tarifaVigente'] = $_POST['tarifaVigente'];
		$data['fechaInicioVigencia'] = $_POST['fechaInicioVigencia'];


		// Llamar al modelo para modificar los datos

		if($this->tarifa_model->modificar($id, $data))
		{
			echo "modificado correctamente";
		}
		else
		{
			echo "modificado error";
		}

		// Redirigir después de modificar
		redirect('tarifa/habilitados');
	}


}
