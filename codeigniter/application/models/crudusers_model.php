<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crudusers_model extends CI_Model
{
	public function habilitados()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado', 1);
		return $this->db->get();
	}
	public function deshabilitados()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado', 0);
		return $this->db->get();
	}
	public function agregar($data)
	{
		$this->db->insert('usuario', $data);
	}
	public function modificar($id, $data)
	{
		$this->db->where('idUsuario', $id);
		$this->db->update('usuario', $data);
	}
	public function eliminar($id)
	{
		$this->db->where('idUsuario', $id);
		$this->db->delete('usuario');
	}
	public function recuperarusuario($id)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('idUsuario', $id);
		return $this->db->get();
	}
	public function deshabilitar($id, $data)
	{
		$this->db->where('idUsuario', $id);
		$this->db->update('usuario', $data);
	}
	public function comprobaremail($email)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('email', $email);
		$query = $this->db->get();

		// Devuelve TRUE si el email ya está en uso, FALSE en caso contrario
		return $query->num_rows() > 0;
	}
}
