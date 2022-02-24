<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pruebas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("PerfilModel");
        $this->load->helper(array('form', 'url'));
    }
    /*perfiles*/
    public function index()
    {
        $this->load->view('cabecera');
        $this->load->view('prueba');
        $this->load->view('footer');
    }

    public function prueba_save()
    {
        for ($i=0; $i < 5; $i++) { 
            $count = 1;
            $postName = 'imagen' . $i;
            if(isset($_FILES[$postName])){
                foreach($_FILES[$postName]['tmp_name'] as $key => $tmp_name){
                    if($_FILES[$postName]["name"][$key]) {
                        if($count == 6){
                            break;
                        }
                        $image_name = $_FILES[$postName]["name"][$key];
                        $extencion = $this->obtenerExtensionFichero($image_name);
                        $filename = $postName . '_' . $count++ .'.'. $extencion;
                        $source = $_FILES[$postName]["tmp_name"][$key]; 
                        
                        $directorio = 'assets/images/pruebas'; 
                        
                        if(!file_exists($directorio)){
                            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
                        }
                        
                        $dir=opendir($directorio); 
                        $target_path = $directorio.'/'.$filename;
        
                        if(move_uploaded_file($source, $target_path)) {	
                            echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
                            } else {	
                            echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
                        }
                        closedir($dir); 
                    }
                }
            }
            
        }
    }

    public function prueba_codig()
    {
        $mi_archivo = 'imagenCodig';
        $config['upload_path'] = "assets/images/pruebas";
        $config['file_name'] = "nombre_archivo";
        $config['allowed_types'] = "jpg|png|jpeg";
        $config['max_size'] = "50000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return;
        } 
    }

    public function pruebaAJAX()
    {
        $imagenesNombres = '';
        $count = 1;
        $codigo = rand(1,10000);
        foreach($_FILES["imagen"]['tmp_name'] as $key => $tmp_name){
            if (isset($_FILES['imagen'])) {
                if ($count == 6) {
                    break;
                }
                $image_name = $_FILES['imagen']["name"][$key];
                $extencion = $this->obtenerExtensionFichero($image_name);
                $filename = $codigo . '_' . $count . '.' . $extencion;
                $imagenesNombres .= $filename . ',';
                $source = $_FILES['imagen']["tmp_name"][$key];

                $directorio = 'assets/images/pruebas';

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
                }

                $dir = opendir($directorio);
                $target_path = $directorio . '/' . $filename;

                if (move_uploaded_file($source, $target_path)) {
                    log_message('error', "El archivo $filename se ha almacenado en forma exitosa.");
                } else {
                    log_message('error', "Ha ocurrido un error, por favor inténtelo de nuevo.");
                }
                closedir($dir);
                $count++;
            } else {
                log_message('error', 'NO existe imagen');
            }
        }
    }

    public function prueba2AJAX()
    {
        
        $cant_imagenes = 5;
        $codigo = rand(1,10000);
        $field = $_FILES;
        if(isset($_FILES["imagen"])){
            if(!empty($_FILES["imagen"]["name"])){
                for ($i=0; $i < $cant_imagenes; $i++) { 
                    $_FILES['imagen']['name'] = $field['imagen']['name'][$i];
                    $_FILES['imagen']['type'] = $field['imagen']['type'][$i];
                    $_FILES['imagen']['tmp_name'] = $field['imagen']['tmp_name'][$i];
                    $_FILES['imagen']['error'] = $field['imagen']['error'][$i];
                    $_FILES['imagen']['size'] = $field['imagen']['size'][$i];

                    $uploadPath = 'assets/images/pruebas';
                    $name_image = $codigo . '_' .($i + 1);
                    $config['upload_path'] = $uploadPath;
                    $config['file_name'] = $name_image;
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = '5000';
                    $config['overwrite'] = true;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if($this->upload->do_upload('imagen')){
                        log_message('error', 'se guado la imagen: ' . $name_image);
                        continue;
                    }else{
                        log_message('error', 'no se guardo la imagen');
                    }
                }

            }else{
                echo 'no hay imagenes';
            }
        } else {
            echo 'no existe files';
        }
        // $codigo = rand(1,10000);

        // print_r($_FILES["imagen"]);
        // $uploadPath = 'assets/images/pruebas';
        // $name_image = $codigo;
        // $config['upload_path'] = $uploadPath;
        // $config['file_name'] = $name_image;
        // $config['allowed_types'] = 'jpg|png|jpeg';
        // $config['max_size'] = '50000';
        // $config['overwrite'] = true;

        // $this->load->library('upload', $config);
        // $this->upload->do_upload('imagen'); 
            
    }

    private function obtenerExtensionFichero($str)
    {
        $res = explode(".", $str);
        return end($res);
    }


}
