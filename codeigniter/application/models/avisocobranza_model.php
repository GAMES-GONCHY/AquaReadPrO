<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza_model extends CI_Model
{
    // Obtener los avisos por estado
    public function avisos_por_estado($estado)
    {
        $this->db->select('A.*, M.codigoSocio, CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido,"")) AS nombreSocio');
        $this->db->from('avisocobranza A');
        $this->db->join('membresia M', 'M.idMembresia = A.idMembresia', 'inner');
        $this->db->join('usuario U', 'U.idUsuario = M.idUsuario', 'inner');
        $this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
        $this->db->where('A.estado', $estado);
        //$this->db->where('rol', $rol);
        $query = $this->db->get();
        return $query->result_array();
    }
}


