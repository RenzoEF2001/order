<?php

class EmpleadoModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function create($datos)
    {
        $query = $this->db->insert('tb_empleado',$datos);
        mysqli_next_result( $this->db->conn_id );
        return $query;
    }

    /* Usado para registrar el usuario, el estado por defecto es 1 */
    public function getLast()
    {
        return $res = $this->db->get('tb_empleado')->last_row('array');
    }

    public function get()
    {
        $this->db->from('tb_empleado');
        $this->db->where('ESTADO', 1);
        return  $this->db->get()->result_array();
    }

    /* Usado para rellenar campos del formulario actualizar, no es necesario validar si su estado es 1  */
    public function getByCod($codigo)
    {
        $this->db->from('tb_empleado');
        $this->db->where('COD_EMPLEADO', $codigo);
        return $this->db->get()->row_array();
    }

    public function update($datos, $codigo)
    {
        $this->db->where('COD_EMPLEADO', $codigo);
        $this->db->update('tb_empleado', $datos); 
    }

    public function deleteLogical($codigo)
    {
        $this->db->set('ESTADO', '0');
        $this->db->where('COD_EMPLEADO', $codigo);
        $status = $this->db->update('tb_empleado'); 
        return $status;
    }

    public function callSpGenerateCode($nomenclatura)
    {
        $cantidadRegistros = $this->db->count_all('tb_empleado');

        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$cantidadRegistros')");
        mysqli_next_result( $this->db->conn_id );
        return $query->row_array();

    }

}
