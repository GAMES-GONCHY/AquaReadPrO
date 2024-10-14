<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Socio extends CI_Controller
{
    public function pagaraviso()
    {
        $data['avisos'] = $this->avisocobranza_model->avisos_por_estado('enviado');
        $this->load->view('incrustaciones/vistascoloradmin/headsocio');
        $this->load->view('incrustaciones/vistascoloradmin/menusocio');
        $this->load->view('veravisos',$data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footersocios');
    }
    public function get_avisos() 
    {
        // Obtener el estado desde la solicitud AJAX
        $estado = $this->input->post('estado');
    
        // Llamar al modelo para obtener los avisos filtrados por estado
        $avisos = $this->avisocobranza_model->avisos_por_estado($estado);
    
        // Solo cargar el contenido de avisos (dentro de #avisos-container)
        $this->load->view('veravisos_parcial', ['avisos' => $avisos]);
    }
    public function subir()
    {
        $idAviso = $this->input->post('idAviso');
        // Obtener el idUsuario desde la sesión
        $idUsuario = $this->session->userdata('idUsuario');

        // Configuración para la subida del archivo
        $config['upload_path'] = './uploads/comprobantes/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048;  // Tamaño máximo del archivo: 2MB

        // Cargar la librería de subida de archivos
        $this->load->library('upload', $config);

        // Intentar subir el archivo
        if (!$this->upload->do_upload('comprobantePago')) {
            // Si ocurre un error al subir el archivo
            $error = $this->upload->display_errors();
            echo $error;  // Puedes mostrar un mensaje de error personalizado
        } else {
            // Si la subida es exitosa, obtener los datos del archivo
            $data = $this->upload->data();

            // Obtener la extensión del archivo subido
            $extension = $data['file_ext'];

            // Renombrar el archivo con el idUsuario
            $nombreArchivo = $idUsuario . $extension;

            // Ruta completa para renombrar el archivo
            $rutaCompleta = $config['upload_path'] . $nombreArchivo;

            // Renombrar el archivo subido
            rename($data['full_path'], $rutaCompleta);

            // Obtener la fecha y hora actual del servidor (timestamp)
            $fechaPago = date('Y-m-d H:i:s');

            // Preparar los datos para actualizar en la base de datos
            $datosActualizacion = array(
                'comprobante' => $nombreArchivo,  // El nombre del archivo subido
                'fechaPago' => $fechaPago,  // Fecha y hora actual
                'estado' => 'revision'  // Cambiar estado a 'revision'
            );

            // Actualizar la tabla avisocobranza (debes cambiar el criterio de búsqueda por el correcto)
            // Ejemplo: Actualizar para un aviso específico de este usuario (suponiendo que tienes un idAviso o similar)
            // Actualizar la tabla avisocobranza con el idAviso
            $this->db->where('idAviso', $idAviso);  // Usar idAviso como condición
            $this->db->update('avisocobranza', $datosActualizacion);

            // Mensaje de éxito
            echo "Comprobante subido y aviso de cobranza actualizado correctamente.";
        }
    }
}
