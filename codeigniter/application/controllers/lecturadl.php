<?php
defined('BASEPATH') or exit('No direct script access allowed');

use ModbusTcpClient\Network\BinaryStreamConnection;
use ModbusTcpClient\Packet\ModbusFunction\ReadHoldingRegistersRequest;

class Lecturadl extends CI_Controller 
{
    public function leer_pulsos() 
    {
        $ip_datalogger = '192.168.0.10'; // Dirección IP corregida
        
        // Crear una conexión TCP
        $connection = BinaryStreamConnection::getBuilder()
            ->setHost($ip_datalogger)
            ->setPort(502)
            ->setConnectTimeoutSec(5) // Establecer tiempo de espera
            ->build();

        try 
        {
            // Crear una solicitud para leer registros
            $request = new ReadHoldingRegistersRequest(13, 1); // Dirección 13, 1 registro

            // Enviar la solicitud y recibir la respuesta
            $response = $connection->connect()->sendAndReceive($request);

            // Depurar: Mostrar la respuesta en formato hexadecimal
            echo "Respuesta binaria: " . bin2hex($response) . "<br>";

            // Procesar la respuesta (decodificar el valor)
            $pulsos = unpack('n', substr($response, 9, 2))[1]; // Extraer 2 bytes de la respuesta

            echo "Número de pulsos: " . $pulsos;

        }
        catch (Exception $e) 
        {
            echo "Error al leer los datos del datalogger: " . $e->getMessage();
        }
    }
}

