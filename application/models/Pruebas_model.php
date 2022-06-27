<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pruebas_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->library('Validacion');
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

        $l = 0;
        $arrayName = array(0 => 'c1', 1 => 'c2', 2 => 'c3', 3 => 'c4', 4 => 'c5');
        $indices = array(0 => 'REGISTRO', 1 => 'PERIODO', 2 => 'IDENTIFICACION', 3 => 'NOMBRE', 4 => 'id');
        $temResult = array();

        $fields['id'] = array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
        );

        for ($i=0; $i < $cont; $i++) { 
            $temNom = str_replace(" ", "_", $keysFill[$i]);
            $temExis = true;
            $fields[$temNom] = array(
                    'type' => 'VARCHAR',
                    'constraint' => '250'
            );
            // preg_match("/{$search}/i", $mystring)
            for ($u=0; $u < count($indices); $u++){
                $search = $indices[$u];
                if (preg_match("/{$search}/i", $temNom)) {
                    $temExis = false;
                    break;
                }/* else {
                    array_push($temResult, $temNom);
                    echo $temNom."<br><br>"; 
                }*/
            }

            if ($temExis) {
                array_push($temResult, $temNom);
                //echo $temNom."<br><br>"; 
            }
        }
        
        $this->dbforge->add_key('id',true);
        $this->dbforge->add_field($fields);
        $nom = "p".date('YmdHis');
        $attributes = array('ENGINE' => 'InnoDB');
        $this->dbforge->create_table($nom, true,$attributes);
        $this->db->insert_batch($nom, $file);

        $sql = 'ALTER TABLE ' . $nom .' CHANGE ';
        for ($i=0; $i < count($arrayName); $i++) { 
            $consult = $sql . ' ' . $temResult[$i] . ' ' . $arrayName[$i] . ' VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;';
            $query = $this->db->query($consult);
            //$query->result();
        }

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
            if ($key->IDENTIFICACION!='' && ! in_array($key->IDENTIFICACION, $cc)) {
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
                    'c1' => $key->c1, // Competencia comunicacion_escrita - saber pro lectura_critica - saber 11
                    'c2' => $key->c2, // competencia 2 razonamiento_cuantitativo - saber pro matematicas - saber 11
                    'c3' => $key->c3, // competencia 3 lectura_critica saber pro sociales_y_ciudadanas - saber 11
                    'c4' => $key->c4, // Competencia 4 competencias_ciudadanas - saber pro ciencias_naturales - saber 11    
                    'c5' => $key->c5  // competencia 5 ingles - saber pro ingles - saber 11
                    //'nivel' => $key->NIVEL 
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