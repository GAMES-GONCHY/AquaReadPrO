<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller 
{
	public function index()
	{
		if ($this->session->userdata('nickName')) 
		{
            // Si el usuario ya está logueado, redirige al panel
            redirect('usuario/panel', 'refresh');
        } 
		else 
		{
            // Si no está logueado, muestra la página de login
            $this->load->view('pagelogin2');
        }
	}
	public function validarusuario()
	{
		$nickname=$_POST['nickname'];
		$password=hash("sha256",$_POST['password']);

		$consulta=$this->usuario_model->validar($nickname,$password);
		if($consulta->num_rows()>0)
		{
			//usuario válido
			$row = $consulta->row();
			if($row->estado == 1 || $row->estado == 2)
			{
				$this->session->set_userdata('idUsuario',$row->idUsuario);
				$this->session->set_userdata('nickName',$row->nickName);
				$this->session->set_userdata('rol',$row->rol);
				$this->session->set_userdata('nombre',$row->nombre);
				$this->session->set_userdata('primerApellido',$row->primerApellido);
				$this->session->set_userdata('segundoApellido',$row->segundoApellido);
				$this->session->set_userdata('email',$row->email);
				$this->session->set_userdata('foto',$row->foto);
				$this->session->set_userdata('estado',$row->estado);
				redirect('usuario/panel','refresh');
			}
			else
			{
				// Usuario tiene estado no permitido
				$this->session->set_flashdata('error', 'Tu cuenta no está activa.');
				redirect('usuario/index', 'refresh');
			}
		}
		else
		{
			//usuario incorrecto - > volvemos al login
			$this->session->set_flashdata('error', 'Nickname o contraseña incorrectos');
			redirect('usuario/index','refresh');
		}
	}
	public function panel()
	{
		if($this->session->userdata('nickName'))
		{
			
			$this->load->view('incrustaciones/vistascoloradmin/head');
			
			if(($this->session->userdata('rol'))==2)
			{
				$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
				$this->load->view('paneladmin.php');
			}
			else
			{
				$this->load->view('incrustaciones/vistascoloradmin/menusocio');
				$this->load->view('panelsocio1.php');

			}
			$this->load->view('incrustaciones/vistascoloradmin/footer');
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
