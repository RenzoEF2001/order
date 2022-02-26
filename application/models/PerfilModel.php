<?php

class PerfilModel extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    public function get()
    {
        $this->db->from('tb_perfil');
        $this->db->where('ESTADO', 1);
        return $this->db->get()->result_array();
    }
    public function findById($id)
    {
        $this->db->from('tb_perfil');
        $this->db->where('ID_PERFIL', $id);
        $this->db->where('ESTADO', 1);
        return $this->db->get()->row_array();
    }
    public function view_perfil()
    {
        $this->db->select('*');
        $this->db->from('tb_perfil');
        $this->db->where('ESTADO', 1);
        return $this->db->get()->result();
    }
    public function elimnarperfil($idperfil)
    {
        $this->db->set('ESTADO', '0');
        $this->db->where('ID_PERFIL', $idperfil);
        $this->db->update('tb_perfil');
    }
}
