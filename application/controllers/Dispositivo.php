<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dispositivo extends CI_Controller
{
    protected $rules;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("DispositivoModel");
        $this->load->model("NomenclaturaModel");
        $this->load->model("TipoSistemaModel");
        $this->load->model("OrdenDetalleModel");
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->rules = array(
            array(
                'field' => 'nombre',
                'label' => 'Nombre del Dispositivo',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'nomenclatura',
                'label' => 'Nomenclatura',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
            array(
                'field' => 'tiposistema',
                'label' => 'Tipo de sistema',
                'rules' => 'required',
                'errors' => array(
                    'required' => 'El campo "%s" es requerido.',
                ),
            ),
        );
    }

    public function index()
    {
        $data['dispositivo'] = $this->DispositivoModel->get();

        $this->load->view('cabecera');
        $this->load->view('Dispositivo/Dispositivo_view', $data);
        $this->load->view('footer');
    }

    public function create()
    {
        $nomenclatura = $this->NomenclaturaModel->get();
        $tiposistema = $this->TipoSistemaModel->get();

        $data = [
            "nomenclatura" => $nomenclatura,
            "tiposistema" => $tiposistema
        ];

        $this->load->view('cabecera');
        $this->load->view('Dispositivo/Dispositivo_create', $data);
        $this->load->view('footer');
    }

    public function save()
    {
        $this->form_validation->set_rules($this->rules);

        if ($this->form_validation->run() == false) {
            return $this->create();
        }

        $nombre = $this->input->post('nombre');
        $detalles = $this->input->post('detalles');
        $nomenclatura = $this->input->post('nomenclatura');
        $tiposistema = $this->input->post('tiposistema');

        $data = [
            "NOMBRE" => $nombre,
            "DESCRIPCION" => $detalles,
            "IMAGEN" => 'no_disponible.png',
            "ESTADO" => 1,
            "FK_TIPOSISTEMA" => $tiposistema,
            "FK_DISPOSITIVO_NOMENCLATURA" => $nomenclatura
        ];

        $response = $this->DispositivoModel->create($data);

        if (isset($_FILES['imagen'])) {
            if ($_FILES['imagen']['name'] != "") {
                $name_input = "imagen";
                $name_image = $response["codigo"];
                $path = "imagenes/dispositivo";
                if($this->uploadImage($name_input, $name_image, $path)){
                    $this->DispositivoModel->updateImagen($this->upload->data()['file_name'], $response["codigo"]);
                }
            } else {
                log_message('error','Sin imagen');
            }
        } else {
            log_message('error','No hay imagen');
        }

        return redirect('Dispositivo/index');
    }

    public function edit($codigo)
    {
        $dispositivo = $this->DispositivoModel->findByCodigo($codigo);
        $nomenclatura = $this->NomenclaturaModel->get();
        $tiposistema = $this->TipoSistemaModel->get();

        $data = [
            "dispositivo" => $dispositivo,
            "nomenclatura" => $nomenclatura,
            "tiposistema" => $tiposistema
        ];

        $this->load->view('cabecera');
        $this->load->view('Dispositivo/Dispositivo_edit', $data);
        $this->load->view('footer');
    }

    public function update()
    {
        $codigo = $this->input->post('codigo');
        $dispositivo = $this->DispositivoModel->findByCodigo($codigo);

        if ($dispositivo == []) {
            return redirect('usuario/error_500');
        }

        $this->form_validation->set_rules($this->rules);

        if ($this->form_validation->run() == false) {
            return $this->edit($codigo);
        }

        $nombre = $this->input->post('nombre');
        $detalles = $this->input->post('detalles');
        $nomenclatura = $this->input->post('nomenclatura');
        $tiposistema = $this->input->post('tiposistema');

        $data = [
            "NOMBRE" => $nombre,
            "DESCRIPCION" => $detalles,
            "IMAGEN" => 'no_disponible.png',
            "ESTADO" => 1,
            "FK_TIPOSISTEMA" => $tiposistema,
            "FK_DISPOSITIVO_NOMENCLATURA" => $nomenclatura
        ];

        if (isset($_POST['sinimagen'])) {
            $data['IMAGEN'] = 'no_disponible.png';
        } else {
            if (isset($_FILES["imagen"])) {
                if (!empty($_FILES["imagen"]["name"])) {
                    $name_input = "imagen";
                    $name_image = $_FILES["imagen"]["name"];
                    $path = 'imagenes/dispositivo';
                    if ($this->uploadImage($name_input, $name_image, $path)) {
                        $data['IMAGEN'] = $this->upload->data()['file_name'];
                    } else {
                        $data['IMAGEN'] = $dispositivo['IMAGEN'];
                    }
                } else {
                    $data['IMAGEN'] = $dispositivo['IMAGEN'];
                }
            } else {
                $data['IMAGEN'] = $dispositivo['IMAGEN'];
            }
        }

        $this->DispositivoModel->update($data, $codigo);

        return redirect('Dispositivo/');
    }

    public function tiposistema_view()
    {
        $tiposistema = $this->TipoSistemaModel->get();

        $data = [
            'tiposistema' => $tiposistema
        ];

        $this->load->view('cabecera');
        $this->load->view('Dispositivo/TipoSistema_view', $data);
        $this->load->view('footer');
    }

    public function tiposistema_save()
    {
        $descripcion = $this->input->post('descripcion');
        $data = [
            'descripcion' => $descripcion,
            'estado' => 1
        ];
        $this->TipoSistemaModel->create($data);

        return redirect('Dispositivo/tiposistema_view');
    }

    public function tiposistema_update()
    {
        $codigo = $this->input->post('codigo');
        $descripcion = $this->input->post('descripcion');
        $this->TipoSistemaModel->update($codigo, $descripcion);

        return redirect('Dispositivo/tiposistema_view');
    }

    public function tiposistema_deleteAJAX()
    {
        $codigo = $this->input->post('codigo');

        $this->TipoSistemaModel->delete($codigo);

        return redirect('Dispositivo/tiposistema_view');
    }

    public function nomenclatura_view()
    {
        $nomenclatura = $this->NomenclaturaModel->get();

        $data = [
            'nomenclatura' => $nomenclatura
        ];

        $this->load->view('cabecera');
        $this->load->view('Dispositivo/nomenclatura_view', $data);
        $this->load->view('footer');
    }

    public function nomenclatura_save()
    {
        $nomenclatura = $this->input->post('nomenclatura');
        $descripcion = $this->input->post('descripcion');
        $data = [
            'nomenclatura' => $nomenclatura,
            'descripcion' => $descripcion,
            'estado' => 1
        ];
        $this->NomenclaturaModel->create($data);

        return redirect('Dispositivo/nomenclatura_view');
    }

    public function nomenclatura_update()
    {
        $codigo = $this->input->post('codigo');
        $nomenclatura = $this->input->post('nomenclatura');
        $descripcion = $this->input->post('descripcion');

        $data = [
            'nomenclatura' => $nomenclatura,
            'descripcion' => $descripcion,
            'estado' => 1
        ];

        $this->NomenclaturaModel->update($codigo, $data);

        return redirect('Dispositivo/nomenclatura_view');
    }

    public function nomenclatura_deleteAJAX()
    {
        $codigo = $this->input->post('codigo');

        $this->NomenclaturaModel->delete($codigo);

        return redirect('Dispositivo/nomenclatura_view');
    }

    public function getDetallesDispositivo()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->DispositivoModel->getDetallesDispositivo($codigo);
        echo json_encode($data);
    }

    public function getTipoSistemaByCode()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->TipoSistemaModel->findByCodigo($codigo);
        echo json_encode($data);
    }
    
    public function getNomenclaturaByCode()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->NomenclaturaModel->findByCodigo($codigo);
        echo json_encode($data);
    }

    public function cantidadOrdenesPorTipoSistemaAJAX()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->OrdenDetalleModel->countByTipoSistema($codigo);

        echo json_encode($data);
    }

    public function cantidadOrdenesPorDispositivoAJAX()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->OrdenDetalleModel->countByDispositivo($codigo);

        echo json_encode($data);
    }

    public function cantidadOrdenesPorNomenclaturaAJAX()
    {
        $codigo = $this->input->post('codigo');
        $data = $this->OrdenDetalleModel->countByNomenclatura($codigo);

        echo json_encode($data);
    }

    public function deleteAJAX()
    {
        $codigo = $this->input->post('codigo');

        $this->DispositivoModel->deleteLogical($codigo);
    }

    public function uploadImage($name_input ,$name_image, $path)
    {
        $config['upload_path'] = $path;
        $config['file_name'] = $name_image;
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '50000';
        //$config['max_width'] = '2000';
        $config['overwrite'] = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if($this->upload->do_upload($name_input)){
            return true;
        }else{
            return false;
        }
    }

}
