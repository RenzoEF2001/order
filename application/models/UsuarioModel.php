<?php

class UsuarioModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function create($datos)
    {
        return $this->db->insert('tb_usuario',$datos);
    }

    public function deteleLogicalPerEmpleado($codigo)
    {
        $this->db->from('tb_empleado');
        $this->db->where('COD_EMPLEADO', $codigo);
        $empleado = $this->db->get()->row_array();

        $this->db->set('ESTADO', '0');
        $this->db->where('FK_EMPLEADO', $empleado['ID_EMPLEADO']);
        $res = $this->db->update('tb_usuario');
        return $res;
    }

    public function countUsuarioPerEmpleado($codigo)
    {
        $this->db->select('*');
        $this->db->from('tb_usuario');
        $this->db->join('tb_empleado', 'tb_empleado.ID_EMPLEADO = tb_usuario.FK_EMPLEADO', 'inner');
        $this->db->where('tb_usuario.ESTADO', 1);
        $this->db->where('tb_empleado.COD_EMPLEADO', $codigo);
        return $this->db->count_all_results();
    }

    public function callSpGenerateCode($nomenclatura)
    {
        $cantidadRegistros = $this->db->count_all('tb_usuario');

        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$cantidadRegistros')");
        mysqli_next_result( $this->db->conn_id );
        return $query->row_array();

    }

}