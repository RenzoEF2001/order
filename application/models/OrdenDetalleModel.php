<?php

class OrdenDetalleModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function create($datos)
    {
        $query = $this->db->insert('tb_orden_detalle',$datos);

        $idCreada = $this->db->insert_id();
        $codigo = $this->callSpGenerateCode('ODD-',$idCreada)['CODIGO'];

        $this->db->set('COD_ORDEN_DETALLE', $codigo);
        $this->db->where('ID_ORDEN_DETALLE', $idCreada);
        $this->db->update('tb_orden_detalle'); 

        //mysqli_next_result( $this->db->conn_id );

        $data = [
            'status' => $query,
            'codigo' => $codigo
        ];

        return $data;
    }

    public function updateImage($imagen, $codigo)
    {
        $this -> db -> set ('IMAGENES' , $imagen); 
        $this -> db -> where ('COD_ORDEN_DETALLE' , $codigo); 
        $this -> db -> update ('tb_orden_detalle'); 
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

    public function callSpGenerateCode($nomenclatura, $num)
    {
        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$num')");
        mysqli_next_result( $this->db->conn_id );
        return $query->row_array();
    }

    public function getLast()
    {
        return $res = $this->db->get('tb_orden_detalle')->last_row('array');
    }


}
