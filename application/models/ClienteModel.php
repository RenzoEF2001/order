<?php

class ClienteModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }
  /*Cliente*/ 
    public function create_cli($datos)
    {
        return $this->db->insert('tb_cliente',$datos);
    }
    
    public function view_cli()
    {
       $this->db->select('*');
        $this->db->from('tb_cliente');
        $this->db->where('ESTADO',1);
        return $this->db->get()->result();
        return $res = $this->db->get('tb_cliente');
    }

    public function llenarcamposcli($idclie){
        $this->db->select('*');
        $this->db->from('tb_cliente');
        $this->db->where('ID_CLIENTE', $idclie);
        return $this->db->get()->result_array();
    }

    public function elimnarcli($idclie){
        $this -> db -> set ('ESTADO','0'); 
        $this -> db -> where ('ID_CLIENTE' , $idclie ); 
        $this -> db -> update ('tb_cliente'); 
    }

    public function actualizarcli($datos,$idclie){
        $this -> db -> where ('ID_CLIENTE' , $idclie); 
        $this -> db -> update ('tb_cliente',$datos); 
    }
/*Sucursal*/ 
    public function create_sucu($datossucu)
    {
        return $this->db->insert('tb_sucursal',$datossucu);
    }
    
    public function view_sucu()
    {
        $this->db->select('*');
        $this->db->from('tb_sucursal');
        $this->db->where('ESTADO',1);
        return $this->db->get()->result();
    }

    public function llenarcampossurcu($idsurcu){
        $this->db->select('*');
        $this->db->from('tb_sucursal');
        $this->db->where('ID_SUCURSAL', $idsurcu);
        return $this->db->get()->result_array();
    }

    public function elimnarsurcu($idsurcu){
        $this -> db -> set ('ESTADO','0'); 
        $this -> db -> where ('ID_SUCURSAL' , $idsurcu ); 
        $this -> db -> update ('tb_sucursal'); 
    }
    public function actualizarsurcu($datossucu,$idsurcu){
        $this -> db -> where ('ID_SUCURSAL' , $idsurcu); 
        $this -> db -> update ('tb_sucursal',$datossucu); 
    }

}
