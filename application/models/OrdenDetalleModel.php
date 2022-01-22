<?php

class OrdenDetalleModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getPerOrden($codigo)
    {
        $this->db->select('tb_tipo_sistema.DESCRIPCION, tb_dispositivo.NOMBRE,  tb_orden_detalle.DESCRIPCION AS DESCRIPCION_PROBLEMA, tb_orden_detalle.COD_ORDEN_DETALLE');
        $this->db->from('tb_orden_detalle');
        $this->db->join('tb_orden', 'tb_orden.ID_ORDEN = tb_orden_detalle.FK_ORDEN', 'inner');
        $this->db->join('tb_dispositivo', 'tb_dispositivo.ID_DISPOSITIVO = tb_orden_detalle.FK_DISPOSITIVO', 'inner');
        $this->db->join('tb_tipo_sistema', 'tb_tipo_sistema.ID_TIPOSISTEMA = tb_dispositivo.FK_TIPOSISTEMA', 'inner');
        $this->db->where('tb_orden.COD_ORDEN', $codigo);
        return  $this->db->get()->result_array();
    }

    public function getPerCode($codigo)
    {
        $this->db->select('tb_tipo_sistema.DESCRIPCION, tb_dispositivo.NOMBRE,  tb_orden_detalle.DESCRIPCION AS DESCRIPCION_PROBLEMA, tb_orden_detalle.COD_ORDEN_DETALLE, tb_orden_detalle.IMAGENES');
        $this->db->from('tb_orden_detalle');
        $this->db->join('tb_orden', 'tb_orden.ID_ORDEN = tb_orden_detalle.FK_ORDEN', 'inner');
        $this->db->join('tb_dispositivo', 'tb_dispositivo.ID_DISPOSITIVO = tb_orden_detalle.FK_DISPOSITIVO', 'inner');
        $this->db->join('tb_tipo_sistema', 'tb_tipo_sistema.ID_TIPOSISTEMA = tb_dispositivo.FK_TIPOSISTEMA', 'inner');
        $this->db->where('tb_orden_detalle.COD_ORDEN_DETALLE', $codigo);
        return  $this->db->get()->result_array();
    }

}
