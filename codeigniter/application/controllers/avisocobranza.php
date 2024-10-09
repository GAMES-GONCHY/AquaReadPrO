<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza extends CI_Controller
{
    public function gestion()
    {
        // Obtener los avisos por estado
        $data['pendientes'] = $this->avisocobranza_model->avisos_por_estado('pendiente');
        $data['pagados'] = $this->avisocobranza_model->avisos_por_estado('pagado');
        $data['vencidos'] = $this->avisocobranza_model->avisos_por_estado('vencido');

        // Cargar las vistas con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('gestion_avisos', $data); // Carga la vista con las pestañas y datos
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }

    public function updateAvisoEstado()
    {
        $idAviso = $this->input->post('id');
        $nuevoEstado = $this->input->post('estado');

        // Verifica que se hayan recibido correctamente los parámetros
        if ($idAviso && $nuevoEstado) {
            // Llama al método del modelo para actualizar el estado del aviso
            $resultado = $this->avisocobranza_model->updateEstado($idAviso, $nuevoEstado);

            if ($resultado) {
                echo json_encode(['success' => true]);
            } else {
                log_message('error', 'No se pudo actualizar el estado del aviso con ID: ' . $idAviso);
                echo json_encode(['success' => false, 'message' => 'No se pudo actualizar el estado.']);
            }
        } else {
            log_message('error', 'Datos inválidos recibidos: ID Aviso = ' . $idAviso . ', Estado = ' . $nuevoEstado);
            echo json_encode(['success' => false, 'message' => 'Datos inválidos.']);
        }
    }

    public function getAvisosPorEstado()
    {
        $estado = $this->input->get('estado');

        // Verifica si se recibió el estado
        if (!$estado) 
        {
            log_message('error', 'No se recibió el estado en la solicitud AJAX.');
            show_error('Estado no proporcionado', 500);
            return;
        }
        try 
        {
            $data['avisos'] = $this->avisocobranza_model->avisos_por_estado($estado);
            $this->load->view('partials/avisos_table', $data); // Asegúrate de que esta vista exista
        }
        catch (Exception $e) 
        {
            log_message('error', 'Error al cargar los avisos por estado: ' . $e->getMessage());
            show_error('Error al cargar los avisos por estado', 500);
        }
    }
}
