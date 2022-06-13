<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
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
            $titulo['titulo'] = 'Login';
            $this->load->view('head', $titulo);
            $this->load->view('login/login');
            $this->load->view('pie');
        }
    }

    private function newSession($login)
    {
        if ($login) {
            $TK = md5(date('Y-m-d H:i:s'));
            $t = time();
            $id = $login->id;
            $id_instituto = $login->id_instituto;
            $nom = $login->nom;
            $rol = $login->id_rol;
            $usuario_data = array('time' => $t, 'expire' => ($t + (3600*4600*5600*6600)), 'TK' => $TK, $TK => MD5($id.$nom), 'ID' => $id, 'id_instituto' => $id_instituto, 'NOM' => $nom, 'ROL' => $rol);
            $this->session->set_userdata($usuario_data);
            return array(0 => 3, 1 => 'login!', 2 => 'home');
        } else{
            return array(0 => 7, 1 => 'Usuario no encontrado!', 2 => null);
        }
    }

    public function login()
    {
        if (!$this->validacion->estaconectado()) {
            $correo = $this->input->post('correo');
            $clave = $this->input->post('clave');
            $this->validacion->limpiar($correo);
            $clave=$this->validacion->limpiar($clave);
            $this->validacion->EmailValido($correo, 7);
            $clave=md5($clave);
            $login = $this->Login_model->iniciarSesion($correo, $clave);
            $result = $this->newSession($login);
            $this->validacion->mensaje($result[0], $result[1], $result[2]);
        }
    }

    public function logout(){
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header("Status: 301 Moved Permanently");
        redirect('login');
    }

    public function save()
    {
        if (!$this->validacion->estaconectado()) {
            /**********************
            ** RECIBIR LOS DATOS **
            **********************/
            $departamento = $this->validacion->limpiar($this->input->post('departamento'));
            $municipio = $this->validacion->limpiar($this->input->post('municipio'));
            $institucion = $this->validacion->limpiar($this->input->post('institucion'));
            $direccion = $this->validacion->limpiar($this->input->post('direccion'));

            // Admin
            $nomAdmin = $this->validacion->limpiar($this->input->post('nomAdmin'));
            $apeAdmin = $this->validacion->limpiar($this->input->post('apeAdmin'));
            $correo = $this->validacion->limpiar($this->input->post('correoAdmin'));
            $telAdmin = $this->validacion->limpiar($this->input->post('telAdmin'));
            $claveAdmin1 = $this->validacion->limpiar($this->input->post('claveAdmin1'));
            $claveAdmin2 = $this->validacion->limpiar($this->input->post('claveAdmin2'));
            $terCond = $this->validacion->limpiar($this->input->post('terCond'));

            /********************
            ** VEREFICAR DATOS **
            ********************/
            $this->validacion->EsNumero($departamento);
            $this->validacion->EsNumero($municipio);
            $this->validacion->EsNumero($institucion);

            if($departamento=="") $this->validacion->mensaje(1,'Departamento no válido');
            if($municipio=="") $this->validacion->mensaje(1,'Municipio no válido');
            if($institucion=="") $this->validacion->mensaje(1,'Institución no válido');
            if($direccion=="") $this->validacion->mensaje(1,'Dirección no válida');

            $this->validacion->EsNombre($nomAdmin);
            if($nomAdmin=="") $this->validacion->mensaje(1,'Nombre no válido');
            $this->validacion->EsNombre($apeAdmin);
            if($apeAdmin=="") $this->validacion->mensaje(1,'Apellido no válido');
            $this->validacion->EsNumero($telAdmin);
            if($telAdmin=="" || strlen($telAdmin) != 10) $this->validacion->mensaje(1,'Telefono no válido');
            $this->validacion->EmailValido($correo);
            if ($claveAdmin1 != $claveAdmin2 || $claveAdmin1=="" || strlen($claveAdmin1) < 8) $this->validacion->mensaje(1,'Clave no válida');
            if ($terCond != "on") $this->validacion->mensaje(1,'Acepte los terminos de uso');
            if (!$this->Login_model->chackIntitucion(intval($institucion), intval($departamento), intval($municipio), $direccion)) $this->validacion->mensaje(1,'institución no valida');
            if ($this->Login_model->chackEmail($correo)) $this->validacion->mensaje(1,'Correo de usuario ya existe');

            /******************
            ** GUARDAR DATOS **
            ******************/
            $clave=md5($claveAdmin1);
            $save = $this->Login_model->registrar(
                $institucion,
                $nomAdmin,
                $apeAdmin,
                $correo,
                $telAdmin,
                $clave
            ); if (!$save) $this->validacion->mensaje(0,'Error de registro');

            /*****************
            ** CREAR SESION **
            *****************/
            $login = $this->Login_model->iniciarSesion($correo, $clave);
            $result = $this->newSession($login);
            $this->validacion->mensaje($result[0], $result[1], $result[2]);
        }
    }
}