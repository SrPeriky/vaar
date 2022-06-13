<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tablas extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Validacion');
        $this->load->model("Pruebas_model");
    }

    public function index()
    {
        if ($this->validacion->estaconectado()){
            $titulo['titulo'] = 'Escritorio';
            $data["tabla"] = $this->Pruebas_model->getTabla();
            $this->load->view('head', $titulo);
            $this->load->view('model');
            $this->load->view('menu');
            $this->load->view('pruebas/tabla', $data);
            $this->load->view('pie');
        } else redirect('login');
    }
}


