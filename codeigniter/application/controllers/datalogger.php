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
	// Guardar marcador en la base de datos
    public function save_marker() 
    {
        $latitud = $this->input->post('latitud');
        $longitud = $this->input->post('longitud');
        $idUsuario = $this->input->post('idUsuario');

        // Lógica para guardar el marcador en la base de datos
        $data = array(
            'latitud' => $latitud,
            'longitud' => $longitud,
            'idUsuario' => $idUsuario
        );

        if ($this->db->insert('datalogger', $data)) 
		{
            $idDatalogger = $this->db->insert_id(); // Obtener el idDatalogger recién creado
            echo json_encode(['status' => 'success', 'idDatalogger' => $idDatalogger]);
        }
        else
        {
            $error = $this->db->error();  // Obtén el error de la base de datos
            log_message('error', 'Error en la inserción de datalogger: ' . json_encode($error));
            echo json_encode(['status' => 'error', 'message' => $error]);
        }
    }

    public function delete_marker() 
    {
        $idDatalogger = $this->input->post('idDatalogger');
        $data['estado']=$this->input->post('estado');
        if (is_null($idDatalogger)) 
        {
            echo json_encode(['status' => 'error', 'message' => 'Datos faltantes']);
            return;
        }
    
        // Eliminar el marcador basado en el idDatalogger
        $this->db->where('idDatalogger', $idDatalogger);
        $this->db->update('datalogger',$data);
    
        if ($this->db->affected_rows() > 0) 
        { // Verifica que se haya afectado al menos una fila
            echo json_encode(['status' => 'success']);
        }
        else 
        {
            $error = $this->db->error();
            log_message('error', 'Error al eliminar datalogger: ' . json_encode($error));
            echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar el marcador.']);
        }
    }
    
    
}
