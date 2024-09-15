<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Geodatalogger extends CI_Controller
{
	public function geolocalizar()
	{
		$data['dataloggers'] = $this->datalogger_model->habilitados()->result_array();
        $data['medidores'] = $this->medidor_model->habilitados()->result_array();

        $idMembresia = $this->session->userdata('idMembresia');
        $data['idMembresia']=$idMembresia;

		 // Convertir datos a JSON
        $data['dataloggers'] = json_encode($data['dataloggers']);
        $data['medidores'] = json_encode($data['medidores']);
        $data['idMembresia'] = json_encode($data['idMembresia']);

		$this->load->view('incrustaciones/vistascoloradmin/headmap');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('geomap');
        $this->load->view('incrustaciones/vistascoloradmin/footer',$data);
        //$this->session->unset_userdata('idMembresia');
	}
    public function visualizar()
	{
		$data['dataloggers'] = $this->datalogger_model->habilitados()->result_array();
        $data['medidores'] = $this->medidor_model->habilitados()->result_array();

        $idMembresia = $this->session->userdata('idMembresia');
        $data['idMembresia']=$idMembresia;

        // Convertir el array a JSON
		$data['dataloggers'] = json_encode($data['dataloggers']);
        $data['medidores'] = json_encode($data['medidores']);
        $data['idMembresia'] = json_encode($data['idMembresia']);

		$this->load->view('incrustaciones/vistascoloradmin/headmap');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('geomapreadonly', $data);
        $this->load->view('incrustaciones/vistascoloradmin/footergeoreadonly');
        
	}
    public function agregardatalogger()
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
        
        $this->session->set_userdata('mensaje', $idDatalogger);
        
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

    public function eliminardatalogger()
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
    public function modificardatalogger()
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
    public function agregarmedidor()
    {
        $latitud = $this->input->post('latitud');
        $longitud = $this->input->post('longitud');
        $idAutor = $this->input->post('idAutor');
        $idDatalogger = $this->input->post('idDatalogger');
        $idMembresia = $this->input->post('idMembresia');

        $data = array(
            'latitud' => $latitud,
            'longitud' => $longitud,
            'idAutor' => $idAutor,
            'idDatalogger' => $idDatalogger,
            'idMembresia' => $idMembresia
        );
        
        $idMedidor=$this->medidor_model->agregar($data);
        if ($idMedidor)
		{
            echo json_encode(['status' => 'success', 'idMedidor' => $idMedidor]);
        }
        else
        {
            $error = $this->db->error();
            log_message('error', 'Error en la inserción del medidor: ' . json_encode($error));
            echo json_encode(['status' => 'error', 'message' => $error]);
        }
    }
    public function eliminarmedidor()
    {
        $idMedidor = $this->input->post('idMedidor');
        $data['estado']=$this->input->post('estado');
        if (is_null($idMedidor)) 
        {
            echo json_encode(['status' => 'error', 'message' => 'Datos faltantes']);
            return;
        }
        $consulta=$this->medidor_model->modificar($idMedidor,$data);
    
        if ($consulta) 
        {
            echo json_encode(['status' => 'success']);
        }
        else 
        {
            $error = $this->db->error();
            log_message('error', 'Error al eliminar medidor: ' . json_encode($error));
            echo json_encode(['status' => 'error', 'message' => 'No se pudo eliminar el marcador.']);
        }
    }
    public function modificarmedidor()
    {
        $idMedidor = $this->input->post('idMedidor');
        $data['latitud'] = $this->input->post('latitud');
        $data['longitud'] = $this->input->post('longitud');

        // Verifica si los datos necesarios están presentes
        if (is_null($idMedidor) || is_null($data['latitud']) || is_null($data['longitud'])) 
        {
            echo json_encode(['status' => 'error', 'message' => 'Datos faltantes']);
            return;
        }

        $result = $this->medidor_model->modificar($idMedidor, $data);        
        if ($result) 
        {
            echo json_encode(['status' => 'success']);
        } 
        else 
        {
            $error = $this->db->error();
            log_message('error', 'Error al actualizar las coordenadas del medidor: ' . json_encode($error));
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar las coordenadas']);
        }
    }

}
