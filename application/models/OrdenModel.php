<?php

class OrdenModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function getOrdenesCreadas()
    {
        $this->db->select('tb_orden.*, tb_cliente.*, tb_sucursal.*, tb_sucursal.DIRECCION AS DIRECCION_SUCURSAL ');
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where('tb_orden.ESTADO', 1);
        $this->db->where('tb_orden.FK_EMPLEADO', NULL);
        return  $this->db->get()->result_array();
    }

    public function getOrdenesPendientes()
    {
        $this->db->select('tb_orden.*, tb_orden.ESTADO AS ESTADO_ORDEN, tb_cliente.*, tb_sucursal.* ');
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where_in('tb_orden.ESTADO', [2,3]);
        return  $this->db->get()->result_array();
    }

    public function getOrdenesAtendidas()
    {
        $this->db->select('tb_orden.*, tb_orden.ESTADO AS ESTADO_ORDEN, tb_cliente.*, tb_sucursal.* ');
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where_in('tb_orden.ESTADO', [4,5]);
        return  $this->db->get()->result_array();
    }

    public function getOrdenesCreadasPerCode($codigo)
    {
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where('tb_orden.COD_ORDEN', $codigo);
        return  $this->db->get()->result_array();
    }

    public function assignEmpleado($codigoEmpleado, $codigoOrden)
    {
        if($codigoEmpleado == null || strlen($codigoEmpleado) == 0 || $codigoOrden == null || strlen($codigoOrden) == 0 ){
            return false;
        }

        $this->db->from('tb_empleado');
        $this->db->where('COD_EMPLEADO', $codigoEmpleado);
        $empleado = $this->db->get()->row_array();

        $this->db->set('FK_EMPLEADO', $empleado['ID_EMPLEADO']);
        $this->db->set('ESTADO', '2');
        $this->db->where('COD_ORDEN', $codigoOrden);
        $status = $this->db->update('tb_orden'); 
        return $status;
    }

}
