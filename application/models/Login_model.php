<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function chackIntitucion($id, $depa, $muni, $dir)
    {
        $this->db->where('id',$id);
        $this->db->where('id_departamento',$depa);
        $this->db->where('id_municipio',$muni);
        $this->db->where('direccion ',$dir);
        //$this->db->where('activo', 1);
        $query = $this->db->get('institucion');
        return $query->row();
    }

    function iniciarSesion($correo, $clave){
        $this->db->where('correo',$correo);
        $this->db->where('clave',$clave);
        $query = $this->db->get('usuario');
        return $query->row();
    }

    function chackEmail($correo){
        $this->db->where('correo',$correo);
        $this->db->select('correo');
        $query = $this->db->get('usuario');
        return $query->row();
    }

    function getDepartamentos(){
        $this->db->order_by('nom', 'ASC');
        $query = $this->db->get('departamento');
        return $query->result();
    }

    function getSelect($id, $tipo){
        $this->db->order_by('nom', 'ASC');
        switch ($tipo) {
            case 'municipio':
                $this->db->where('id_departamento ',$id);
                $query = $this->db->get('municipio');
                break;

            case 'institucion':
                $this->db->where('id_municipio ',$id);
                $query = $this->db->get('institucion');
                break;

            case 'direccion':
                $this->db->where('id',$id);
                //$this->db->where('activo', 1);
                $this->db->select('direccion AS `nom`');
                $this->db->select('direccion AS `id`');
                $query = $this->db->get('institucion');
                break;
            
            default:
                // code...
                break;
        }
        
        return $query->result();
    }

    private function ciudad($id){
        $this->db->where('id',$id);
        $query = $this->db->get('ciudad');
        $c =  $query->row();
        return $c->nom;
    }

    private function departamento($id){
        $this->db->where('id',$id);
        $query = $this->db->get('departamento');
        $c =  $query->row();
        return $c->nom;
    }

    function registrar($id_instituto, $nomAdmin, $apeAdmin, $correo, $telAdmin, $clave) {
        $this->db->where('id',$id_instituto);
        $this->db->update('institucion', array('activo' => 0));
        // Usuario - Administrador
        $data = array(
            'id_instituto' => $id_instituto,
            'id_rol' => 1, // root
            'nom' => $nomAdmin,
            'ape' => $apeAdmin,
            'tel' => $telAdmin,
            'correo' => $correo,
            'clave' => $clave
        ); 
        $save = $this->db->insert('usuario', $data);
        return $save;
    }
}