<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Error_404 extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Validacion');
    }

    public function index()
    {
        $r = 'login';
        if ($this->validacion->estaconectado()) $r = 'home';
        $titulo['titulo'] = 'Página no encontrada';
        $data['ruta'] = $r;
        $this->load->view('head', $titulo);
        $this->load->view('404', $data);
        $this->load->view('pie');
    }
}