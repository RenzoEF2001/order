<?php

class LoginModel extends CI_Model
{

    function __construct()
    {
        $this->load->database();
    }

    public function getUsuario($usuario)
    {
        $this->db->from('tb_usuario');
        $this->db->where('ESTADO', 1);
        $this->db->where('USUARIO', $usuario);
        return  $this->db->get()->row_array();
    }

}
