<?php

class TipoSistemaModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function get()
    {
        $this->db->from('tb_tipo_sistema');
        $this->db->where('ESTADO', 1);
        return  $this->db->get()->result_array();
    }

    public function create($data)
    {
        $this->db->insert('tb_tipo_sistema', $data);
        $idCreada = $this->db->insert_id();
        $codigo = $this->callSpGenerateCode('TSM-', $idCreada)['CODIGO'];

        $this->db->set('COD_TIPOSISTEMA', $codigo);
        $this->db->where('ID_TIPOSISTEMA', $idCreada);
        $this->db->update('tb_tipo_sistema');
    }

    public function update($codigo, $descripcion)
    {
        $this->db->set('DESCRIPCION', $descripcion);
        $this->db->where('COD_TIPOSISTEMA', $codigo);
        $this->db->update('tb_tipo_sistema');
    }

    public function delete($codigo)
    {
        $this->db->set('ESTADO', 0);
        $this->db->where('COD_TIPOSISTEMA', $codigo);
        $this->db->update('tb_tipo_sistema');
    }

    public function findByCodigo($codigo)
    {
        $this->db->from('tb_tipo_sistema');
        $this->db->where('COD_TIPOSISTEMA', $codigo);
        return  $this->db->get()->row_array();
    }

    public function getTipoSistemaSolicitadoPorAño($año)
    {
        $this->db->select('tb_tipo_sistema.DESCRIPCION, COUNT(*) AS CANTIDAD');
        $this->db->from('tb_orden');
        $this->db->join('tb_orden_detalle', 'tb_orden_detalle.FK_ORDEN = tb_orden.ID_ORDEN', 'inner');
        $this->db->join('tb_dispositivo', 'tb_dispositivo.ID_DISPOSITIVO = tb_orden_detalle.FK_DISPOSITIVO', 'inner');
        $this->db->join('tb_tipo_sistema', 'tb_tipo_sistema.ID_TIPOSISTEMA = tb_dispositivo.FK_TIPOSISTEMA', 'inner');
        $this->db->where('YEAR(tb_orden.FECHA_ORDEN)', $año);
        $this->db->group_by("tb_tipo_sistema.DESCRIPCION");
        return $this->db->get()->result_array();
        /**
         *   SELECT ts.DESCRIPCION, COUNT(*) AS CANTIDAD 
         *   FROM `tb_orden` o
         *       INNER JOIN tb_orden_detalle od ON od.FK_ORDEN = o.ID_ORDEN
         *       INNER JOIN tb_dispositivo di ON di.ID_DISPOSITIVO = od.FK_DISPOSITIVO
         *       INNER JOIN tb_tipo_sistema ts ON ts.ID_TIPOSISTEMA = di.FK_TIPOSISTEMA
         *   WHERE YEAR(o.FECHA_ORDEN) = 2022
         *   GROUP BY ts.DESCRIPCION
         */
    }

    public function callSpGenerateCode($nomenclatura, $num)
    {
        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$num')");
        mysqli_next_result($this->db->conn_id);
        return $query->row_array();
    }

}