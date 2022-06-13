<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pruebas extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Validacion');
        $this->load->library('csvimport');
        $this->load->model("Pruebas_model");
    }

    public function index()
    {
        if ($this->validacion->estaconectado()){
            $titulo['titulo'] = 'Escritorio';
            $data["cursos"] = $this->Pruebas_model->getCursos();
            $data["pruebas"] = $this->Pruebas_model->getPruebas();
            //$data["tabla"] = $this->Pruebas_model->getTabla();
            $this->load->view('head', $titulo);
            $this->load->view('model');
            $this->load->view('menu');
            $this->load->view('pruebas/importar', $data);
            //$this->load->view('pruebas/info');
            $this->load->view('pie');
        } else redirect('login');
    }

    public function import()
    {
        if ($this->validacion->estaconectado()) {
            $fileData = $this->csvimport->get_array($_FILES["csv_file"]["tmp_name"]);
            if ($fileData[0]) $keysFileData = array_keys($fileData[0]);
            
            $tabla = $this->Pruebas_model->newTable($keysFileData, count($keysFileData), $fileData); // crear tabla en la base de datos segun el archivo
            $curso = intval($this->input->post('curso'));
            $tipo = intval($this->input->post('prueba'));
            $result = $this->Pruebas_model->twoRows($curso, $tipo, $tabla);
            $html = $result .' estudiantes registrados de ' .count($fileData). ' pruebas';
            //$html = $this->Pruebas_model->twoRows($fileData);
            echo json_encode($html);
        }
    }

   
}