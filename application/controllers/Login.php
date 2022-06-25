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
        // si está conectado, redirigir a home
        if ($this->validacion->estaconectado()) {
            redirect('home');
        }
        else{ // si no está conectado, mostrar las vistas de Logueo
            $titulo['titulo'] = 'Login'; // titulo que se muesntra en el head del html
            $this->load->view('head', $titulo);
            $this->load->view('login/login');
            $this->load->view('pie');
        }
    }

    private function newSession($login)
    {
        if ($login) { // si existe $login, quiere decir que existe ese usuario registrado en la base de datos
            /*******************************
            ** CREAR VARIEBLES DE SESSION **
            *******************************/
            $TK = md5(date('Y-m-d H:i:s')); // Token unico para cada usuario que inicie sesion
            $t = time(); // tiempo
            $id = $login->id; // el ID del usuario que ingresó
            $id_instituto = $login->id_instituto; // ID de la institucion a la cual pertenece este usuario
            $nom = $login->nom; // Nombre de la del usuario
            $rol = $login->id_rol; // ROl del usuario

            // CREAR UN ARRAY CON LAS VARIABLES DE SESSION
            $usuario_data = array('time' => $t, 'expire' => ($t + (3600*4600*5600*6600)), 'TK' => $TK, $TK => MD5($id.$nom), 'ID' => $id, 'id_instituto' => $id_instituto, 'NOM' => $nom, 'ROL' => $rol);

            // CREAR LA SESSION
            $this->session->set_userdata($usuario_data);

            // SESION EXITOSA
            return array(
                0 => 3, // Tipo De Alerta que se le va a mostrar al usuario (revisar: /assets/js/msg.js)
                1 => 'login!', // Mensaje para la alerta que le mostrará al usuario
                2 => 'home' // Vista a la cual el usuario será redirigido
            ); 
        } else{ // quiere decir que el usuario no fue encontrado en la base de datos
            return array(
                0 => 7, // Tipo De Alerta que se le va a mostrar al usuario (revisar: /assets/js/msg.js)
                1 => 'Usuario no encontrado!', // Mensaje para la alerta que le mostrará al usuario
                2 => null // Vista a la cual el usuario será redirigido
            );
        }
    }

    public function login()
    {
        if (!$this->validacion->estaconectado()) { // No debe existir ninguna sesion activa

            $correo = $this->input->post('correo'); // optener dato del campo correo por medio de POST
            $clave = $this->input->post('clave'); // optenr datos de la clave por medio de POST
            $this->validacion->limpiar($correo); // Limpiar la variable para que no tenga espacios al principio y al final
            $clave=$this->validacion->limpiar($clave); // Limpiar la clave para que no tenga espacios en blanco al principio y al final
            $this->validacion->EmailValido( // vereficar que el dato de $correo realmente sea un correo
                $correo, // correo limpio
                7 // Tipo De Alerta que se le va a mostrar al usuario (revisar: /assets/js/msg.js)
            ); 
            $clave=md5($clave); // encriptar clave del usuario

            // verificar que los datos introducidos por el usuario existan en la base de datos
            $login = $this->Login_model->iniciarSesion($correo, $clave); // se hace una consulta
            $result = $this->newSession($login); // crear una Sesion Nueva
            $this->validacion->mensaje( // Mostrar mensaje al usuariom
                $result[0], // Tipo De Alerta que se le va a mostrar al usuario (revisar: /assets/js/msg.js)
                $result[1], // Mensaje para la alerta que le mostrará al usuario
                $result[2]  // Vista a la cual el usuario será redirigido
            ); 
        }
    }


    public function logout(){ // Metodo para cerrar la session
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
        // no sé como funciona
        // al final de cerrar sesion redirige al Login
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