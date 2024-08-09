<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crudusers extends CI_Controller
{
	public function habilitados()
	{
		$lista = $this->crudusers_model->habilitados();
		$data['usuarios'] = $lista;
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('usuarioshabilitados1', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function deshabilitados()
	{
		$lista = $this->crudusers_model->deshabilitados();
		$data['usuarios'] = $lista;
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('usuariosdeshabilitados1', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function agregar()
	{
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('formagregaruser1');
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function agregarbd()
	{
		$newdata['nickname'] = $_POST['nickname'];
		$newdata['email'] = $_POST['email'];

		$consulta = $this->crudusers_model->comprobarinsercion($newdata);

		if (!empty($consulta)) 
		{
			if (!(isset($consulta['email']) && isset($consulta['nickName']))) 
			{
				if (isset($consulta['email'])) 
				{
					$this->session->set_flashdata('error', 'El E-mail ya está registrado en el sistema.');
				}
				if (isset($consulta['nickName']))
				{
					$this->session->set_flashdata('error', 'El Nickname ya está registrado en el sistema.');
				}
			} 
			else 
			{
				$this->session->set_flashdata('error', 'El E-mail y Nickname ya están registrados en el sistema.');
			}
			
			redirect('crudusers/agregar', 'refresh');
		} 
		else 
		{
			$data['nickname'] = $_POST['nickname'];
			$data['nombre'] = strtoupper($_POST['nombre']);
			$data['primerApellido'] = strtoupper($_POST['primerapellido']);
			$data['segundoApellido'] = strtoupper($_POST['segundoapellido']);
			$data['email'] = $_POST['email'];
			$data['rol'] = $_POST['rol'];
			$data['fono'] = $_POST['fono'];
			$data['sexo'] = $_POST['genero'];

			$this->crudusers_model->agregar($data);


			redirect('crudusers/habilitados', 'refresh'); //Aqui se refresca la vista para incluir el registro agregado
		}
	}

	public function modificar()
	{

		$id = $this->input->post('id');
		$data['info'] = $this->crudusers_model->recuperarusuario($id)->row_array();


		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		if($this->session->userdata('form1')!==null)
		{
			$this->load->view('formmodificaruser1', $this->session->userdata('form1'));
		}
		else
		{
			$this->load->view('formmodificaruser1', $data);
		}
		$this->load->view('incrustaciones/vistascoloradmin/footer');

	}
	public function modificarbd()
	{

		$id = $_POST['id'];
		
		$newdata['nickname'] = $_POST['nickname'];
		$newdata['email'] = $_POST['email'];
	
		
		$consulta = $this->crudusers_model->comprobarmodificacion($newdata, $id);
		
		// Recuperar el usuario actual para verificar el email y nickname
		

		
		if (!empty($consulta)) 
		{
			$data['info']= $this->crudusers_model->recuperarusuario($id)->row_array();
			$this->session->set_userdata('form1', $data);
			if ((isset($consulta['email']) && isset($consulta['nickName']))) 
			{
				$this->session->set_flashdata('error', 'El E-mail y Nickname ya están registrados en el sistema.');
				
			} 
			else 
			{
				if (isset($consulta['email'])) 
				{
					$this->session->set_flashdata('error', 'El E-mail ya está registrado en el sistema.');
				}
				if (isset($consulta['nickName'])) 
				{
					$this->session->set_flashdata('error', 'El Nickname ya está registrado en el sistema.');
				}
			}

			redirect('crudusers/modificar', 'refresh');
		} 
		else 
		{
			$data = [
				'nickName' => $_POST['nickname'],
				'nombre' => strtoupper($_POST['nombre']),
				'primerApellido' => strtoupper($_POST['primerapellido']),
				'segundoApellido' => strtoupper($_POST['segundoapellido']),
				'email' => $_POST['email'],
				'rol' => (int)$_POST['rol'],
				'fono' => $_POST['fono'],
				'sexo' => $_POST['genero']
			];
	
			$this->crudusers_model->modificar($id, $data);
			redirect('crudusers/habilitados', 'refresh');
		}
	}
	public function eliminarbd()
	{
		$id = $_POST['id'];
		$this->crudusers_model->eliminar($id);
		redirect('crudusers/habilitados', 'refresh');
	}
	public function deshabilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 0;
		$this->crudusers_model->deshabilitar($id, $data);
		redirect('crudusers/habilitados', 'refresh');
	}
	public function habilitarbd()
	{
		$id = $_POST['id'];
		$data['estado'] = 1;
		$this->crudusers_model->modificar($id, $data);
		redirect('crudusers/deshabilitados', 'refresh');
	}
	public function login()
	{
		$this->load->view('pagelogin');
	}
	public function subirfoto()
	{
		$data['id'] = $_POST['id'];
		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('formsubir', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function subir()
	{
		$id = $_POST['id'];
		$nombrearchivo = $id . ".jpg";

		//Ruta donde se guardan los archivos
		$config['upload_path'] = './uploads/usersphoto/';
		//nombre del archivo
		$config['file_name'] = $nombrearchivo;

		$direccion = "./uploads/usersphoto/" . $nombrearchivo;

		if (file_exists($direccion)) {
			unlink($direccion);
		}
		$config['allowed_types'] = 'jpg|png|GIF';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) //sino realiza la carga 
		{
			//$data['error'] = $this->upload->display_errors();

			$data = array(
				'error' => $this->upload->display_errors()
			);

			//echo json_encode($data);
		} else {
			//$data['foto'] = $nombrearchivo;
			$upload_data = $this->upload->data(); // Obtener los datos del archivo subido
			$data = array(
				'foto' => $nombrearchivo,

				'file_name' => $upload_data['file_name'],
				'file_size' => $upload_data['file_size']
			);
			//$this->crudusers_model->modificar($id, $data['foto']);
			$this->crudusers_model->modificar($id, array('foto' => $nombrearchivo));
			//$this->upload->data();

			//echo json_encode($data);

		}
		redirect('crudusers/habilitados', 'refresh');
	}
	// public function cambiarpassword()
	// {
	// 	$id = $_POST['id'];
	// 	$data['password'] = hash("sha256", $_POST['password1']);
	// 	$this->crudusers_model->modificar($id, $data);
	// 	redirect('usuario/panel', 'refresh');
	// }
}
