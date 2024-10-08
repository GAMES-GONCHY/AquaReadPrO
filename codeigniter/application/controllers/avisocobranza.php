<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza extends CI_Controller
{
    public function gestion()
    {
        $data['pendientes'] = $this->avisocobranza_model->avisos_por_estado('pendiente');
        $data['pagados'] = $this->avisocobranza_model->avisos_por_estado('pagado');
        $data['vencidos'] = $this->avisocobranza_model->avisos_por_estado('vencido');
        // Cargar la vista principal con las pestañas
        $this->load->view('incrustaciones/vistascoloradmin/head');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('gestion_avisos', $data); // Carga la vista con las pestañas (sin datos)
        $this->load->view('incrustaciones/vistascoloradmin/footeravisos');
    }
    public function actualizar_estado() 
    {
        $idAviso = $this->input->post('idAviso'); // Obtener el ID del aviso desde la solicitud AJAX
        $estado = $this->input->post('estado');   // Obtener el nuevo estado desde la solicitud AJAX

        // Validar que los datos necesarios están presentes y que el estado sea correcto
        $estados_validos = ['pendiente', 'pagado'];
        if ($idAviso && in_array($estado, $estados_validos)) 
        {
            // Llamar al modelo para actualizar el estado en la base de datos
            $resultado = $this->avisocobranza_model->actualizarEstado($idAviso, $estado);

            // Verificar si la actualización fue exitosa
            if ($resultado) 
            {
                echo json_encode(['success' => true]); // Respuesta exitosa
            }
            else 
            {
                echo json_encode(['success' => false, 'message' => 'No se pudo actualizar el estado en la base de datos.']);
            }
        }
        else
        {
            echo json_encode(['success' => false, 'message' => 'Datos incompletos o inválidos proporcionados.']);
        }
    }
}
