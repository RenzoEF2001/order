<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("LoginModel");
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
		/*
		echo '<pre>';
		print_r($usuarioValid);
		var_dump($usuarioValid);
		*/
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
			"perfil" => $usuarioValid["FK_PERFIL"],
			"empleado" => $usuarioValid["FK_EMPLEADO"],
		];

		$this->session->set_userdata('user',$dataSession);

		redirect('inicio');
	}

}
