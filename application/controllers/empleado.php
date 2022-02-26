<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Empleado extends CI_Controller
{
    protected $rules;
    protected $rules2;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("EmpleadoModel");
        $this->load->model("UsuarioModel");
        $this->load->model("TipoIdentificacionModel");
        $this->load->model("PerfilModel");
        $this->load->model("OrdenModel");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->rules = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'apellido',
                'label' => 'Apellido',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'correo',
                'label' => 'Correo',
                'rules' => 'valid_email',
                'errors' => array(
                    'valid_email' => 'El "%s" es invalido',
                ),
            ),
            array(
                'field' => 'telefono',
                'label' => 'Telefono',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                ),
            ),
            array(
                'field' => 'segundoTelefono',
                'label' => 'Segundo Telefono',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                ),
            ),
            array(
                'field' => 'telefonoFijo',
                'label' => 'Telefono Fijo',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                ),
            ),
            array(
                'field' => 'usuario',
                'label' => 'Usuario',
                'rules' => 'is_unique[tb_usuario.USUARIO]|max_length[20]|required',
                'errors' => array(
                    'is_unique' => 'Ya existe un usuario con el mismo nombre.',
                    'max_length' => 'Su nombre de usuario no puede tener mas de 20 caracteres.',
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'contraseña',
                'label' => 'Contraseña',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'perfil',
                'label' => 'Perfil',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
        );
        $this->rules2 = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'apellido',
                'label' => 'Apellido',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'correo',
                'label' => 'Correo',
                'rules' => 'valid_email',
                'errors' => array(
                    'valid_email' => 'El "%s" es invalido',
                ),
            ),
            array(
                'field' => 'telefono',
                'label' => 'Telefono',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                ),
            ),
            array(
                'field' => 'segundoTelefono',
                'label' => 'Segundo Telefono',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                ),
            ),
            array(
                'field' => 'telefonoFijo',
                'label' => 'Telefono Fijo',
                'rules' => 'numeric',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                ),
            )
        );
    }

    public function index()
    {
        $datosEmpleado = $this->EmpleadoModel->get();

        $data = [
            "empleado" => $datosEmpleado,
        ];

        $this->load->view('cabecera');
        $this->load->view('Empleado/Empleado_view', $data);
        $this->load->view('footer');

    }

    public function create()
    {
        $datosTipoIdentificacion = $this->TipoIdentificacionModel->get();
        $datosPerfil = $this->PerfilModel->get();
        $data = [
            "tipoidentificacion" => $datosTipoIdentificacion,
            "perfil" => $datosPerfil,
        ];

        $this->load->view('cabecera');
        $this->load->view('Empleado/Empleado_create', $data);
        $this->load->view('footer');
    }

    public function edit()
    {
        $this->load->view('cabecera');
        $this->load->view('Empleado/Empleado_edit');
        $this->load->view('footer');
    }

    public function save()
    {

        if ($this->input->post("tipoIdentificacion") == 1) {
            $nuevaRegla = array(
                'field' => 'numeroIdentificacion',
                'label' => 'Numero de Identificacion',
                'rules' => 'numeric|exact_length[8]',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                    'exact_length' => 'Su DNI debe en el campo "%s" tener 8 digitos',
                ),
            );
            array_push($this->rules, $nuevaRegla);
        }
        if ($this->input->post("tipoIdentificacion") == 2) {
            $nuevaRegla = array(
                'field' => 'numeroIdentificacion',
                'label' => 'Numero de Identificacion',
                'rules' => 'exact_length[12]',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                    'exact_length' => 'Su Documento de Extrajeria en el campo "%s" debe tener 12 digitos',
                ),
            );
            array_push($this->rules, $nuevaRegla);
        }

        $this->form_validation->set_rules($this->rules);

        if ($this->form_validation->run() == false) {
            return $this->create();
        }

        $datosEmpleado = [
            "cod_empleado" => ' ',//$this->generateCodeEmpleado("EMP-"),
            "nombres" => $this->input->post("nombre"),
            "apellidos" => $this->input->post("apellido"),
            "genero" => $this->input->post("genero"),
            "telefono_movil_1" => $this->input->post("telefono"),
            "telefono_movil_2" => $this->input->post("segundoTelefono"),
            "telefono_fijo" => $this->input->post("telefonoFijo"),
            "direccion" => $this->input->post("direccion"),
            "correo" => $this->input->post("correo"),
            "fecha_ingreso" => $this->input->post("fechaIngreso"),
            "num_doc_identidad" => $this->input->post("numeroIdentificacion"),
            "especialidad" => $this->input->post("especialidad"),
            "nacionalidad" => $this->input->post("nacionalidad"),
            "estado" => 1,
            "fk_tipoidentificacion" => $this->input->post("tipoIdentificacion"),
        ];

        $resultado = $this->EmpleadoModel->create($datosEmpleado);

        $hash = password_hash($this->input->post("contraseña"), PASSWORD_DEFAULT);

        $datosUsuario = [
            "cod_usuario" => ' ',
            "usuario" => $this->input->post("usuario"),
            "contraseña" => $hash,
            "foto" => 'sin_foto.png',
            "estado" => 1,
            "fk_perfil" => $this->input->post("perfil"),
            "fk_empleado" => $resultado['id'],
        ];

        $resultado2 = $this->UsuarioModel->create($datosUsuario);

        if (isset($_FILES['imagen'])) {
            if ($_FILES['imagen']['name'] != "") {
                $nombre_imagen = $this->uploadImage($resultado2['codigo']);
                $this->UsuarioModel->actualizarFotoUsuario($nombre_imagen, $resultado2['codigo']);
            }
        }

        

        //crear validacion con $resultado

        redirect('empleado/');
    }

    public function actualizar($codigo)
    {
        $datosEmpleado = $this->EmpleadoModel->getByCod($codigo);
        $datosTipoIdentificacion = $this->TipoIdentificacionModel->get();
        $datosPerfil = $this->PerfilModel->get();
        $data = [
            "empleado" => $datosEmpleado,
            "tipoidentificacion" => $datosTipoIdentificacion,
            "perfil" => $datosPerfil,
        ];

        $this->load->view('cabecera');
        $this->load->view('Empleado/Empleado_edit', $data);
        $this->load->view('footer');
    }

    public function update()
    {
        if ($this->input->post("tipoIdentificacion") == 1) {
            $nuevaRegla = array(
                'field' => 'numeroIdentificacion',
                'label' => 'Numero de Identificacion',
                'rules' => 'numeric|exact_length[8]',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                    'exact_length' => 'Su DNI debe en el campo "%s" tener 8 digitos',
                ),
            );
            array_push($this->rules2, $nuevaRegla);
        }
        if ($this->input->post("tipoIdentificacion") == 2) {
            $nuevaRegla = array(
                'field' => 'numeroIdentificacion',
                'label' => 'Numero de Identificacion',
                'rules' => 'exact_length[12]',
                'errors' => array(
                    'numeric' => 'El campo "%s" debe tener solo numeros.',
                    'exact_length' => 'Su Documento de Extrajeria en el campo "%s" debe tener 12 digitos',
                ),
            );
            array_push($this->rules2, $nuevaRegla);
        }

        $this->form_validation->set_rules($this->rules2);

        if ($this->form_validation->run() == false) {
            return $this->actualizar($this->input->post("codigo"));
        }

        $codigo = $this->input->post("codigo");
        $datosEmpleado = [
            "nombres" => $this->input->post("nombre"),
            "apellidos" => $this->input->post("apellido"),
            "genero" => $this->input->post("genero"),
            "telefono_movil_1" => $this->input->post("telefono"),
            "telefono_movil_2" => $this->input->post("segundoTelefono"),
            "telefono_fijo" => $this->input->post("telefonoFijo"),
            "direccion" => $this->input->post("direccion"),
            "correo" => $this->input->post("correo"),
            "fecha_ingreso" => $this->input->post("fechaIngreso"),
            "num_doc_identidad" => $this->input->post("numeroIdentificacion"),
            "especialidad" => $this->input->post("especialidad"),
            "nacionalidad" => $this->input->post("nacionalidad"),
            "estado" => 1,
            "fk_tipoidentificacion" => $this->input->post("tipoIdentificacion"),
        ];
        $this->EmpleadoModel->update($datosEmpleado, $codigo);

        redirect('empleado/');
    }

    public function cantidadUsuariosPerEmpleadoAJAX()
    {
        $codigo = $this->input->post('codigo');
        $datos = $this->UsuarioModel->countUsuarioPerEmpleado($codigo);
        echo json_encode($datos);
    }

    public function deleteAJAX()
    {
        $codigo = $this->input->post('codigo');
        $typeDelete = $this->input->post('typeDelete');
        $status = false;

        if ($typeDelete == "cascada") {
            $res = $this->UsuarioModel->deteleLogicalPerEmpleado($codigo);
            if ($res) {
                $status = $this->EmpleadoModel->deleteLogical($codigo);
                if($status){
                    $this->OrdenModel->updateEstado_Empleado(2,1,$codigo);
                }
            }
        }
        if ($typeDelete == "normal") {
            $status = $this->EmpleadoModel->deleteLogical($codigo);
        }

        echo json_encode($status);
    }

    public function cantidadOrdenesPorEmpleado()
    {
        $codigo = $this->input->post('codigo');
        $pendientes = $this->OrdenModel->getOrdenesPerEmpleado_Estado($codigo,2);
        $trabajando = $this->OrdenModel->getOrdenesPerEmpleado_Estado($codigo,3);

        $datos = [
            'pendiente' => $pendientes['CANTIDAD'],
            'trabajando' => $trabajando['CANTIDAD']
        ];

        echo json_encode($datos);
    }

    public function generateCodeEmpleado($nomenclatura)
    {
        $res = $this->EmpleadoModel->callSpGenerateCode($nomenclatura);
        return $res['CODIGO'];
    }

    public function generateCodeUsuario($nomenclatura)
    {
        $res = $this->UsuarioModel->callSpGenerateCode($nomenclatura);
        return $res['CODIGO'];
    }

    public function uploadImage($name_image)
    {
        $name = 'imagen';
        $config['upload_path'] = 'imagenes/usuarios';
        $config['file_name'] = $name_image;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_width'] = '2000';
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->do_upload($name);
        return $this->upload->data()['file_name'];
    }

}
