<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reporte extends CI_Controller
{
    public function historialpagos()
    {
        //$data['historial'] = $this->reporte_model->get_pagos();
        $this->load->view('incrustaciones/vistascoloradmin/headreportes');
        $this->load->view('incrustaciones/vistascoloradmin/menuadmin');
        $this->load->view('historialreportes');
        $this->load->view('incrustaciones/vistascoloradmin/footerreportes');
    }
    public function buscar_socio() 
    {
        // Recibir el código del socio desde la petición AJAX
        $criterio = $this->input->post('criterio');  // Cambiado a $criterio
        $fechaInicio = $this->input->post('fechaInicio');
        $fechaFin = $this->input->post('fechaFin');
        
        // Buscar al socio en la base de datos
        $socio = $this->reporte_model->obtener_socio_por_criterio($criterio);
        
        // Registrar el contenido de $socio en el log para depuración
        log_message('info', 'Contenido de socio: ' . print_r($socio, true));


        if ($socio)
        {
            echo json_encode($socio);  // Retornar el socio encontrado en formato JSON
        }
        else 
        {
            echo 'false';  // Si no se encuentran resultados
        }
    }
    public function historial_pagos() 
    {
        $data['codigoSocio'] = $this->input->post('codigoSocio');
        $data['idMembresia'] = $this->input->post('idMembresia');
        
        $data['fechaInicio'] = $this->input->post('fechaInicio');
        $data['fechaFin'] = $this->input->post('fechaFin');

        $historialPagos = $this->reporte_model->obtener_historial_pagos($data);
        
        // Retorna los datos como JSON
        echo json_encode($historialPagos);
    }
    public function obtener_reporte() 
    {
        $tipoReporte = $this->input->post('tipoReporte');
        $data['codigoSocio'] = $this->input->post('codigoSocio');
        $data['idMembresia'] = $this->input->post('idMembresia');
        $data['fechaInicio'] = $this->input->post('fechaInicio');
        $data['fechaFin'] = $this->input->post('fechaFin');
        $data['tipoReporte'] = $this->input->post('tipoReporte');
        $response = [];

        if ($tipoReporte == 'pagos')
        {
            // Definir encabezados para "pagos"
            $response['headers'] = ["No.", "Mes - Año", "Total [Bs.]", "Fecha pago"];

            // Obtener datos del modelo
            $historialPagos = $this->reporte_model->obtener_datos_historicos($data);

            if (!empty($historialPagos))
            {
                // Formatear datos para la respuesta JSON
                $response['data'] = array_map(function($pago, $index)
                {
                    return [
                        $index + 1, // Número de fila
                        $pago['fechaLectura'], // Ejemplo: "Mayo 2024"
                        $pago['totalPagado'], // Ejemplo: "80.00"
                        $pago['fechaPago'] // Ejemplo: "25/10/2024"
                    ];
                }, $historialPagos, array_keys($historialPagos));
            } 
            else
            {
                $response['data'] = []; // Si no hay datos, devolvemos un arreglo vacío
            }
        }
        elseif ($tipoReporte == 'consumos')
        {
            // Definir encabezados para "consumos"
            $response['headers'] = ["No.", "Mes - Año", "Consumo [m3]", "Observación"];

             // Obtener datos del modelo
            $historialConsumos = $this->reporte_model->obtener_datos_historicos($data);

            if (!empty($historialConsumos))
            {
                // Formatear datos para la respuesta JSON
                $response['data'] = array_map(function($consumo, $index)
                {
                    return [
                        $index + 1, // Número de fila
                        $consumo['fechaLectura'], // Ejemplo: "Mayo 2024"
                        $consumo['consumo'], // Ejemplo: "180.00"
                        $consumo['observacion']
                    ];
                }, $historialConsumos, array_keys($historialConsumos));
            }
            else
            {
                $response['data'] = [];
            }
        }
        // else
        // {
        //     // Definir encabezados para "avisos"
        //     $response['headers'] = ["No.", "Mes - Año", "Saldo", "estado", "Fecha Vencimiento"];

        //      // Obtener datos del modelo
        //     //$historialAvisos = $this->reporte_model->obtener_historial_avisos($data);

        //     if (!empty($historialAvisos))
        //     {
        //         // Formatear datos para la respuesta JSON
        //         $response['data'] = array_map(function($aviso, $index)
        //         {
        //             return [
        //                 $index + 1, // Número de fila
        //                 $aviso['mes_anio'], // Ejemplo: "Mayo 2024"
        //                 $aviso['saldo'], // Saldo pendiente
        //                 $aviso['estado'], // Estado del aviso
        //                 $aviso['fecha_vencimiento'], // Fecha de vencimiento
        //             ];
        //         }, $historialAvisos, array_keys($historialAvisos));
        //     } 
        //     else
        //     {
        //         $response['data'] = [];
        //     }
        // }
        
        // Retornar los datos como JSON con headers y data
        echo json_encode($response);
    }
    public function generar_pdf()
    {
        // Obtener los parámetros desde la solicitud
        $data['codigoSocio'] = $this->input->post('codigoSocio');
        $data['idMembresia'] = $this->input->post('idMembresia');
        $data['fechaInicio'] = $this->input->post('fechaInicio');
        $data['fechaFin'] = $this->input->post('fechaFin');
        $data['tipoReporte'] = $this->input->post('tipoReporte');
        log_message('error', 'Tipo de reporte recibido en controlador: ' . $data['tipoReporte']);
        $socio = $this->input->post('nombreSocio');
        
        // Llamar al modelo para obtener el historial de pagos
        $pagos = $this->reporte_model->obtener_datos_historicos($data);
    
        // Crear la instancia de PDF y configurar la orientación y márgenes
        $pdf = new Pdf('P', 'mm', 'Letter');
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(20);
        $pdf->AddPage();
        
        // Encabezado principal
        $pdf->SetFillColor(200, 200, 200);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', 'B', 16);
    
        // Calcular el ancho disponible para la celda
        $pageWidth = $pdf->GetPageWidth();
        $margenIzquierdo = 45; // Ajuste para desplazar la tabla más hacia la derecha
        $margenDerecho = 30;
        $anchoDisponible = $pageWidth - $margenIzquierdo - $margenDerecho;
    
        // Centrar el texto usando el ancho disponible
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell($anchoDisponible, 15, utf8_decode('Historial de Pagos'), 0, 1, 'C', true);
        $pdf->Ln(5);
    
        // Subtítulo "AquaReadPro"
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetY(25);
        $pdf->SetX(10);
        $pdf->Cell(50, 10, 'AquaReadPro', 0, 1, 'L');
        $pdf->Ln(5);
    
        // Detalles del socio y periodo
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetY(50);
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Código: ') . $data['codigoSocio'], 0, 1, 'L');
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Socio: ') . $socio, 0, 1, 'L');
    
        // Formateo de fechas con mes en literal en español
        $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $fmt->setPattern("MMMM '-' y");
    
        $fechaInicioFormateada = $fmt->format(new DateTime($data['fechaInicio']));
        $fechaFinFormateada = $fmt->format(new DateTime($data['fechaFin']));
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, 'Periodo: ' . $fechaInicioFormateada . ' al ' . $fechaFinFormateada, 0, 1, 'L');
        $pdf->SetX($margenIzquierdo);
        $pdf->Cell(0, 5, utf8_decode('Fecha de emisión: ') . date('d/m/Y'), 0, 1, 'L');
        $pdf->Ln(10);
    
        // Configuración de la tabla y centrado horizontal
        $tableStartX = $margenIzquierdo; // Usar el mismo margen para la tabla
    
        // Encabezado de la tabla
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->SetX($tableStartX);
        $pdf->Cell(10, 10, '#', 0, 0, 'C', true);
        $pdf->Cell(40, 10, utf8_decode('Mes - Año'), 0, 0, 'C', true);
        $pdf->Cell(40, 10, 'Total Pagado', 0, 0, 'C', true);
        $pdf->Cell(40, 10, 'Fecha Pago', 0, 1, 'C', true);
    
        // Datos de la tabla
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(240, 240, 240);
        $fill = false;
        $totalPagado = 0;
        $contador = 1;
    
        $meses = ["enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre"];
    
        foreach ($pagos as $pago) {
            $pdf->SetX($tableStartX);
            $pdf->Cell(10, 10, $contador++, 0, 0, 'C', $fill);
    
            $fechaLectura = strtotime($pago['fechaLectura']);
            $mesLiteral = $meses[date('n', $fechaLectura) - 1];
            $anio = date('Y', $fechaLectura);
    
            $pdf->Cell(40, 10, ucfirst($mesLiteral) . ' ' . $anio, 0, 0, 'C', $fill);
            $pdf->Cell(40, 10, number_format($pago['totalPagado'], 2), 0, 0, 'C', $fill);
            $pdf->Cell(40, 10, date('d/m/Y', strtotime($pago['fechaPago'])), 0, 1, 'C', $fill);
            $totalPagado += $pago['totalPagado'];
            $fill = !$fill;
        }
    
        // Fila de Totales
        $pdf->SetX($tableStartX);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(10, 8, '', 0, 0, 'C', true);
        $pdf->Cell(40, 8, 'Totales:', 0, 0, 'L', true);
        $pdf->Cell(40, 8, number_format($totalPagado, 2), 0, 0, 'C', true);
        $pdf->Cell(40, 8, '', 0, 1, 'C', true);
    
        // Salida del PDF
        $pdf->Output('Historial_Pagos_' . $data['codigoSocio'] . '.pdf', 'I');
    }
    
    
}
