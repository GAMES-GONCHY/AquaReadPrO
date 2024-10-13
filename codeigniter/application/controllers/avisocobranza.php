<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza extends CI_Controller
{
    public function gestion()
    {
        //GENERACION DE AVISOS MEDIANTE EL PROCEDIMIENTO (DESACTIVADO)
        //$this->avisocobranza_model->generar_avisos();
        // Obtener los avisos por estado
        $data['pendientes'] = $this->avisocobranza_model->avisos_por_estado('pendiente');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('gestion_avisos', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function pagados()
    {
        // Obtener los avisos por estado
        
        $data['pagados'] = $this->avisocobranza_model->avisos_por_estado('pagado');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisospagados', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function vencidos()
    {
        // Obtener los avisos por estado
        $data['vencidos'] = $this->avisocobranza_model->avisos_por_estado('vencido');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('avisosvencidos', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function aprobarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = $_POST['estado'];
        $tab = $_POST['tab'];
		$this->avisocobranza_model->modificar($id, $data);
        redirect('avisocobranza/' . $tab);
		
	}
    public function reprobarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = $_POST['estado'];
        
		$this->avisocobranza_model->modificar($id, $data);
        redirect('avisocobranza/pagados');
    }
    public function deshabilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 0;
		$rol=$_POST['rol'];
		$this->crudusers_model->deshabilitar($id, $data);
		redirect('crudusers/habilitados/'.$rol);
	}
	public function habilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 1;

		$rol=$_POST['rol'];

		$this->crudusers_model->modificar($id, $data);
		redirect('crudusers/deshabilitados/' . $rol);
	}
}
