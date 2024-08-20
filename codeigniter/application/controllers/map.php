
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Map extends CI_Controller
{
	public function geolocalizar()
	{
		$this->load->view('incrustaciones/vistascoloradmin/headmap');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('geomap');
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
}
