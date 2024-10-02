<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifa_model extends CI_Model
{
	public function habilitados() 
    {
        $this->db->select('*');
		$this->db->from('tarifa');
		$this->db->where('estado','vigente');
		return $this->db->get();
    }
    public function deshabilitados() 
    {
        $this->db->select('*');
		$this->db->from('tarifa');
		$this->db->where('estado','vencido');
		return $this->db->get();
    }
    public function agregar($data) 
    {
        // Verificamos que los datos se reciben correctamente
        print_r($data); // Asegúrate de que los datos llegan correctamente aquí
        echo "<br>";

        // Intentar insertar los datos en la tabla tarifa
        $this->db->insert('tarifa', $data);

        // Verificar si se realizó la inserción correctamente
        if ($this->db->affected_rows() > 0) {
            echo "Inserción exitosa";
            return true;
        } else {
            echo "Fallo en la inserción";
            echo $this->db->last_query(); // Imprime la última consulta SQL para depuración
            return false;
        }
    }

    
    public function deshabilitar($id) 
    {
        $data['idAutor']=$this->session->userdata('idUsuario');
		$data['fechaActualizacion']=date('Y-m-d H:i:s');
        $data['estado'] ='vencido';
		$this->db->where('idTarifa', $id);
		$this->db->update('tarifa', $data);
    }
    public function habilitar($id) 
    {
        $data['idAutor']=$this->session->userdata('idUsuario');
		$data['fechaActualizacion']=date('Y-m-d H:i:s');
        $data['estado'] ='vigente';
		$this->db->where('idTarifa', $id);
		$this->db->update('tarifa', $data);
    }
    // public function modificar($id,$data)
	// {
	// 	$data['idAutor']=$this->session->userdata('idUsuario');
	// 	$data['fechaActualizacion']=date('Y-m-d');
        
	// 	$this->db->where('idTarifa', $id);
	// 	$this->db->update('tarifa', $data);
	// }
    public function modificar($id, $data)
    {
        // Añadir la información del autor y la fecha de actualización
        $data['idAutor'] = $this->session->userdata('idUsuario');
        $data['fechaActualizacion'] = date('Y-m-d');
        
        // Actualizar los datos en la tabla 'tarifa'
        $this->db->where('idTarifa', $id);
        $this->db->update('tarifa', $data);
    }

}
