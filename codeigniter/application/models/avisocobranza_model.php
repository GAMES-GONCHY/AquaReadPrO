<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Avisocobranza_model extends CI_Model
{
    // Obtener los avisos por estado
    public function avisos_por_estado($estado)
    {
        $this->db->select('A.fechaVencimiento, A.idAviso, A.estado, T.tarifaMinima, T.tarifaVigente, Q.img,
                L.lecturaAnterior, L.lecturaActual, L.fechaLectura, 
                IFNULL((SELECT L2.fechaLectura 
                        FROM lectura L2 
                        INNER JOIN medidor M2 ON L2.idMedidor = M2.idMedidor
                        WHERE M2.idMedidor = M.idMedidor
                        AND YEAR(L2.fechaLectura) = YEAR(DATE_SUB(L.fechaLectura, INTERVAL 1 MONTH)) 
                        AND MONTH(L2.fechaLectura) = MONTH(DATE_SUB(L.fechaLectura, INTERVAL 1 MONTH))), 
                        L.fechaLectura) AS fechaLecturaAnterior, 
                ME.codigoSocio, 
                CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido, "")) AS nombreSocio');
        $this->db->from('avisoCobranza A');
        $this->db->join('qr Q', 'A.idQr = Q.idQr', 'inner');
        $this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
        $this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
        $this->db->join('medidor M', 'L.idMedidor = M.idMedidor', 'inner');
        $this->db->join('membresia ME', 'M.idMembresia = ME.idMembresia', 'inner');
        $this->db->join('usuario U', 'ME.idUsuario = U.idUsuario', 'inner');
        $this->db->where('A.estado', $estado); // Reemplaza 'pendiente' por el valor que necesites
        $this->db->order_by('L.fechaLectura', 'DESC');




        //$this->db->where('rol', $rol);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function modificar($id, $data)
	{
		$data['idAutor']=$this->session->userdata('idUsuario');
		$data['fechaRevision']=date('Y-m-d H:i:s');
		$this->db->where('idAviso', $id);
		$this->db->update('avisocobranza', $data);
	}
    public function generar_avisos()
    {
        // Ejecutar el procedimiento almacenado
        $this->db->query("CALL uspGenerarAvisos()");
    }

    public function total_avisos_por_estado($estado)
    {
        $this->db->where('estado', $estado);
        return $this->db->count_all_results('avisoCobranza'); // Contar el número total de avisos
    }
    public function sociopagaraviso($id, $data)
	{
		$data['idAutor']=$this->session->userdata('idUsuario');
        $data['estado'] = 'revision';
		$data['fechaPago']=date('Y-m-d H:i:s');
		$this->db->where('idAviso', $id);
		return $this->db->update('avisocobranza', $data);
	}
    // Obtener los avisos por estado
    public function avisos_por_estado_id($estado, $idUsuario)
    {
        $this->db->select('A.fechaVencimiento, A.idAviso, A.estado, T.tarifaMinima, T.tarifaVigente, Q.img,
                L.lecturaAnterior, L.lecturaActual, L.fechaLectura, 
                IFNULL((SELECT L2.fechaLectura 
                        FROM lectura L2 
                        INNER JOIN medidor M2 ON L2.idMedidor = M2.idMedidor
                        WHERE M2.idMedidor = M.idMedidor
                        AND YEAR(L2.fechaLectura) = YEAR(DATE_SUB(L.fechaLectura, INTERVAL 1 MONTH)) 
                        AND MONTH(L2.fechaLectura) = MONTH(DATE_SUB(L.fechaLectura, INTERVAL 1 MONTH))), 
                        L.fechaLectura) AS fechaLecturaAnterior, 
                ME.codigoSocio, 
                CONCAT(U.nombre, " ", U.primerApellido, " ", IFNULL(U.segundoApellido, "")) AS nombreSocio');
        $this->db->from('avisoCobranza A');
        $this->db->join('qr Q', 'A.idQr = Q.idQr', 'inner');
        $this->db->join('tarifa T', 'A.idTarifa = T.idTarifa', 'inner');
        $this->db->join('lectura L', 'A.idLectura = L.idLectura', 'inner');
        $this->db->join('medidor M', 'L.idMedidor = M.idMedidor', 'inner');
        $this->db->join('membresia ME', 'M.idMembresia = ME.idMembresia', 'inner');
        $this->db->join('usuario U', 'ME.idUsuario = U.idUsuario', 'inner');
        $this->db->where('A.estado', $estado); // Reemplaza 'pendiente' por el valor que necesites
        $this->db->where('U.idUsuario', $idUsuario);
        $this->db->order_by('L.fechaLectura', 'DESC');

        //$this->db->where('rol', $rol);
        $query = $this->db->get();
        return $query->result_array();
    }
}


