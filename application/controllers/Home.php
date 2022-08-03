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
            /***********************
            ** DECLARAR VARIABLES **
            ***********************/
            $titulo['titulo'] = 'Escritorio'; // titulo que se muesntra en el head del html
            $data['instituto'] = $this->Instituto_model->getById(intval($this->session->userdata('id_instituto'))); // optener datos de la institucion por su ID
            $data['cursos'] = $this->Instituto_model->contCursos(intval($this->session->userdata('id_instituto'))); // optener cantidad de cursos con los que cuenta la institucio 
            $data['pruebas'] = $this->Instituto_model->contPruebas(intval($this->session->userdata('id_instituto'))); // optener la cantidad de pruebas registradas por la institucion
            
            /*******************
            ** MOSTRAR VISTAS **
            *******************/
            $this->load->view('head', $titulo); // pasar datos del titulo a la vista head
            $this->load->view('model');
            $this->load->view('menu');
            $this->load->view('home/escritorio', $data);
            $this->load->view('home/info', $data);
            $this->load->view('pie');
        } else redirect('login');
    }
}