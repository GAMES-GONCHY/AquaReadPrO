<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crudusers extends CI_Controller 
{
	public function habilitados()
	{
		$lista=$this->crudusers_model->habilitados();
		$data['usuarios']=$lista;
		$this->load->view('incrustaciones/vistasxeria/head');
		$this->load->view('incrustaciones/vistasxeria/menuadmin');
		$this->load->view('usuarioshabilitados',$data);
		$this->load->view('incrustaciones/vistasxeria/footer');
	}
	public function deshabilitados()
	{
		$lista=$this->crudusers_model->deshabilitados();
		$data['usuarios']=$lista;
		$this->load->view('incrustaciones/vistasxeria/head');
		$this->load->view('incrustaciones/vistasxeria/menuadmin');
		$this->load->view('usuariosdeshabilitados',$data);
		$this->load->view('incrustaciones/vistasxeria/footer');
	}
	public function agregar()
	{
		$this->load->view('incrustaciones/vistasxeria/head');
		$this->load->view('incrustaciones/vistasxeria/menuadmin');
		$this->load->view('formagregaruser');
		$this->load->view('incrustaciones/vistasxeria/footer');
	}
	public function agregarbd()
	{
		$data['nickname']=$_POST['nick'];
		$data['password']=hash("sha256",$_POST['password1']);
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['primerApellido']=strtoupper($_POST['apellido1']);
		$data['segundoApellido']=strtoupper($_POST['apellido2']);
		$data['email']=$_POST['email'];
		$data['rol']=$_POST['rol'];
		$data['fono']=$_POST['fono'];
		$data['sexo']=$_POST['genero'];
		$this->crudusers_model->agregar($data);
		redirect('crudusers/habilitados','refresh');//Aqui se refresca la vista para incluir el registro agregado
	}
	public function modificar()
	{
		$id=$_POST['id'];
		$data['info']=$this->crudusers_model->recuperarusuario($id);

		$this->load->view('incrustaciones/vistasxeria/head');
		$this->load->view('incrustaciones/vistasxeria/menuadmin');
		$this->load->view('formmodificaruser',$data);
		$this->load->view('incrustaciones/vistasxeria/footer');
	}
	public function modificarbd()
	{
		$id=$_POST['id'];
		$data['nickname']=$_POST['nick'];
		$data['nombre']=strtoupper($_POST['nombre']);
		$data['primerApellido']=strtoupper($_POST['apellido1']);
		$data['segundoApellido']=strtoupper($_POST['apellido2']);
		$data['email']=$_POST['email'];
		$data['rol']=$_POST['rol'];
		$data['fono']=$_POST['fono'];
		$data['sexo']=$_POST['genero'];
		
		$this->crudusers_model->modificar($id,$data);
		redirect('crudusers/habilitados','refresh');
	}
	public function eliminarbd()
	{
		$id=$_POST['id'];
		$this->crudusers_model->eliminar($id);
		redirect('crudusers/habilitados','refresh');
	}
	public function deshabilitarbd()
	{
		$id=$_POST['id'];
		$data['estado']=0;
		$this->crudusers_model->deshabilitar($id,$data);
		redirect('crudusers/habilitados','refresh');
	}
	public function habilitarbd()
	{
		$id=$_POST['id'];
		$data['estado']=1;
		$this->crudusers_model->modificar($id,$data);
		redirect('crudusers/deshabilitados','refresh');
	}
	public function login()
	{
		$this->load->view('pagelogin');
	}
	public function subirfoto()
	{
		$data['id']=$_POST['id'];
		$this->load->view('incrustaciones/vistasxeria/head');
		$this->load->view('incrustaciones/vistasxeria/menuadmin');
		$this->load->view('subirform',$data);
		$this->load->view('incrustaciones/vistasxeria/footer');
	}
	public function subir()
	{
		$id=$_POST['id'];
		$nombrearchivo=$id.".jpg";

		//Ruta donde se guardan los archivos
		$config['upload_path']='./uploads/usersphoto';
		//nombre del archivo
		$config['file_name']=$nombrearchivo;

		$direccion=".uploads/usersphoto".$nombrearchivo;
		
		if(file_exists($direccion))
		{
			unlink($direccion);
		}

		$config['allowed_types']='jpg|png';
		$this->load->library('upload',$config);
		

		if(!$this->upload->do_upload())//si realiza la carga 
		{
			$data['error']=$this->upload->display_errors();
		}
		else
		{
			$data['foto']=$nombrearchivo;
			$this->crudusers_model->modificar($id,$data);
			$this->upload->data();
		}
		redirect('crudusers/habilitados','refresh');
	}
}
