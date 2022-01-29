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
        $num = $this->getLast()['ID_USUARIO'];
        ++$num;

        $query = $this->db->query("CALL `sp_generar_codigo`('$nomenclatura','$num')");
        mysqli_next_result( $this->db->conn_id );
        return $query->row_array();

    }

    public function getLast()
    {
        return $res = $this->db->get('tb_usuario')->last_row('array');
    }

    public function view_usuario()
    {
        $query =$this->db->select('*');
        $query =$this->db->from('tb_usuario');
        $query =$this->db->JOIN('tb_perfil','tb_perfil.ID_PERFIL=tb_usuario.FK_PERFIL');
        $query =$this->db->JOIN('tb_empleado','tb_empleado.ID_EMPLEADO=tb_usuario.FK_EMPLEADO');
        $this->db->where('tb_usuario.ESTADO',1);
        $query =$this->db->get();
        return $query->result();
    }
    public function llenarcampos_usuario($idUsu){
        $this->db->select('*');
        $this->db->from('tb_usuario');
        $this->db->where('ID_USUARIO', $idUsu);
        return $this->db->get()->result_array();
    }
    public function actualizarUsuario($datos,$idUsu){
        $this -> db -> where ('ID_USUARIO' , $idUsu); 
        $this -> db -> update ('tb_usuario',$datos); 
    }
    public function elimnarUsu($idUsu){
        $this -> db -> set ('ESTADO','0'); 
        $this -> db -> where ('ID_USUARIO' , $idUsu ); 
        $this -> db -> update ('tb_usuario'); 
    }

}