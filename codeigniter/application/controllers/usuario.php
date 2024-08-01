<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller 
{
	public function index()
	{
		$this->load->view('pagelogin');
	}
	public function validarusuario()
	{
		$nickname=$_POST['nickname'];
		$password=hash("sha256",$_POST['password']);

		$consulta=$this->usuario_model->validar($nickname,$password);
		if($consulta->num_rows()>0)
		{
			//usuario válido
			
			foreach($consulta->result() as $row)
			{
				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('nickName',$row->nickName);
				$this->session->set_userdata('rol',$row->rol);
				$this->session->set_userdata('nombre',$row->nombre);
				$this->session->set_userdata('primerApellido',$row->primerApellido);
				$this->session->set_userdata('segundoApellido',$row->segundoApellido);
				$this->session->set_userdata('email',$row->email);
				redirect('usuario/panel','refresh');
			}
		}
		else
		{
			//usuario incorrecto - > volvemos al login
			redirect('usuario/index','refresh');
		}
	}
	public function panel()
	{
		if($this->session->userdata('nickName'))
		{
			
			$this->load->view('incrustaciones/vistasxeria/head');
			
			if(($this->session->userdata('rol'))=='Administrador')
			{
				$this->load->view('incrustaciones/vistasxeria/menuadmin');
				$this->load->view('paneladmin.php');
			}
			else
			{
				$this->load->view('incrustaciones/vistasxeria/menusocio');
				$this->load->view('panelsocio.php');
			}
			$this->load->view('incrustaciones/vistasxeria/footer');
		}
		else
		{
			redirect('usuario/index','refresh');
		}
	}
	public function logout() 
	{
        // Destruye la sesión
        $this->session->sess_destroy();

        // Redirige a la página de inicio de sesión
        redirect('usuario/index','refresh');
    }
	
}
