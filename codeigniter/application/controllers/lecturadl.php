
<?php
defined('BASEPATH') or exit('No direct script access allowed');

use ModbusTcpClient\Network\BinaryStreamConnection;
use ModbusTcpClient\Packet\ModbusFunction\ReadHoldingRegistersRequest;

class Lecturadl extends CI_Controller 
{
    public function mostrarlectura() 
    {
        $data['lectura'] = $this->recuperarIp();
        $this->load->view('incrustaciones/vistascoloradmin/headmap');
		$this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('lecturasactuales', $data);
        $this->load->view('incrustaciones/vistascoloradmin/footer');
    }
    public function recuperarIp()
    {
        $ipDataloggers=$this->datalogger_model->obtenerip();
        
        if(!empty($ipDataloggers))
        {
            $lecturas = $this->lecturarmedidor($ipDataloggers);
            return $lecturas;
        }
        else
        {
            //manejar logica para cuando no haya ningun datalogger conectado
            return [];
        }
        
    }
    // public function lecturarmedidor($ipDataloggers) 
    // {
    //     $lecturas = [];

    //     // Iterar sobre cada datalogger (IPs y puertos)
    //     foreach ($ipDataloggers as $datalogger) 
    //     {
    //         // Extraer la IP y el puerto del datalogger
    //         $ip = $datalogger['IP'];
    //         $puerto = $datalogger['puerto']; // Ahora este es el número de registro Modbus que vamos a leer
    //         $codigoMedidor = $datalogger['codigoMedidor'];

    //         // Crear una conexión TCP para este datalogger
    //         $connection = BinaryStreamConnection::getBuilder()
    //             ->setHost($ip)          // Establecer la IP del datalogger
    //             ->setPort(502)          // El puerto TCP estándar de Modbus sigue siendo 502
    //             ->setConnectTimeoutSec(5) // Establecer tiempo de espera
    //             ->build();
    //         try 
    //         {
    //             // Conectar al datalogger
    //             $connection->connect();

    //             // Crear una solicitud para leer el registro equivalente al puerto (que es el número de registro Modbus)
    //             $request = new ReadHoldingRegistersRequest($puerto, 1); // Leer 1 registro (puerto equivale al número de registro Modbus)

    //             // Enviar la solicitud y recibir la respuesta
    //             $response = $connection->sendAndReceive($request);

    //             // Procesar la respuesta (decodificar el valor)
    //             $pulsos = unpack('n', substr($response, 9, 2))[1]; // Extraer 2 bytes de la respuesta

    //             // Almacenar la lectura
    //             $lecturas[] = [
    //                 'ip' => $ip,
    //                 'codigoMedidor' => $codigoMedidor,
    //                 'puerto' => $puerto,  // El puerto que fue leído (equivalente al registro Modbus)
    //                 'pulsos' => $pulsos   // La lectura del registro
    //             ];

    //             // Desconectar después de leer el registro
    //             $connection->close();
    //         }
    //         catch (Exception $e) 
    //         {
    //             // Manejar errores al leer los datos del datalogger
    //             echo "Error al leer los datos del datalogger " . $ip . ": " . $e->getMessage();
    //         }
    //     }

    //     if (!empty($lecturas)) 
    //     {
    //         return $lecturas;
    //     } 
    //     else 
    //     {
    //         $this->session->set_flashdata('mensaje', 'Error No hay Dataloggers conectados');
	// 		$this->session->set_flashdata('alert_type', 'error');
    //         return [];
    //     }
    // }
    public function lecturarmedidor($ipDataloggers) 
    {
        $lecturas = [];

        // Iterar sobre cada datalogger (IPs y puertos)
        foreach ($ipDataloggers as $datalogger) 
        {
            // Extraer la IP y el puerto del datalogger
            $ip = $datalogger['IP'];
            $puerto = $datalogger['puerto']; // Ahora este es el número de registro Modbus que vamos a leer
            $codigoMedidor = $datalogger['codigoMedidor'];
            // Crear una conexión TCP para este datalogger
            $connection = BinaryStreamConnection::getBuilder()
                ->setHost($ip)          // Establecer la IP del datalogger
                ->setPort(502)          // El puerto TCP estándar de Modbus sigue siendo 502
                ->setConnectTimeoutSec(2) // Establecer tiempo de espera
                ->build();

                try 
                {
                    // Conectar al datalogger
                    $connection->connect();

                    // Crear una solicitud para leer el registro equivalente al puerto
                    $request = new ReadHoldingRegistersRequest($puerto, 1); // Leer 1 registro

                    // Enviar la solicitud y recibir la respuesta
                    $response = $connection->sendAndReceive($request);

                    // Procesar la respuesta (decodificar el valor)
                    $pulsos = unpack('n', substr($response, 9, 2))[1]; // Extraer 2 bytes de la respuesta

                    // Almacenar la lectura
                    $lecturas[] = [
                        'ip' => $ip,
                        'puerto' => $puerto,
                        'codigoMedidor' => $codigoMedidor,
                        'puerto' => $puerto,
                        'pulsos' => $pulsos
                    ];

                    // Cerrar la conexión después de la lectura
                    $connection->close();
                }
                catch (Exception $e) 
                {
                    // En lugar de detener la ejecución, solo registramos el error y seguimos con el siguiente datalogger
                    log_message('error', 'Error al leer los datos del datalogger ' . $ip . ': ' . $e->getMessage());
                    echo "Error al leer los datos del datalogger " . $ip . ": " . $e->getMessage() . "<br>"; // Mostrar mensaje de error pero continuar
                }
        }
        // Retornar las lecturas de los dataloggers que se conectaron correctamente
        return $lecturas;
    }


}