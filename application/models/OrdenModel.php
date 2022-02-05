<?php

class OrdenModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    public function create($datos)
    {
        $query = $this->db->insert('tb_orden',$datos);

        $idCreada = $this->db->insert_id();

        $this->db->set('COD_ORDEN', $this->callSpGenerateCode('ORD-',$idCreada)['CODIGO']);
        $this->db->where('ID_ORDEN', $idCreada);
        $this->db->update('tb_orden'); 

        $data = [
            "status" => $query,
            "id" => $idCreada
        ];

        //mysqli_next_result( $this->db->conn_id );
        return $data;
    }

    public function updateEstado($estado,$codigo)
    {
        $this->db->set('ESTADO', $estado);
        $this->db->where('COD_ORDEN', $codigo);
        $this->db->update('tb_orden');
    }

    public function getOrdenesCreadas()
    {
        $dataUser = $this->session->user;
        $this->db->select('tb_orden.*, tb_cliente.*, tb_sucursal.*, tb_sucursal.DIRECCION AS DIRECCION_SUCURSAL ');
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where('tb_orden.ESTADO', 1);
        if($dataUser['perfil'] == ''){
            return $this->db->where('tb_orden.ID_ORDEN', -1);;
        }
        return  $this->db->get()->result_array();
    }

    public function getOrdenesPendientes()
    {
        $dataUser = $this->session->user;
        $this->db->select('tb_orden.*, tb_orden.ESTADO AS ESTADO_ORDEN, tb_cliente.*, tb_sucursal.*, tb_sucursal.DIRECCION AS DIRECCION_SUCURSAL ');
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where_in('tb_orden.ESTADO', [2,3]);
        if($dataUser['perfil'] == 1){
            $this->db->where('tb_orden.FK_EMPLEADO', $dataUser['empleado']['ID_EMPLEADO']);
        }
        if($dataUser['perfil'] == ''){
            return [];
        }
        return  $this->db->get()->result_array();
    }

    public function getOrdenesAtendidas()
    {
        $dataUser = $this->session->user;
        $this->db->select('tb_orden.*, tb_orden.ESTADO AS ESTADO_ORDEN, tb_cliente.*, tb_sucursal.*, tb_sucursal.DIRECCION AS DIRECCION_SUCURSAL');
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->where_in('tb_orden.ESTADO', [4,5]);
        if($dataUser['perfil'] == 1){
            $this->db->where('tb_orden.FK_EMPLEADO', $dataUser['empleado']['ID_EMPLEADO']);
        }

        if($dataUser['perfil'] == ''){
            $this->db->where('tb_orden.ID_ORDEN', -1);
        }
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

    public function callSpGenerateCode($nomenclatura, $num)
    {
        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$num')");
        mysqli_next_result( $this->db->conn_id );
        return $query->row_array();
    }

    public function getLast()
    {
        return $res = $this->db->get('tb_orden')->last_row('array');
    }

    public function getAll()
    {
        $dataUser = $this->session->user;
        
        if($dataUser['perfil'] == ''){
            return [];
        }
        $this->db->select('tb_orden.*, tb_orden.ESTADO AS ESTADO_ORDEN, tb_cliente.*, tb_sucursal.*, tb_sucursal.DIRECCION AS DIRECCION_SUCURSAL, tb_empleado.* ');
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->join('tb_empleado', 'tb_empleado.ID_EMPLEADO = tb_orden.FK_EMPLEADO', 'left');
        if($dataUser['perfil'] == 1){
            $this->db->where('tb_orden.ID_ORDEN', -1);
        }
        return  $this->db->get()->result_array();
    }

    public function getAllFilter($estado = null,$empleado = null,$fecha = null)
    {
        $dataUser = $this->session->user;
        
        
        $this->db->select('tb_orden.*, tb_orden.ESTADO AS ESTADO_ORDEN, tb_cliente.*, tb_sucursal.*, tb_sucursal.DIRECCION AS DIRECCION_SUCURSAL, tb_empleado.*');
        $this->db->from('tb_orden');
        $this->db->join('tb_sucursal', 'tb_sucursal.ID_SUCURSAL = tb_orden.FK_SUCURSAL', 'inner');
        $this->db->join('tb_cliente', 'tb_cliente.ID_CLIENTE = tb_sucursal.FK_CLIENTE', 'inner');
        $this->db->join('tb_empleado', 'tb_empleado.ID_EMPLEADO = tb_orden.FK_EMPLEADO', 'left');
        if($dataUser['perfil'] == ''){
            $this->db->where('tb_orden.ID_ORDEN', -1);
        }
        if($dataUser['perfil'] == 1){
            $this->db->where('tb_orden.ID_ORDEN', -1);
        }
        if($estado != null){
            $this->db->where('tb_orden.ESTADO', $estado);
        }
        if($empleado != null){
            $this->db->where('tb_empleado.COD_EMPLEADO', $empleado);
        }
        if($fecha != null){
            $this->db->where('tb_orden.FECHA_ORDEN', $fecha);
        }
        return  $this->db->get()->result_array();
    }

    public function getCantidadOrdenes_Mes($estado, $mes)
    {
        $this->db->select('COUNT(*) AS CANTIDAD');
        $this->db->from('tb_orden');
        $this->db->where('tb_orden.ESTADO', $estado);
        $this->db->where('MONTH(FECHA_ORDEN)', $mes);
        $this->db->group_by("tb_orden.ESTADO");
        $res = $this->db->get()->result_array();
        if($res == []){
            return [["CANTIDAD" => 0]];
        }
        return $res;
    }

    public function getEstados()
    {
        $this->db->select('tb_orden.ESTADO');
        $this->db->from('tb_orden');
        $this->db->where_in('tb_orden.ESTADO', [1,2,3,4,5]);
        $this->db->group_by("tb_orden.ESTADO");
        return  $this->db->get()->result_array();
    }

    public function getEmpleados()
    {
        $this->db->select('CONCAT(tb_empleado.NOMBRES," ",tb_empleado.APELLIDOS) AS NAME,tb_empleado.COD_EMPLEADO');
        $this->db->from('tb_orden');
        $this->db->join('tb_empleado', 'tb_empleado.ID_EMPLEADO = tb_orden.FK_EMPLEADO', 'inner');
        $this->db->where_not_in('tb_orden.ESTADO', 0);
        $this->db->group_by("NAME");
        $this->db->order_by('NAME', 'DESC');
        return  $this->db->get()->result_array();
    }

    public function getFechas()
    {
        $this->db->select('tb_orden.FECHA_ORDEN');
        $this->db->from('tb_orden');
        $this->db->where_not_in('tb_orden.ESTADO', 0);
        $this->db->group_by('tb_orden.FECHA_ORDEN');
        $this->db->order_by('tb_orden.FECHA_ORDEN', 'DESC');
        return  $this->db->get()->result_array();
    }

    
    public function getOrdenesPendientesCerradas_Mes_Año($año, $estado)
    {
        $this->db->select('UPPER(DATE_FORMAT(FECHA_ORDEN,"%b")) AS MES, COUNT(ESTADO) AS CANTIDAD');
        $this->db->from('tb_orden');
        $this->db->where('YEAR(FECHA_ORDEN)', $año);
        if($estado != null){
            $this->db->where('tb_orden.ESTADO', $estado);
        }
        $this->db->group_by("MONTH(FECHA_ORDEN)");

        return $this->db->get()->result_array();
        /** 
         *   SELECT UPPER(DATE_FORMAT(FECHA_ORDEN,"%b")) AS MES, COUNT(ESTADO) AS CANTIDAD
         *   FROM `tb_orden` 
         *   WHERE YEAR(FECHA_ORDEN) = 2022 AND ESTADO = 2
         *   GROUP BY MONTH(FECHA_ORDEN) 
        */
    }

    public function getOrdenes_Estado_Mes($mes, $estado)
    {
        $this->db->select('COUNT(ESTADO IS NULL) AS CANTIDAD');
        $this->db->from('tb_orden');
        $this->db->where('MONTH(FECHA_ORDEN)', $mes);
        $this->db->group_by("tb_orden.ESTADO");
        $this->db->having('ESTADO',$estado);
        $res = $this->db->get()->result_array();
        if ($res == []){
            return [["CANTIDAD" => 0]];
        }
        return $res;
        /**
         *   SELECT COUNT(ESTADO IS NULL) AS CANTIDAD
         *   FROM `tb_orden` 
         *   WHERE MONTH(FECHA_ORDEN) = 1
         *   GROUP BY ESTADO
         *   HAVING ESTADO IN(2,3,4)
         */
    }

}
