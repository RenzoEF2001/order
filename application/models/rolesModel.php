<?php

class RolesModel extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    /*Cliente*/
    public function create_RO($PERFIL, $MODULO, $datos)
    {
        //return $this->db->insert('rol_modulos',$datos);
        return $this->db->insert("rol_modulos", ["PERFIL" => $PERFIL, "MODULO" => $MODULO, "	PERMISO" => $datos]);
    }
    public function view_RolxModulos()
    {
        /*para ser un inner join*/
        $query = $this->db->select('*');
        $query = $this->db->from('rol_modulos');
        $query = $this->db->JOIN('tb_perfil', 'rol_modulos.perfil=tb_perfil.ID_PERFIL');
        $this->db->where('rol_modulos.ESTADO', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function llenarcamposrol($idrol)
    {
        $this->db->select('*');
        $this->db->from('rol_modulos');
        $this->db->where('ID', $idrol);
        return $this->db->get()->result_array();
    }
    public function actualizarrol($datos, $idrol)
    {
        $this->db->where('ID', $idrol);
        $this->db->update('rol_modulos', $datos);
    }
    public function elimnarrole($idrole)
    {
        $this->db->set('ESTADO', '0');
        $this->db->where('ID', $idrole);
        $this->db->update('rol_modulos');
    }

}
