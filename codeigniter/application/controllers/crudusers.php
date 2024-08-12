
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
					$this->session->set_flashdata('mensaje', 'ERROR: El E-mail ya está registrado en el sistema.');
					$this->session->set_flashdata('alert_type', 'error');
				}
				if (isset($consulta['nickName'])) 
				{
					$this->session->set_flashdata('mensaje', 'ERROR: El Nickname ya está registrado en el sistema.');
					$this->session->set_flashdata('alert_type', 'error');
				}
			}
			else 
			{
				$this->session->set_flashdata('mensaje', 'ERROR: El E-mail y Nickname ya están registrados en el sistema.');
				$this->session->set_flashdata('alert_type', 'error');
			}
			redirect('crudusers/agregar');
			
		} 
		else 
		{
			$this->session->set_userdata('flag', false);
			$data['nickname'] = $_POST['nickname'];
			$data['nombre'] = strtoupper($_POST['nombre']);
			$data['primerApellido'] = strtoupper($_POST['primerapellido']);
			$data['segundoApellido'] = strtoupper($_POST['segundoapellido']);
			$data['email'] = $_POST['email'];
			$data['rol'] = $_POST['rol'];
			$data['fono'] = $_POST['fono'];
			$data['sexo'] = $_POST['genero'];

			$this->crudusers_model->agregar($data);

			// Envía el correo
            if ($this->enviaremail($data)) 
			{
				$this->session->set_flashdata('mensaje', 'Usuario registrado exitosamente');
				$this->session->set_flashdata('alert_type', 'success');
            } 
			else 
			{
                $this->session->set_flashdata('mensaje', 'Usuario registrado, sin envío de correo electronico');
				$this->session->set_flashdata('alert_type', 'warning');
            }
			redirect('crudusers/agregar');
			
		}
	}

	private function enviaremail($data)
	{
		// Cargar el autoloader de Composer
		require 'C:/xampp/htdocs/tercerAnio/aquaReadPro/vendor/autoload.php';

		$mail = new PHPMailer(true);
		try {
			//Server settings
			$mail->SMTPDebug = 0;
			$mail->isSMTP();
			$mail->Host       = 'smtp.gmail.com';
			$mail->SMTPAuth   = true;
			$mail->Username   = 'games.gonzalo.883@gmail.com';
			$mail->Password   = 'jsmrkomgwhphyoac';
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
			$mail->Port       = 587;

			//Recipients
			$mail->setFrom('games.gonzalo.883@gmail.com', 'AquaReadPRo');
			$mail->addAddress($data['email']);

			//Content
			$mail->isHTML(true);
			$mail->Subject = 'prueba de envio';
			$body = $this->load->view('emailmessage', $data, TRUE);
			$mail->Body = $body;

			$mail->send();
			return true;
		} 
		catch (Exception $e) 
		{
			log_message('error', "Error al enviar el correo: {$mail->ErrorInfo}");
			return false;
		}
	}
	public function modificar()
	{

		$id = $this->input->post('id');
		$data['info'] = $this->crudusers_model->recuperarusuario($id)->row_array();


		$this->load->view('incrustaciones/vistascoloradmin/head');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
		if ($this->session->userdata('form1') !== null) {
			$this->load->view('formmodificaruser1', $this->session->userdata('form1'));
		} else {
			$this->load->view('formmodificaruser1', $data);
		}
		$this->load->view('incrustaciones/vistascoloradmin/footer');
	}
	public function modificarbd()
	{

		$id = $_POST['id'];

		$newdata['nickname'] = $_POST['nickname'];
		$newdata['email'] = $_POST['email'];

		//verificar el email y nickname
		$consulta = $this->crudusers_model->comprobarmodificacion($newdata, $id);

		if (!empty($consulta)) 
		{
			$data['info'] = $this->crudusers_model->recuperarusuario($id)->row_array();
			$this->session->set_userdata('form1', $data);
			if ((isset($consulta['email']) && isset($consulta['nickName']))) 
			{
				$this->session->set_flashdata('mensaje', 'El E-mail y Nickname ya están registrados en el sistema.');
				$this->session->set_flashdata('alert_type', 'error');
			} else 
			{
				if (isset($consulta['email'])) 
				{
					$this->session->set_flashdata('mensaje', 'El E-mail ya está registrado en el sistema.');
					$this->session->set_flashdata('alert_type', 'error');
				}
				if (isset($consulta['nickName'])) 
				{
					$this->session->set_flashdata('mensaje', 'El Nickname ya está registrado en el sistema.');
					$this->session->set_flashdata('alert_type', 'error');
				}
			}

			redirect('crudusers/modificar', 'refresh');
		} 
		else 
		{
			$data = 
			[
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
			$this->session->set_flashdata('mensaje', 'Registrado modificado exitosamente');
			$this->session->set_flashdata('alert_type', 'success');
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
