<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectura_model extends CI_Model
{
    // Obtener todas las lecturas de la tabla 'lectura'
    public function obtenerLecturas()
    {
        $this->db->select('*');
        $this->db->from('lectura');
        $this->db->order_by('fechaLectura', 'DESC'); // Ordenar por fecha de lectura más reciente
        $query = $this->db->get();
        return $query->result_array(); // Retornar los resultados como un array
    }

    // Insertar una nueva lectura
    public function insertarLectura($dataLectura)
    {
        $this->db->insert('lectura', $dataLectura);
    }

    // Obtener la última lectura registrada de un medidor específico
    public function obtenerUltimaLectura($idMedidor)
    {
        $this->db->select('lecturaActual');
        $this->db->from('lectura');
        $this->db->where('idMedidor', $idMedidor);
        $this->db->order_by('fechaLectura', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->lecturaActual;
        } else {
            return 0; // Si no hay lecturas previas, devolver 0
        }
    }
}
