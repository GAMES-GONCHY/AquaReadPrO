<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza_model extends CI_Model
{
    // Obtener los avisos por estado
    public function avisos_por_estado($estado)
    {
        $this->db->select('A.*, T.tarifaMinima, T.tarifaVigente, L.lecturaAnterior, L.lecturaActual,
        L.fechaLectura, L2.fechaLectura AS fechaLecturaAnterior, 
        ME.codigoSocio, CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido,"")) AS nombreSocio');
        $this->db->from('avisoCobranza A');
        $this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
        $this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
        $this->db->join('medidor M', 'L.idMedidor = M.idMedidor', 'inner');
        $this->db->join('membresia ME', 'M.idMembresia = ME.idMembresia', 'inner');
        $this->db->join('usuario U', 'U.idUsuario = ME.idUsuario', 'inner');
        $this->db->join('lectura L2', 'L2.idMedidor = L.idMedidor AND L2.fechaLectura < L.fechaLectura', 'left');
        $this->db->where('A.estado', $estado);
        $this->db->group_by('A.idAviso, L.idLectura, T.tarifaMinima, T.tarifaVigente, L.lecturaAnterior, L.lecturaActual, L.fechaLectura, L2.fechaLectura, ME.codigoSocio, U.nombre, U.primerApellido, U.segundoApellido');
        $this->db->order_by('L2.fechaLectura', 'DESC');



        //$this->db->where('rol', $rol);
        $query = $this->db->get();
        return $query->result_array();
    }
    // Método para actualizar el estado del aviso
    public function updateEstado($id, $estado)
    {
        $this->db->where('idAviso', $id); // Filtrar por el ID del aviso
        $data = array('estado' => $estado);
        return $this->db->update('avisocobranza', $data);
    }
}


