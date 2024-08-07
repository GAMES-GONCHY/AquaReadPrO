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
		$data['nickname'] = $_POST['nickname'];
		// $data['password']=hash("sha256",$_POST['password1']);
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
	public function modificar()
	{

		$id = $this->input->post('id'); // Si el id viene desde un formulario, debe estar aquí

		// Recuperar datos de la sesión si existen
		$data['info'] = $this->session->userdata('form_data');

		if (empty($data['info'])) {
			$data['info'] = $this->crudusers_model->recuperarusuario($id)->row_array();;
		}

		// Mostrar el mensaje de error si existe
		$mensaje['error'] = $this->session->flashdata('error');

		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		$this->load->view('formmodificaruser1', $data);
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function modificarbd()
	{

		$id = $this->input->post('id');
		// Recuperar el usuario actual para verificar el email

		$usuarioactual = $this->crudusers_model->recuperarusuario($id)->row_array();
		$emailactual = $usuarioactual['email'];
		$nuevoemail = $_POST['email'];



		$data['nickName'] = $_POST['nickname'];
		$data['nombre'] = strtoupper($_POST['nombre']);
		$data['primerApellido'] = strtoupper($_POST['primerapellido']);
		$data['segundoApellido'] = strtoupper($_POST['segundoapellido']);
		//$data['email']=$_POST['email'];
		$data['email'] = $nuevoemail;
		$data['rol'] = $_POST['rol'];
		$data['fono'] = $_POST['fono'];
		$data['sexo'] = $_POST['genero'];

		if ($nuevoemail != $emailactual) {
			if ($this->crudusers_model->comprobaremail($nuevoemail)) {
				$data['idUsuario'] = $id;
				// Si el email ya existe, redirigir con un mensaje de error
				$this->session->set_flashdata('error', 'El E-mail ingresado ya esta en uso!');
				// Guardar datos del usuario para redirigir a la vista de modificar
				$this->session->set_userdata('form_data', $data);
				redirect('crudusers/modificar');
				return;
			}
		}
		$this->crudusers_model->modificar($id, $data);
		redirect('crudusers/habilitados', 'refresh');
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
		$nombrearchivo = $id.".jpg";

		//Ruta donde se guardan los archivos
		$config['upload_path'] = './uploads/usersphoto/';
		//nombre del archivo
		$config['file_name'] = $nombrearchivo;

		$direccion = "./uploads/usersphoto/".$nombrearchivo;

		if (file_exists($direccion)) 
		{
			unlink($direccion);
		}
		$config['allowed_types'] = 'jpg|png|GIF';

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload()) //sino realiza la carga 
		{
			//$data['error'] = $this->upload->display_errors();
			
			$data=array
			(
				'error'=> $this->upload->display_errors()
			);
			
			//echo json_encode($data);
		} 
		else 
		{
			//$data['foto'] = $nombrearchivo;
			$upload_data = $this->upload->data(); // Obtener los datos del archivo subido
			$data=array
			(
				'foto'=> $nombrearchivo,
				
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
	public function cambiarpassword()
	{
		$id = $_POST['id'];
		$data['password'] = hash("sha256", $_POST['password1']);
		$this->crudusers_model->modificar($id, $data);
		redirect('usuario/panel', 'refresh');
	}
}
