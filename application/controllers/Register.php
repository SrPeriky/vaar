<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('Validacion');
        $this->load->library('form_validation');
        $this->load->model('Login_model');
    }

    public function index()
    {
        if ($this->validacion->estaconectado()) {
            redirect('home');
        }
        else{
            $titulo['titulo'] = 'Create an Account!';
            $data['departamento'] = $this->Login_model->getDepartamentos();
            $this->load->view('head', $titulo);
            $this->load->view('model');
            $this->load->view('login/register', $data);
            $this->load->view('pie');
        }
    }

    public function select($tipo)
    {
        /*************
         *** tipo  ***
         * municipio
         * institucion
         * direccion
        ***************/
        //if ($this->validacion->estaconectado()) {
            $data['select'] = $this->Login_model->getSelect(intval($this->input->post('id')), $tipo);
            $this->load->view('login/select', $data);
        //}
    }

}