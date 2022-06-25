<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Password extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Validacion');
    }

    public function index()
    {
        if ($this->validacion->estaconectado()){
            $titulo['titulo'] = 'Escritorio';
            $this->load->view('head', $titulo);
            $this->load->view('model');
            $this->load->view('menu');
            $this->load->view('home');
            $this->load->view('pie');
        } else redirect('login');
    }
}