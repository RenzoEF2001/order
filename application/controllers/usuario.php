<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Usuario extends CI_Controller
{

    protected $rules;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("UsuarioModel");
        $this->load->model("PerfilModel");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->rules = array(
            array(
                'field' => 'USUARIO',
                'label' => 'Usuario',
                'rules' => 'max_length[20]|required',
                'errors' => array(
                    'max_length' => 'Su nombre de usuario no puede tener mas de 20 caracteres.',
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'FK_PERFIL',
                'label' => 'Perfil',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
        );
    }
    /*usuario*/
    public function index()
    {
        $datos['Usuario'] = $this->UsuarioModel->view_usuario();
        $this->load->view('cabecera');
        $this->load->view('Usuarios/Usuario_view', $datos);
        $this->load->view('footer');
    }
    public function llenarCampos_Usuario($idUsu)
    {
        $usuario = $this->UsuarioModel->llenarcampos_usuario($idUsu);
        $datos = [
            'usuario' => $usuario,
            'cboperfil' => $this->PerfilModel->view_perfil(),
        ];
        $this->load->view('cabecera');
        $this->load->view('Usuarios/Usuario_edit', $datos);
        $this->load->view('footer');
    }
    public function EditUsu()
    {
        $idUsu = $this->input->post('ID_USUARIO');
        $usuario = $this->UsuarioModel->findById($idUsu);

        if ($usuario == []) {
            return redirect('usuario/error_500');
        }

        if ($this->input->post('USUARIO') != $usuario['USUARIO']) {
            $this->rules[0]['rules'] ='is_unique[tb_usuario.USUARIO]|max_length[20]|required';
            $this->rules[0]['errors'] = array(
                'is_unique' => 'Ya existe un usuario con el mismo nombre.',
                'max_length' => 'Su nombre de usuario no puede tener mas de 20 caracteres.',
                'required' => 'El campo "%s" es requerido.',
            );
        }

        $this->form_validation->set_rules($this->rules);

        if ($this->form_validation->run() == false) {
            return $this->llenarCampos_Usuario($idUsu);
        }

        $datos['USUARIO'] = $this->input->post('USUARIO');
        $datos['FK_PERFIL'] = $this->input->post('FK_PERFIL');

        if ($this->input->post("CONTRASEÑA") != null || $this->input->post("CONTRASEÑA") != "") {
            $hash = password_hash($this->input->post("CONTRASEÑA"), PASSWORD_DEFAULT);
            $datos['CONTRASEÑA'] = $hash;
        } else {
            $datos['CONTRASEÑA'] = $usuario['CONTRASEÑA'];
        }

        if (isset($_POST['sinfoto'])) {
            $datos['FOTO'] = 'sin_foto.png';
        } else {
            if (isset($_FILES["imagen"])) {
                if (!empty($_FILES["imagen"]["name"])) {
                    $name_input = "imagen";
                    $name_image = $usuario['COD_USUARIO'];
                    $path = 'imagenes/usuarios';
                    if ($this->uploadImage($name_input, $name_image, $path)) {
                        $datos['FOTO'] = $this->upload->data()['file_name'];
                    } else {
                        $datos['FOTO'] = $usuario['FOTO'];
                    }
                } else {
                    $datos['FOTO'] = $usuario['FOTO'];
                }
            } else {
                $datos['FOTO'] = $usuario['FOTO'];
            }
        }

        $this->UsuarioModel->actualizarUsuario($datos, $idUsu);

        redirect('Usuario/index');
    }

    public function uploadImage($name_input, $name_image, $path)
    {
        $config['upload_path'] = $path;
        $config['file_name'] = $name_image;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '10000';
        //$config['max_width'] = '2000';
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if ($this->upload->do_upload($name_input)) {
            return true;
        } else {
            return false;
        }
    }

    public function error_500()
    {
        $this->load->view('error-500');
    }
}
