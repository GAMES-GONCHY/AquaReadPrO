<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datalogger_model extends CI_Model
{
	public function medidores()
	{
		$this->db->select('idDatalogger, latitud, longitud');
        $query = $this->db->get('datalogger');
        return $query;
	}
	
}
