<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geodatalogger extends CI_Controller
{
	public function geolocalizar()
	{
		$data['info'] = $this->datalogger_model->habilitados()->result_array();
		// Convertir el array a JSON
		$data['info'] = json_encode($data['info']);
		$this->load->view('incrustaciones/vistascoloradmin/headmap');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('geomap', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
    public function agregarmarker() 
    {
        $latitud = $this->input->post('latitud');
        $longitud = $this->input->post('longitud');
        $idAutor = $this->input->post('idAutor');

        // Lógica para guardar el marcador en la base de datos
        $data = array(
            'latitud' => $latitud,
            'longitud' => $longitud,
            'idAutor' => $idAutor
        );
        
        $idDatalogger=$this->datalogger_model->agregar($data);
        if ($idDatalogger)
		{
            echo json_encode(['status' => 'success', 'idDatalogger' => $idDatalogger]);
        }
        else
        {
            $error = $this->db->error();
            log_message('error', 'Error en la inserción de datalogger: ' . json_encode($error));
            echo json_encode(['status' => 'error', 'message' => $error]);
        }
    }

    public function eliminarmarker() 
    {
        $idDatalogger = $this->input->post('idDatalogger');
        $data['estado']=$this->input->post('estado');
        if (is_null($idDatalogger)) 
        {
            echo json_encode(['status' => 'error', 'message' => 'Datos faltantes']);
            return;
        }
        $consulta=$this->datalogger_model->modificar($idDatalogger,$data);
    
        if ($consulta) 
        {
            echo json_encode(['status' => 'success']);
        }
        else 
        {
            $error = $this->db->error();
            log_message('error', 'Error al eliminar datalogger: ' . json_encode($error));
            echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar el marcador.']);
        }
    }
    public function modificarmarker()
    {
        $idDatalogger = $this->input->post('idDatalogger');
        $data['latitud'] = $this->input->post('latitud');
        $data['longitud'] = $this->input->post('longitud');

        // Verifica si los datos necesarios están presentes
        if (is_null($idDatalogger) || is_null($data['latitud']) || is_null($data['longitud'])) 
        {
            echo json_encode(['status' => 'error', 'message' => 'Datos faltantes']);
            return;
        }

        $result=$this->datalogger_model->modificar($idDatalogger,$data);        
        if ($result) 
        {
            echo json_encode(['status' => 'success']);
        } 
        else 
        {
            $error = $this->db->error();
            log_message('error', 'Error al actualizar las coordenadas del datalogger: ' . json_encode($error));
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar las coordenadas']);
        }
    }
    
}
