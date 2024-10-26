<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Socio extends CI_Controller
{
    public function pagaraviso()
    {
        $idUsuario = $this->session->userdata('idUsuario');
        $data['avisos'] = $this->avisocobranza_model->avisos_por_estado_id('enviado',$idUsuario);
        $this->load->view('incrustaciones/vistascoloradmin/headsocio');
        $this->load->view('incrustaciones/vistascoloradmin/menusocio');
        $this->load->view('veravisos',$data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footersocios');
    }
    public function get_avisos() 
    {
        // Obtener el estado desde la solicitud AJAX
        $estado = (array) $this->input->post('estado');
        if($estado[0]=='enviado')
        {
            $estado[] = 'rechazado';
            $estado[] = 'vencido';
        }
        $idUsuario = $this->session->userdata('idUsuario');
        // Llamar al modelo para obtener los avisos filtrados por estado
        $avisos = $this->avisocobranza_model->avisos_por_estado_id($estado,$idUsuario);
    
        // Solo cargar el contenido de avisos (dentro de #avisos-container)
        $this->load->view('veravisos_parcial', ['avisos' => $avisos]);
    }
    public function subir() 
    {
        // Obtener el mes, año, codigoSocio y idAviso desde el formulario
        $mes = $this->input->post('mes');
        $anio = $this->input->post('anio');
        $codigoSocio = $this->input->post('codigoSocio');
        //quitar los espacios en blanco al inicio y al final
        $codigoSocio = trim($codigoSocio);

        $idAviso = $this->input->post('idAviso');

        //Configuración de la ruta base para el socio
        $rutaSocio = './uploads/comprobantes/' . $codigoSocio;

        //Verificar si la carpeta del socio existe, si no, crearla
        if (!file_exists($rutaSocio)) 
        {
            mkdir($rutaSocio, 0777, true);  // Crear la carpeta con permisos 0755
        }
        

        //Configuración para la subida del archivo
        $config['upload_path'] = $rutaSocio;
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048;  // Tamaño máximo del archivo: 2MB

        // Cargar la librería de subida de archivos con la configuración
        $this->load->library('upload', $config);

        // Intentar subir el archivo
        if (!$this->upload->do_upload('comprobantePago')) 
        {
            // Si ocurre un error al subir el archivo
            $error = $this->upload->display_errors();
            echo $error;  // Puedes mostrar un mensaje de error personalizado
        }
        else 
        {
            // Si la subida es exitosa, obtener los datos del archivo
            $data = $this->upload->data();

            // Obtener la extensión del archivo subido
            $extension = $data['file_ext'];

            // Renombrar el archivo usando el mes y año
            $nombreArchivo = $mes . '_' . $anio . $extension;

            // Ruta completa para el archivo renombrado
            $rutaCompleta = $rutaSocio . '/' . $nombreArchivo;

            // Renombrar el archivo subido
            rename($data['full_path'], $rutaCompleta);

            // Obtener la fecha y hora actual del servidor
            
            // Preparar los datos para la actualización de la base de datos
            $datosActualizacion = array(
                'comprobante' => $nombreArchivo  // Guardar el nombre del archivo subido
            );

             // Actualizar en la base de datos
            $actualizacion = $this->avisocobranza_model->sociopagaraviso($idAviso, $datosActualizacion);

            // Verificar si la actualización fue exitosa
            if ($actualizacion) 
            {
                // Redirigir a la ruta socio/pagaraviso si fue exitoso
                redirect('socio/pagaraviso');
            }
            else
            {
                // Manejo de errores si la actualización falla
                echo "Error al actualizar la base de datos.";
            }
        }
    }
    
}
