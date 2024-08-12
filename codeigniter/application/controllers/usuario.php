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
				$this->session->set_userdata('password',$row->password);
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
			if(($this->session->userdata('estado'))==1)
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
				$this->load->view('form_pass_change.php');
			}
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
	public function firstlogin() 
	{
		$id=$this->session->userdata('idUsuario');
		$data['password']=hash("sha256",$_POST['password1']);
		$data['estado']=1;

		
		if($data['password']!=($this->session->userdata('password'))&&$data['password']!=hash("sha256",123))
		{
			$this->crudusers_model->deshabilitar($id,$data);
			$this->session->set_userdata('estado',1);
		}
		
		redirect('usuario/panel','refresh');
	}
	
}
