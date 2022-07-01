<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getPrograma($tipo, $rst)
    {
        $sql = 'SELECT * FROM programa WHERE id_institucion = '.$this->session->userdata('id_instituto');
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getEstudiante($tipo, $rst)
    {
        $where=' WHERE id_institucion = '.$this->session->userdata('id_instituto');
        //if ($tipo !=0) 
            $where = $where . ' AND id_programa IN ('.$rst.')';
        $sql = 'SELECT *, cc AS id, nombre AS nom  FROM estudiante '.$where;
        //echo json_encode($sql);
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTipoPrueba($tipo, $rst)
    {
        //$where=; 177;
        //if ($tipo !=0) 
            //$where = $where . ' AND id_programa IN ('.$rst.')';
        $sql = 'SELECT * FROM tipo WHERE tipo.id != 0 AND tipo.id IN (SELECT id_tipo FROM prueba WHERE prueba.cc IN ('.$rst.'));';
        //$sql = 'SELECT * FROM tipo WHERE id_institucion IS NULL OR id_institucion = '.$this->session->userdata('id_instituto');
        //echo json_encode($sql);
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getPrueba($tipo, $rst)
    {
        //$where=' WHERE id_institucion = '.$this->session->userdata('id_instituto');
        //if ($tipo !=0) $where = $where . ' AND id_programa IN ('.$rst.')';
        $sql = 'SELECT *, periodo AS nom, periodo AS id FROM prueba WHERE prueba.cc IN ('.$rst.') AND id_institucion = '.$this->session->userdata('id_instituto').' GROUP BY periodo;';
        //$sql = 'SELECT * FROM prueba '.$were;
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function optenerResultadosDeLaPrueba($v0, $v1, $v2, $v3)
    {
        $sql = 'SELECT estudiante.cc AS cc, prueba.periodo AS periodo, prueba.registro AS re, estudiante.nombre AS nom, programa.nom AS programa, tipo.nom AS prueba, prueba.c1, prueba.c2, prueba.c3, prueba.c4, prueba.c5 FROM programa JOIN estudiante JOIN prueba JOIN tipo ON tipo.id IN (0,'.$v2.') AND prueba.cc = estudiante.cc AND estudiante.cc IN ('.$v1.') AND estudiante.id_programa = programa.id AND programa.id IN ('.$v0.') AND prueba.periodo IN ('.$v3.') GROUP BY cc, prueba;';
        //$sql = 'SELECT * FROM tipo WHERE id_institucion IS NULL OR id_institucion = '.$this->session->userdata('id_instituto');
        //echo json_encode($sql);
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    public function getNomPrueba($id){
        $this->db->select('nom');
        $this->db->where('id', $id);
        $query = $this->db->get('tipo');
        $tem = $query->row();
        return $tem->nom;
    }
}