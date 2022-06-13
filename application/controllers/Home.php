<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Instituto_model');
        $this->load->library('Validacion');
    }

    public function index()
    {
        if ($this->validacion->estaconectado()){
            $titulo['titulo'] = 'Escritorio';
            $data['instituto'] = $this->Instituto_model->getById(intval($this->session->userdata('id_instituto')));
            $data['cursos'] = $this->Instituto_model->contCursos(intval($this->session->userdata('id_instituto')));
            $data['pruebas'] = $this->Instituto_model->contPruebas(intval($this->session->userdata('id_instituto')));
            $this->load->view('head', $titulo);
            $this->load->view('model');
            $this->load->view('menu');
            $this->load->view('home/escritorio', $data);
            $this->load->view('home/info', $data);
            $this->load->view('pie');
        } else redirect('login');
    }
}