<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medidor_model extends CI_Model
{
	public function online()
	{
		$this->db->select('*');
		$this->db->from('medidor');
		$this->db->where('estado', 1);
		return $this->db->get();
	}
}
