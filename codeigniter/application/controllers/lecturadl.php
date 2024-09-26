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
            //log_message('debug', 'No hay lecturas existentes, intentando recuperar IP de los dataloggers.');
            $data['lecturas'] = $this->recuperarIp();
        }
        else
        {
            //log_message('debug', 'Lecturas existentes encontradas: ' . json_encode($lecturasExistentes));
            $data['lecturas'] = $lecturasExistentes;
        }
        //Verifica si hay lecturas
        // if (!empty($data['lecturas'])) {  
        //     echo json_encode(['status' => 'success', 1]); 
        // } else {
        //     log_message('error', 'No se encontraron lecturas en la recuperación.');
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
        // if (!empty($ipDataloggers))
        // {
        //     log_message('debug', ' ips de Dataloggers encontrados: ' . json_encode($ipDataloggers));
        // }
        // else
        // {
        //     log_message('debug', ' no se encontraron ips de dataloggers: ');
        // }


        if (!empty($ipDataloggers))
        {
            //log_message('debug', 'Dataloggers encontrados: ' . json_encode($ipDataloggers));
            $lecturas = $this->actualizaryregistrar($ipDataloggers);

            // if (!empty($lecturas)) {
            //     log_message('debug', 'Lecturas recuperadas exitosamente: ' . json_encode($lecturas));
            // } else {
            //     log_message('error', 'No se encontraron lecturas después de recuperar IP de los dataloggers.');
            // }
            return $lecturas;
        } 
        else 
        {
            log_message('error', 'No se encontraron dataloggers activos.');
            // Si no hay dataloggers disponibles, retornar una tabla vacía
            return [];
        }
    }

    public function actualizaryregistrar($ipDataloggers) 
    {
        $lecturas = [];
        $lecturasfallidas = [];
        foreach ($ipDataloggers as $datalogger) 
        {
            $ip = $datalogger['IP'];
            $puerto = $datalogger['puerto'];
            $codigoMedidor = $datalogger['codigoMedidor'];
            $idMedidor = $datalogger['idMedidor'];
            $idDatalogger = $datalogger['idDatalogger'];
            $lecturaAnterior = $this->obtenerLecturaAnterior($idMedidor);
            // $codigoDatalogger = $datalogger['codigoDatalogger'];
            // $socio = $datalogger['nombreCompleto'];
            // $codigoSocio['idMembresia'];

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

                // Insertar la lectura en la tabla 'lectura'
                $dataLectura = [
                    'lecturaAnterior' => $lecturaAnterior,
                    'lecturaActual' => ($pulsos+97),
                    'idMedidor' => $idMedidor
                ];

                $this->lectura_model->insertarLectura($dataLectura); // Insertar la lectura en la base de datos

                // Insertar en la tabla temporal
                //$this->lectura_model->insertarLecturaTemporal($dataLectura);

                // Almacenar la lectura actual
                $lecturas[] = [
                    'lecturaAnterior' => $lecturaAnterior,
                    'lecturaActual' => ($pulsos+97),
                    'fechaLectura' => date('Y-m-d H:i:s'),
                    'idMedidor' => $idMedidor
                    // 'codigoMedidor' => $codigoMedidor,
                    // 'codigoDatalogger' => $codigoDatalogger,
                    // 'idMembresia' => $codigoSocio,
                    // 'nombreCompleto' => $socio
                ];

                // Cerrar conexión
                $connection->close();
            }
            catch (Exception $e) 
            {
                log_message('error', 'Error al leer los datos del datalogger ' . $ip . ': ' . $e->getMessage());
                $lecturasfallidas[] = [
                    'IP' => $ip,
                    'puerto' => $puerto,
                    'idMedidor' => $idMedidor,
                    'codigoMedidor' => $codigoMedidor,
                    'idDatalogger' => $idDatalogger
                ];
            }
        }

        if (!empty($lecturasfallidas)) 
        {
            $this->session->set_userdata('lecturasfallidas', $lecturasfallidas);
        }
        return $lecturas;
    }
    public function deshabilitados() 
    {   
        $data['lecdeshabilitados'] = $this->lectura_model->deshabilitados();

        // Cargar las vistas
        $this->load->view('incrustaciones/vistascoloradmin/headmap');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasdeshabilitadas', $data); // Mostrar las lecturas
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
    }
    // Función auxiliar para obtener la última lectura registrada de un medidor
    public function obtenerLecturaAnterior($idMedidor)
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
    public function mostrarlecturasfallidas()
    {
        $data['fallidas'] = $this->session->userdata('lecturasfallidas')?? [];
        // Cargar las vistas
        $this->load->view('incrustaciones/vistascoloradmin/headmap');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasfallidas', $data); // Mostrar las lecturas
        $this->load->view('incrustaciones/vistascoloradmin/footerlecturas');
    }
}
