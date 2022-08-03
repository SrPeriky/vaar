<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('Validacion');
        $this->load->model("User_model");
    }

    public function index()
    {
        if ($this->validacion->estaconectado()){
            $titulo['titulo'] = 'Usuario';
            $dataUser['user'] = $this->User_model->getUser();
            $dataPruebas['tipoPruebas'] = $this->User_model->getTipoPruebas();
            $dataProgrmas['progrmas'] = $this->User_model->getProgrmas();
            $this->load->view('head', $titulo);
            $this->load->view('model');
            $this->load->view('menu');
            $this->load->view('conte');
            $this->load->view('usuario/perfil', $dataUser);
            $this->load->view('usuario/pruebas', $dataPruebas);
            $this->load->view('usuario/programas', $dataProgrmas);
            $this->load->view('finConte');
            $this->load->view('pie');
        } else redirect('login');
    }

    public function editUser()
    {
        if ($this->validacion->estaconectado()) {
            $nomAdmin = $this->validacion->limpiar($this->input->post('nomAdmin'));
            $apeAdmin = $this->validacion->limpiar($this->input->post('apeAdmin'));
            $correo = $this->validacion->limpiar($this->input->post('correoAdmin'));
            $telAdmin = $this->validacion->limpiar($this->input->post('telAdmin'));
            $this->validacion->EsNombre($nomAdmin, 6);
            if($nomAdmin=="") $this->validacion->mensaje(6,'Nombre no válido');
            $this->validacion->EsNombre($apeAdmin, 6);
            if($apeAdmin=="") $this->validacion->mensaje(6,'Apellido no válido');
            $this->validacion->EmailValido($correo, 6);
            if($correo=="") $this->validacion->mensaje(6,'Correo no válido');
            $this->validacion->EsNumero($telAdmin, 6);
            if($telAdmin=="" || strlen($telAdmin) != 10) $this->validacion->mensaje(6,'Telefono no válido');
            if ($this->User_model->setUser($nomAdmin, $apeAdmin, $correo, $telAdmin))
                $this->validacion->mensaje(3,'Guardado correctamente');
            else
                $this->validacion->mensaje(6,'Error en la base de datos');
        }
    }

    public function tiposDePruebasSubmit()
    {
        if ($this->validacion->estaconectado()) {
            $nomTipoDePrueba = $this->validacion->limpiar($this->input->post('nomTipoDePrueba'));
            $detallesTipoDePrueba = $this->validacion->limpiar($this->input->post('detallesTipoDePrueba'));
            if($nomTipoDePrueba=="") $this->validacion->mensaje(6,'Nombre no válido');
            $id = $this->User_model->newTipoDePruebas($nomTipoDePrueba, $detallesTipoDePrueba);
            if($id) echo json_encode(array('success'=>3,'response'=>'Registro exitoso', 'nom' => $nomTipoDePrueba, 'des'=>$detallesTipoDePrueba,'num'=>$id));
        }
    }

    public function trashTipoDePrueba()
    {
        if ($this->validacion->estaconectado()) {
            $id = $this->validacion->limpiar($this->input->post('id'));
            $this->validacion->EsNumero($id);
            if($this->User_model->deleteTipoDePrueba($id)) echo json_encode(array('success'=>3,'response'=>'Removido exitosamente'));
        }
    }

    public function editTipoDePrueba()
    {
        if ($this->validacion->estaconectado()) {
            $nomTipoDePrueba = $this->validacion->limpiar($this->input->post('nomTipoDePrueba'));
            $detallesTipoDePrueba = $this->validacion->limpiar($this->input->post('detallesTipoDePrueba'));
            if($nomTipoDePrueba=="") $this->validacion->mensaje(6,'Nombre no válido');
            $id = $this->input->post('idTipoDePrueba');
            $this->validacion->EsNumero($id);
            if($this->User_model->setTipoDePruebas($id, $nomTipoDePrueba, $detallesTipoDePrueba)) echo json_encode(array('success'=>3,'response'=>'Editado con exitoso'));
        }
    }

    public function programasSubmit()
    {
        if ($this->validacion->estaconectado()) {
            $nomProgramas = $this->validacion->limpiar($this->input->post('nomProgramas'));
            $codigoProgramas = $this->validacion->limpiar($this->input->post('codigoProgramas'));
            $detallesProgramas = $this->validacion->limpiar($this->input->post('detallesProgramas'));
            if($nomProgramas=="") $this->validacion->mensaje(6,'Nombre no válido');
            if($codigoProgramas=="") $this->validacion->mensaje(6,'Codigo no válido');
            $id = $this->User_model->newProgramas($nomProgramas, $codigoProgramas, $detallesProgramas);
            if($id) echo json_encode(array('success'=>3,'response'=>'Registro exitoso', 'nom' => $nomProgramas, 'cod' => $codigoProgramas, 'des'=>$detallesProgramas,'num'=>$id));
        }
    }

    public function trashProgramas()
    {
        if ($this->validacion->estaconectado()) {
            $id = $this->validacion->limpiar($this->input->post('id'));
            $this->validacion->EsNumero($id);
            if($this->User_model->deleteProgramas($id)) echo json_encode(array('success'=>3,'response'=>'Removido exitosamente'));
        }
    }

    public function editProgramas()
    {
        if ($this->validacion->estaconectado()) {
            $nomProgramas = $this->validacion->limpiar($this->input->post('nomProgramas'));
            $codigoProgramas = $this->validacion->limpiar($this->input->post('codigoProgramas'));
            $detallesProgramas = $this->validacion->limpiar($this->input->post('detallesProgramas'));
            if($nomProgramas=="") $this->validacion->mensaje(6,'Nombre no válido');
            if($codigoProgramas=="") $this->validacion->mensaje(6,'Codigo no válido');
            $id = $this->input->post('idProgramas');
            $this->validacion->EsNumero($id);
            if($this->User_model->setProgramas($id, $nomProgramas, $codigoProgramas, $detallesProgramas)) echo json_encode(array('success'=>3,'response'=>'Editado con exitoso'));
        }
    }
}