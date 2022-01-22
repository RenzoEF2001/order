<?php 

class PerfilModel extends CI_Model{

    public function __construct() {
        $this->load->database();
    }

    public function get()
    {
        $this->db->from('tb_perfil');
        $this->db->where('ESTADO', 1);
        return  $this->db->get()->result_array();
    }

}