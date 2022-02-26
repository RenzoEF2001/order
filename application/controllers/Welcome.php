<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("LoginModel");
		$this->load->model("PerfilModel");
		$this->load->model("EmpleadoModel");
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->rules = array(
            array(
                'field' => 'usuario',
                'label' => 'Usuario',
                'rules' => 'required|',
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.'
                )
            ),
			array(
                'field' => 'password',
                'label' => 'Contraseña',
                'rules' => 'required',
                'errors'=> array(
                    'required' => 'El campo "%s" es requerido.',
                )
            )
		);
	}

	public function index($data = null)
	{

		$this->load->view('login', $data);
		
	}

	public function validarCredenciales()
	{
		$usuario = $this->input->post('usuario');
		$contraseña = $this->input->post('contraseña');

		$usuarioValid = $this->LoginModel->getUsuario($usuario);

		if($usuarioValid == null){
			$data['error'] = 'No se encontro el usuario';
			return $this->index($data);
		}

		if(!password_verify($contraseña,$usuarioValid['CONTRASEÑA'])){
			$data['error'] = 'La contraseña es incorrecta';
			return $this->index($data);
		}

		$dataSession = [
			"usuario" => $usuarioValid["USUARIO"],
			"imagen" => $usuarioValid["FOTO"],
			"perfil" => $this->PerfilModel->findById($usuarioValid["FK_PERFIL"]),
			"empleado" => $this->EmpleadoModel->getById($usuarioValid["FK_EMPLEADO"]),
		];

		$this->session->set_userdata('user',$dataSession);

		redirect('inicio');
	}

	public function logout()
	{
		$this->session->sess_destroy();
	}

}
