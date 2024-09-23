<?php
defined('BASEPATH') or exit('No direct script access allowed');

use ModbusTcpClient\Network\BinaryStreamConnection;
use ModbusTcpClient\Packet\ModbusFunction\ReadHoldingRegistersRequest;

class Lecturadl extends CI_Controller 
{
    public function mostrarlectura() 
    {   
        //$data['lecturas'] = $this->recuperarIp(); // Realiza la lectura de los dataloggers

        $lecturasExistentes = $this->lectura_model->obtenerLecturas();
        
        if(empty($lecturasExistentes))
        {
            $data['lecturas'] = $this->recuperarIp();
        }
        else
        {
            $data['lecturas'] = $lecturasExistentes;
        }
        // Verifica si hay lecturas
        // if (!empty($data['lecturas'])) {  
        //     echo json_encode(['status' => 'success', 1]); 
        // } else {
        //     echo json_encode(['status' => 'error', 'message' => 0]);
        // }


        // Cargar las vistas
        $this->load->view('incrustaciones/vistascoloradmin/headmap');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasactuales', $data); // Mostrar las lecturas
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
    }
    public function recuperarIp()
    {
        // Obtener los dataloggers activos y conectados
        $ipDataloggers = $this->datalogger_model->obtenerip();
        
        if (!empty($ipDataloggers))
        {
            $lecturas = $this->lecturarmedidor($ipDataloggers);
            return $lecturas;
        } 
        else 
        {
            // Si no hay dataloggers disponibles, retornar una tabla vacía
            return [];
        }
    }

    public function lecturarmedidor($ipDataloggers) 
    {
        $lecturas = [];

        foreach ($ipDataloggers as $datalogger) 
        {
            $ip = $datalogger['IP'];
            $puerto = $datalogger['puerto'];
            $codigoMedidor = $datalogger['codigoMedidor'];
            $idMedidor = $datalogger['idMedidor'];

            // Crear conexión TCP con el datalogger
            $connection = BinaryStreamConnection::getBuilder()
                ->setHost($ip)
                ->setPort(502)
                ->setConnectTimeoutSec(2)
                ->build();

            try 
            {
                // Conectar al datalogger
                $connection->connect();

                // Leer el registro del puerto
                $request = new ReadHoldingRegistersRequest($puerto, 1);
                $response = $connection->sendAndReceive($request);

                // Decodificar la respuesta
                $pulsos = unpack('n', substr($response, 9, 2))[1];

                // Almacenar la lectura actual
                $lecturas[] = [
                    'ip' => $ip,
                    'puerto' => $puerto,
                    'codigoMedidor' => $codigoMedidor,
                    'pulsos' => $pulsos
                ];

                // Insertar la lectura en la tabla 'lectura'
                $dataLectura = [
                    'lecturaAnterior' => $this->obtenerLecturaAnterior($idMedidor),
                    'lecturaActual' => ($pulsos+97),
                    'idMedidor' => $idMedidor
                ];

                $this->lectura_model->insertarLectura($dataLectura); // Insertar la lectura en la base de datos
                

                // Cerrar conexión
                $connection->close();
            }
            catch (Exception $e) 
            {
                log_message('error', 'Error al leer los datos del datalogger ' . $ip . ': ' . $e->getMessage());
            }
        }

        return $lecturas;
    }

    // Función auxiliar para obtener la última lectura registrada de un medidor
    private function obtenerLecturaAnterior($idMedidor)
    {
        return $this->lectura_model->obtenerUltimaLectura($idMedidor);
    }
    public function realizarlectura() 
    {
        $data['lecturas'] = $this->recuperarIp(); // Realiza la lectura de los dataloggers

        // Verifica si hay lecturas
        // if (!empty($data['lecturas'])) {  
        //     echo json_encode(['status' => 'success', 'message' => 'Lectura realizada correctamente.']); 
        // } else {
        //     echo json_encode(['status' => 'error', 'message' => 'No se encontraron lecturas.']);
        // }
        redirect('lecturadl/mostrarlectura');
    }
}
