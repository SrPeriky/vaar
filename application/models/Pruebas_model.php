<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pruebas_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function getCursos(){
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $query = $this->db->get('programa');
        return $query->result();
    }

    public function getPruebas(){
        $this->db->where('id_institucion', intval($this->session->userdata('id_instituto')));
        $this->db->or_where('id_institucion', null);
        $query = $this->db->get('tipo');
        return $query->result();
    }

    public function getTabla()
    {
        $sql = 'SELECT tipo.nom AS tipo, programa.nom AS programa, prueba.periodo AS periodo FROM prueba JOIN estudiante JOIN programa JOIN tipo ON programa.id_institucion = '.intval($this->session->userdata('id_instituto')).' AND tipo.id = prueba.id_tipo AND estudiante.cc = prueba.cc AND programa.id = estudiante.id_programa GROUP BY periodo, programa, tipo';
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getIdDepa($nom){
        $this->db->where('nom',$nom);
        $query = $this->db->get('departamento');
        $c =  $query->row();
        return intval($c->id);
    }

    public function getIdMuni($nom){
        $this->db->where('nom',$nom);
        $query = $this->db->get('municipio');
        $c =  $query->row();
        return intval($c->id);
    }

    public function newTable($keysFill=null, $cont = 0, $file)
    {
        /*****************
         *  Crear tabla **
         * **************/
        $this->load->dbforge();

        
        $fields['id'] = array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
        );
        for ($i=0; $i < $cont; $i++) { 
            $fields[str_replace(" ", "_", $keysFill[$i])] = array(
                    'type' => 'VARCHAR',
                    'constraint' => '250'
            );
        }
        
        $this->dbforge->add_key('id',true);
        $this->dbforge->add_field($fields);
        $nom = "p".date('YmdHis');
        $attributes = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table($nom, true,$attributes);
        $this->db->insert_batch($nom, $file);
        return $nom;
    }

    public function twoRows($curso, $tipo, $tabla)
    {
        //"REGISTRO,""PERIODO"",""IDENTIFICACION"",""NOMBRE"",""COMUNICACION_ESCRITA"",""RAZONAMIENTO_CUANTITATIVO"",""LECTURA_CRITICA"",""COMPETENCIAS_CIUDADANAS"",""INGLES"",""NIVEL"""
        $query = $this->db->get($tabla);
        $temp = $query->result();
        $estudiantes = array();
        $pruebas = array();
        $cc = array();

        foreach ($temp as $key) {
            if (trim($key->IDENTIFICACION)!='' && ! in_array($key->IDENTIFICACION, $cc)) {
                array_push($estudiantes, array(
                    'id_institucion' => intval($this->session->userdata('id_instituto')),
                    'id_programa' => intval($curso),
                    'cc' => $key->IDENTIFICACION,
                    'anno' => '',
                    'nombre' => utf8_encode($key->NOMBRE),
                    'telefono' => '',
                    'correo' => ''
                ));
                array_push($cc, $key->IDENTIFICACION);
                array_push($pruebas, array(
                    'id_tipo' => intval($tipo),
                    'id_institucion' => intval($this->session->userdata('id_instituto')),
                    'cc' => $key->IDENTIFICACION,
                    'registro' => $key->REGISTRO,
                    'periodo' => $key->PERIODO,
                    'comunicacion_escrita' => $key->COMUNICACION_ESCRITA,
                    'razonamiento_cuantitativo' => $key->RAZONAMIENTO_CUANTITATIVO,
                    'lectura_critica' => $key->LECTURA_CRITICA,
                    'competencias_ciudadanas' => $key->COMPETENCIAS_CIUDADANAS,
                    'ingles' => $key->INGLES,
                    'nivel' => $key->NIVEL 
                    //'nivel' => (intval(strlen($key->NIVEL)) == 2 ) ? $key->NIVEL : '' 
                ));
            }

        } 
        if(intval($tipo==0)) $this->db->insert_batch('estudiante', $estudiantes); // si es pruebas saber 11 se registra el estudiante
        $this->db->insert_batch('prueba', $pruebas);
        $this->load->dbforge();
        $this->dbforge->drop_table($tabla);
        return count($pruebas);
    }

    function insert($nom, $file)
    {
        
        $data = array(
            'id_instituto' => intval($this->session->userdata('id_instituto')),
            'nom' => $nom
        ); $this->db->insert('temp', $data);
        /*$sql = 'SELECT LAST_INSERT_ID() AS id;';
        $query = $this->db->query($sql);
        $id = $query->result();
        $id = $id[0]->id;*/
        return $this->db->insert_id();
    }
}