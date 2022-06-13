<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getUser()
    {
        $this->db->where('id', intval($this->session->userdata('ID')));
        $this->db->where('id_instituto', intval($this->session->userdata('id_instituto')));
        $query = $this->db->get('usuario');
        return $query->row();
    }
    
    public function setUser($nomAdmin, $apeAdmin, $correo, $telAdmin) {
        $this->db->where('id', intval($this->session->userdata('ID')));
        $this->db->where('id_instituto', intval($this->session->userdata('id_instituto')));
        return $this->db->update('usuario', array('nom' => $nomAdmin, 'ape' => $apeAdmin, 'correo' => $correo, 'tel' => $telAdmin));
    }

    public function getTipoPruebas()
    {
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $query = $this->db->get('tipo');
        return $query->result();
    }

    public function newTipoDePruebas($nomTipoDePrueba, $detallesTipoDePrueba)
    {
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $this->db->insert('tipo', array('id_institucion'=>intval($this->session->userdata('id_instituto')) ,'nom' => $nomTipoDePrueba, 'detalle'=>$detallesTipoDePrueba));
        $sql = 'SELECT LAST_INSERT_ID() AS id;';
        $query = $this->db->query($sql);
        $id = $query->result();
        $id = $id[0]->id;
        return $id;
    }

    public function deleteTipoDePrueba($id)
    {
        $this->db->where("id_tipo", $id);
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $this->db->delete("prueba");

        $this->db->where("id", $id);
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $this->db->delete("tipo");
        return true;
    }
    
    public function setTipoDePruebas($id, $nomTipoDePrueba, $detallesTipoDePrueba)
    {
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $this->db->where('id', $id);
        return $this->db->update('tipo', array('nom' => $nomTipoDePrueba, 'detalle'=>$detallesTipoDePrueba));
    }

    public function getProgrmas()
    {
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $query = $this->db->get('programa');
        return $query->result();
    }

    public function newProgramas($nomProgramas, $codigoProgramas, $detallesProgramas)
    {
        $this->db->insert('programa', array(
            'id_institucion'=>intval($this->session->userdata('id_instituto')) ,
            'nom' => $nomProgramas, 
            'codigo' => $codigoProgramas, 
            'detalles'=>$detallesProgramas)
        );
        $sql = 'SELECT LAST_INSERT_ID() AS id;';
        $query = $this->db->query($sql);
        $id = $query->result();
        $id = $id[0]->id;
        return $id;
    }

    public function deleteProgramas($id)
    {
        
        $sql = "
        DELETE FROM prueba WHERE id_institucion = ".intval($this->session->userdata('id_instituto'))." AND cc IN (SELECT cc FROM estudiante WHERE id_institucion = ".intval($this->session->userdata('id_instituto'))." AND id_programa = ".intval($id).");
        ";
        $query = $this->db->query($sql);
//        $query->result();

        $this->db->where("id_programa", $id);
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $this->db->delete("estudiante");

        $this->db->where("id", $id);
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $this->db->delete("programa");

        return true;
    }

    public function setProgramas($id, $nomProgramas, $codigoProgramas, $detallesProgramas)
    {
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $this->db->where('id', $id);
        return $this->db->update('programa', array(
            'nom' => $nomProgramas, 
            'codigo' => $codigoProgramas, 
            'detalles'=>$detallesProgramas)
        );
    }
}
