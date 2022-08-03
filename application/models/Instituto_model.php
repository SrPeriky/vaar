<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Instituto_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getById($id){
        $this->db->where('id', $id);
        $query = $this->db->get('institucion');
        return $query->row();
    }    
    
    public function contCursos($id){
        $this->db->select('id');
        $this->db->where('id_institucion', $id);
        $query = $this->db->get('programa');
        return count($query->result());
    }

    public function contPruebas($id){
        $this->db->select('id');
        $this->db->where('id_institucion', $id);
        $this->db->group_by('periodo');
        $query = $this->db->get('prueba');
        return count($query->result());
    }
}
