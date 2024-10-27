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
        // Recibir datos del formulario
        $codigoSocio = $this->input->post('codigoSocio');
        $fechaInicio = $this->input->post('fechaInicio');
        $fechaFin = $this->input->post('fechaFin');

        // Llama al modelo para obtener los datos del historial de pagos
        $historialPagos = $this->reporte_model->obtener_historial_pagos($codigoSocio, $fechaInicio, $fechaFin);

        // Retorna los datos como JSON
        echo json_encode($historialPagos);
    }
    public function generar_pdf()
    {
        // Obtener los parámetros desde la solicitud
        $codigoSocio = $this->input->get('codigoSocio');
        $fechaInicio = $this->input->get('fechaInicio');
        $fechaFin = $this->input->get('fechaFin');
        
        // Llamar al modelo para obtener el historial de pagos
        $pagos = $this->reporte_model->obtener_historial_pagos($codigoSocio, $fechaInicio, $fechaFin);
        $nombreSocio = !empty($pagos) ? $pagos[0]->socio : 'N/A';
        
        // Crear la instancia de PDF y configurar la orientación y márgenes
        $pdf = new Pdf('L', 'mm', 'Letter'); // 'L' para orientación horizontal
        $pdf->AliasNbPages();
        $pdf->SetLeftMargin(20); // Ajuste de margen izquierdo para centrar el contenido horizontalmente
        $pdf->AddPage();
        
        // Titular con fondo de color y estilo
        $pdf->SetFillColor(200, 200, 200); // Color de fondo gris claro
        $pdf->SetTextColor(0, 0, 0); // Color de texto negro
        $pdf->SetFont('Arial', 'B', 16); // Fuente y tamaño de la cabecera
        $pdf->SetX(50);
        $pdf->Cell(190, 15, utf8_decode('Historial de Pagos'), 0, 1, 'C', true);
        $pdf->Ln(5); // Espacio debajo del titular
        // Texto "AquaReadPro" debajo del titular en una nueva fila
        $pdf->SetFont('Arial', 'B', 12); // Fuente y tamaño del texto
        $pdf->SetX(50); // Alineación centrada con el titular
        $pdf->Cell(-55, 1, 'AquaReadPro', 0, 1, 'C'); // Alineación centrada
        $pdf->Ln(5); // Espacio debajo de "AquaReadPro"
    
        // Restaurar color de texto negro para el contenido restante
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetFont('Arial', '', 10);
    
        // Detalles del socio y periodo
        $pdf->SetY(50);
        // Nueva línea para el nombre del socio
        $pdf->SetX(($pdf->GetPageWidth() - 230) / 2); // Ajuste para centrar
        $pdf->Cell(0, 5, utf8_decode('Código: ') . $codigoSocio, 0, 1, 'L');
        $pdf->SetX(($pdf->GetPageWidth() - 230) / 2); // Centrado nuevamente
        $pdf->Cell(0, 5, 'Socio: ' . $nombreSocio, 0, 1, 'L');
        
    
        // Formateo de fechas con mes en literal en español
        $fmt = new IntlDateFormatter('es_ES', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $fmt->setPattern("d '-' MMMM '-' y");
    
        $fechaInicioFormateada = $fmt->format(new DateTime($fechaInicio));
        $fechaFinFormateada = $fmt->format(new DateTime($fechaFin));
        $pdf->SetX(($pdf->GetPageWidth() - 230) / 2); // Ajuste para centrar
        $pdf->Cell(0, 5, 'Periodo: ' . $fechaInicioFormateada . ' al ' . $fechaFinFormateada, 0, 1, 'L');
        
        $pdf->SetX(($pdf->GetPageWidth() - 230) / 2); // Ajuste para centrar
        $pdf->Cell(0, 5, utf8_decode('Fecha de emisión: ') . date('d/m/Y'), 0, 1, 'L');
        $pdf->Ln(10);
    
        // Configuración de la tabla
        $tableStartX = ($pdf->GetPageWidth() - 230) / 2;
        $pdf->SetX($tableStartX);
    
        // Encabezado de la tabla sin bordes
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220);
        $pdf->Cell(10, 10, '#', 0, 0, 'C', true); // Columna del contador
        $pdf->Cell(50, 10, 'Socio', 0, 0, 'C', true);
        $pdf->Cell(15, 10, 'Codigo', 0, 0, 'C', true);
        $pdf->Cell(25, 10, 'Consumo', 0, 0, 'C', true);
        $pdf->Cell(30, 10, 'Total Pagado', 0, 0, 'C', true);
        $pdf->Cell(30, 10, 'Saldo Pendiente', 0, 0, 'C', true);
        $pdf->Cell(30, 10, 'Fecha Pago', 0, 0, 'C', true);
        $pdf->Cell(30, 10, 'Estado', 0, 1, 'C', true);
    
        // Datos de la tabla
        $pdf->SetFont('Arial', '', 10);
        $pdf->SetFillColor(240, 240, 240);
        $fill = false;
        $totalConsumo = 0;
        $totalPagado = 0;
        $totalSaldoPendiente = 0;
        $contador = 1; // Inicializar el contador
    
        foreach ($pagos as $pago) {
            $pdf->SetX($tableStartX);  // Centrando cada fila de la tabla
            $pdf->Cell(10, 10, $contador++, 0, 0, 'C', $fill); // Mostrar el contador y luego incrementar
            $pdf->Cell(50, 10, $pago->socio, 0, 0, 'C', $fill);
            $pdf->Cell(15, 10, $pago->codigoSocio, 0, 0, 'C', $fill);
            $pdf->Cell(25, 10, number_format($pago->consumo, 2), 0, 0, 'C', $fill);
            $pdf->Cell(30, 10, number_format($pago->totalPagado, 2), 0, 0, 'C', $fill);
            $pdf->Cell(30, 10, number_format($pago->saldoPendiente, 2), 0, 0, 'C', $fill);
            $pdf->Cell(30, 10, date('d/m/Y', strtotime($pago->fechaPago)), 0, 0, 'C', $fill);
            $pdf->Cell(30, 10, ucfirst($pago->estado), 0, 1, 'C', $fill);
    
            $totalConsumo += $pago->consumo;
            $totalPagado += $pago->totalPagado;
            $totalSaldoPendiente += $pago->saldoPendiente;
            $fill = !$fill;
        }
    
        // Fila de Totales
        $pdf->SetX($tableStartX);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetFillColor(220, 220, 220); // Color de fondo para la fila de totales
        $pdf->Cell(10, 8, '', 0, 0, 'C', true); // Celda vacía para el contador
        $pdf->Cell(50, 8, 'Totales:', 0, 0, 'C', true);
        $pdf->Cell(15, 8, '', 0, 0, 'C', true); // Celda vacía para alinear
        $pdf->Cell(25, 8, number_format($totalConsumo, 2), 0, 0, 'C', true);
        $pdf->Cell(30, 8, number_format($totalPagado, 2), 0, 0, 'C', true);
        $pdf->Cell(30, 8, number_format($totalSaldoPendiente, 2), 0, 0, 'C', true);
        $pdf->Cell(30, 8, '', 0, 0, 'C', true); // Celda vacía para "Fecha Pago"
        $pdf->Cell(30, 8, '', 0, 1, 'C', true); // Celda vacía para "Estado"
        
        // Salida del PDF
        $pdf->Output('Historial_Pagos_' . $codigoSocio . '.pdf', 'I');
    }
    
    
    
    
    

    

    
    

}
