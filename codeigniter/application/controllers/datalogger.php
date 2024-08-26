<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datalogger extends CI_Controller
{
	public function geolocalizar()
	{
		$data['info'] = $this->datalogger_model->dataloggers()->result_array();
		// Convertir el array a JSON
		$data['info'] = json_encode($data['info']);
		$this->load->view('incrustaciones/vistascoloradmin/headmap');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('geomap', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function habilitados()
	{
		$data['dataloggers'] = $this->datalogger_model->dataloggers();

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('dataloggershabilitados', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function deshabilitados()
	{
		$data['dataloggers'] = $this->datalogger_model->deshabilitados();

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

		$this->datalogger_model->deshabilitar($id, $data);
		redirect('datalogger/habilitados', 'refresh');
	}
	// public function agregar()
	// {
	// 	$this->load->view('incrustaciones/vistascoloradmin/head');
	// 	$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
	// 	$this->load->view('formagregardatalogger');
	// 	$this->load->view('incrustaciones/vistascoloradmin/footer');
	// }
	public function agregarbd()
	{
		$data['latitud'] = $_POST['latitud'];
		$data['longitud'] = $_POST['longitud'];
		$data['idAutor']=$this->session->userdata('idUsuario');
		$data['idUsuario'] = $_POST['codsocio'];

		$this->datalogger_model->agregar($data);
		redirect('datalogger/agregar');
	}
	public function agregar()
	{
		// Verifica si la solicitud es AJAX
        if ($this->input->is_ajax_request()) 
		{
            // Recibe las coordenadas del marcador desde la solicitud POST
            $lat = $this->input->post('latitude');
            $lng = $this->input->post('longitude');

            // Verifica que los datos no sean nulos
            if ($lat !== null && $lng !== null) 
			{
                // Lógica para guardar los datos en la base de datos
                $data = array(
                    'latitud' => $lat,
                    'longitud' => $lng
                );
				$consulta=$this->datalogger_model->agregar($data);
                if ($consulta) 
				{
                    // Responder con éxito
                    echo json_encode(['status' => 'success']);

					$this->session->set_flashdata('mensaje', 'datalogger insertado correctamente');
					$this->session->set_flashdata('alert_type', 'success');
                } 
				else 
				{
                    // Responder con error
                    echo json_encode(['status' => 'error', 'message' => 'Error al insertar en la base de datos.']);
					
					$this->session->set_flashdata('mensaje', 'El E-mail ya está registrado en el sistema.');
					$this->session->set_flashdata('alert_type', 'error');
                }
            } 
			else 
			{
                // Responder con error si los datos están incompletos
                echo json_encode(['status' => 'error', 'message' => 'Datos incompletos.']);
            }
        } 
		else 
		{
            // Si no es una solicitud AJAX, se redirige a la página principal o se muestra un error
            show_error('Acceso no permitido', 403);
        }
	}
}
