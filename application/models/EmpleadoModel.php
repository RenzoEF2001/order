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
        $idCreada = $this->db->insert_id();

        $this->db->set('COD_EMPLEADO', $this->callSpGenerateCode('EMP-',$idCreada)['CODIGO']);
        $this->db->where('ID_EMPLEADO', $idCreada);
        $this->db->update('tb_empleado'); 

        $data = [
            "status" => $query,
            "id" => $idCreada
        ];

        mysqli_next_result( $this->db->conn_id );
        return $data;
    }

    /* Usado para registrar el usuario, el estado por defecto es 1 */
    public function getLast()
    {
        return $this->db->get('tb_empleado')->last_row('array');
    }

    public function get()
    {
        $this->db->from('tb_empleado');
        $this->db->where('ESTADO', 1);
        return  $this->db->get()->result_array();
    }

    public function getTecnicos()
    {
        $this->db->from('tb_empleado');
        $this->db->join('tb_usuario', 'tb_usuario.FK_EMPLEADO = tb_empleado.ID_EMPLEADO', 'inner');
        $this->db->where('tb_empleado.ESTADO', 1);
        $this->db->where('tb_usuario.FK_PERFIL', 1);
        return  $this->db->get()->result_array();
    }

    public function getById($id)
    {
        $this->db->from('tb_empleado');
        $this->db->where('ID_EMPLEADO', $id);
        return $this->db->get()->row_array();
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

    public function callSpGenerateCode($nomenclatura, $num)
    {
        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$num')");
        mysqli_next_result( $this->db->conn_id );
        return $query->row_array();

    }

}
