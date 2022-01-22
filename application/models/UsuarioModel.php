<?php

class UsuarioModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }
    /*usuario*/
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