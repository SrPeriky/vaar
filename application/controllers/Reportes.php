<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("Reportes_model");
        $this->load->library('Validacion');
    }

    public function index()
    {
        if ($this->validacion->estaconectado()){
            $titulo['titulo'] = 'Reportes';
            $this->load->view('head', $titulo);
            $this->load->view('model');
            $this->load->view('menu');
            $this->load->view('conte');
            //$this->load->view('informe/grafica');
            $this->load->view('informe/select');
            $this->load->view('finConte');
            $this->load->view('pie');
        } else redirect('login');
    }

    private function getHtmlFromSelect($i, $s, $r)
    {

        $vacio ="";
        if ($i==3 || $i == 1) $vacio = "'";
        if ($s!=2) {
            $temp="";
            $res="";
            $temp = ($s==0) ? '<br> se seleccionaron '.count($r).' elementos' : '<br> se seleccionó un elemento' ;
            $x = '';
            if ($s==0) $x = "multiple disabled";
            else if ($s==1) $x = 'onchange="agg(this.value, '.$i.');"';
            foreach ($r as $key)$res = $res . '<option value="'.$vacio.$key->id.$vacio.'">'.utf8_decode(utf8_decode($key->nom)).'</option>';  
            return '<select class="form-control" '.$x.' aria-label="Default select example">'.$res.'</select>'.$temp;
        } else {
            $res = "";
            foreach ($r as $key) $res = $res . '<option value="'.$vacio.$key->id.$vacio.'">'.utf8_decode(utf8_decode($key->nom)).'</option>';   
            return '
                    <div class="row">
                        <div class="col">
                            <select class="form-control" name="res'.$i.'" aria-label="Default select example">'.$res.'
                            </select>
                        </div>
                        <div class="col-auto">
                            <a class="btn shadow btn-success btn-sm" onclick="agregar('.$i.')" role="button">Agregar</a>
                        </div>
                    </div>
                    <!--textarea class="form-control" name="rst'.$i.'" rows="3"></textarea-->
                    ';
        }
    }

    public function getSelect()
    {
        if ($this->validacion->estaconectado()) {
            
            $tipo = intval($this->input->post('tipo'));
            $valor = intval($this->input->post('valor'));
            $v0 = $this->input->post("v0");
            $v1 = $this->input->post("v1");
            $v2 = $this->input->post("v2");
            $v3 = $this->input->post("v3");
            for ($i=0; $i < 4; $i++){
                $rst[$i] = $this->validacion->limpiar($this->input->post('rst'.$i));
                $select[$i] = intval($this->input->post('select'.$i));
            }
            if($tipo == 0) $res = $this->Reportes_model->getPrograma($valor, null);
            if($tipo == 1) $res = $this->Reportes_model->getEstudiante($valor, $v0);
            if($tipo == 2) $res = $this->Reportes_model->getTipoPrueba($valor, $v1);
            if($tipo == 3) $res = $this->Reportes_model->getPrueba($valor, $v1);
            $html = $this->getHtmlFromSelect($tipo, $valor, $res);
            $p="";
            if($valor == 0){
                foreach ($res as $r){
                    if ($tipo == 3 || $tipo == 1){
                        $p = $p."'".$r->id."',"; 
                    } else {
                        $p = (is_numeric($r->id)) ? $p.$r->id."," : $p."'".$r->id."',";
                    }
                }
            } else if($res){
                if ($tipo == 3 || $tipo == 1){
                    $p = $p."'".$res[0]->id."',";
                } else {
                    $p = $res[0]->id.",";
                }
            }
            $p = substr($p, 0, -1);
            if ($p==null) $p="null";
            if ($valor==2) $p="";
            //echo json_encode($this->input->post('tipo'));
            //$html = "ss";
            echo json_encode(array(0 => $html, 1=> $p));
        } else echo json_encode(false); return false;
        //echo json_encode(array(0 => "1", 1 => "2", 2 => "3", 3 => "4"));
    }

    public function calcularVA($saber11, $prueba) {
        if ($this->validacion->estaconectado()){
            $n = count($saber11); // total de elementos
            if ($n<10) return FALSE; // Minino se necesitan 10 datos
            if (count($prueba) != $n) return FALSE; // el total de elementos que hay en $saber11 debe ser igual a la que hay en $prueba
            $sumaSaber11 = array_sum($saber11); 
            $sumaPrueba = array_sum($prueba);
            // variables de: $saber11 * $saber11 y $saber11 * $prueba
            $sumaSaber11porSaber11 = 0; $sumaSaber11porPrueba = 0;
            for ($i=0; $i < $n; $i++) { 
                $sumaSaber11porSaber11 = $sumaSaber11porSaber11 + ($saber11[$i] * $saber11[$i]);
                $sumaSaber11porPrueba = $sumaSaber11porPrueba + ($saber11[$i] * $prueba[$i]);
            }
            $w = (($n * $sumaSaber11porPrueba) - ($sumaSaber11 * $sumaPrueba)) / (($n * $sumaSaber11porSaber11) - ($sumaSaber11 * $sumaSaber11));
            $b = ($sumaPrueba - ($w * $sumaSaber11)) / $n;
            // valor esperado = $w * $saber11[i] + $b
            $va["bueno"] = 0;
            $va["malo"] = 0;
            $va["total"] = $n;
            for ($i=0; $i < $n; $i++){
                $va[$i] = ($prueba[$i] - round($w * $saber11[$i] + $b)); 
                if ($va[$i]<0) $va["malo"]++; else $va["bueno"]++;
            } 
            return $va;
        } else return FALSE;
    }
//1005064537
//1047510748


    /*public function FunctionName($value='')
    {

        $html='
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
            </div>
            <div class="card-body">
                <div class="chart-bar"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myBarChart" width="379" height="320" style="display: block; width: 379px; height: 320px;" class="chartjs-render-monitor"></canvas>
                </div>
                <hr>
                Styling for the bar chart can be found in the
                <code>/js/demo/chart-bar-demo.js</code> file.
            </div>
        </div>
        ';



        return $html;
    }*/


    public function getCalVA()
    {
        if ($this->validacion->estaconectado()){
            $html = "";
            $v0 = /*explode(",", */$this->input->post("v0");//);
            $v1 = /*explode(",", */$this->input->post("v1");//);
            $v2 = explode(",", $this->input->post("v2"));
            $v3 = /*explode(",", */$this->input->post("v3");//);
            for ($i=0; $i < count($v2); $i++) { 
                //$html = $v2[$i];
                $res[$i] = $this->Reportes_model->optenerResultadosDeLaPrueba($v0, $v1, $v2[$i], $v3);
            }
            echo json_encode($html);
        } else require false;
    }


    public function dowload()
    {
        if ($this->validacion->estaconectado()){
            $v0 = /*explode(",", */$this->input->post("v0");//);
            $v1 = /*explode(",", */$this->input->post("v1");//);
            $v2 = explode(",", $this->input->post("v2"));
            $v3 = /*explode(",", */$this->input->post("v3");//);
            //$res = array();
            $arrayVA = array();
            //$data;
            for ($i=0; $i < count($v2); $i++) { 
                //$html = $v2[$i];
                $res = $this->Reportes_model->optenerResultadosDeLaPrueba($v0, $v1, $v2[$i], $v3);
                $va["nom"] = $this->Reportes_model->getNomPrueba(intval($v2[$i]));
                $va["id"] = intval($v2[$i]);
                $saber11["comunicacion_escrita"] = array();
                $saber11["razonamiento_cuantitativo"] = array();
                $saber11["lectura_critica"] = array();
                $saber11["competencias_ciudadanas"] = array();
                $saber11["ingles"] = array();

                $prueba["comunicacion_escrita"] = array();
                $prueba["razonamiento_cuantitativo"] = array();
                $prueba["lectura_critica"] = array();
                $prueba["competencias_ciudadanas"] = array();
                $prueba["ingles"] = array();

                $temp = true;
                for ($o=0; $o < count($res); $o++) { 
                    if ($temp) {
                        # code...
                        array_push($saber11["comunicacion_escrita"], intval($res[$o]->comunicacion_escrita));
                        array_push($saber11["razonamiento_cuantitativo"], intval($res[$o]->razonamiento_cuantitativo));
                        array_push($saber11["lectura_critica"], intval($res[$o]->lectura_critica));
                        array_push($saber11["competencias_ciudadanas"], intval($res[$o]->competencias_ciudadanas));
                        array_push($saber11["ingles"], intval($res[$o]->ingles));
                        $temp = false;
                    } else {
                        array_push($prueba["comunicacion_escrita"], intval($res[$o]->comunicacion_escrita));
                        array_push($prueba["razonamiento_cuantitativo"], intval($res[$o]->razonamiento_cuantitativo));
                        array_push($prueba["lectura_critica"], intval($res[$o]->lectura_critica));
                        array_push($prueba["competencias_ciudadanas"], intval($res[$o]->competencias_ciudadanas));
                        array_push($prueba["ingles"], intval($res[$o]->ingles));
                        $temp = true; 
                    }
                }

                $va["comunicacion_escrita"] = $this->calcularVA($saber11["comunicacion_escrita"], $prueba["comunicacion_escrita"]);
                $va["razonamiento_cuantitativo"] = $this->calcularVA($saber11["razonamiento_cuantitativo"], $prueba["razonamiento_cuantitativo"]);
                $va["lectura_critica"] = $this->calcularVA($saber11["lectura_critica"], $prueba["lectura_critica"]);
                $va["competencias_ciudadanas"] = $this->calcularVA($saber11["competencias_ciudadanas"], $prueba["competencias_ciudadanas"]);
                $va["ingles"] = $this->calcularVA($saber11["ingles"], $prueba["ingles"]);
                array_push($arrayVA, $va);
            }
            $data["arrayVA"] = $arrayVA;
            $titulo['titulo'] = 'Reportes';
            $this->load->view('head', $titulo);
            $this->load->view('model');
            $this->load->view('menu');
            $this->load->view('conte');
            $this->load->view('informe/grafica', $data);
            //$this->load->view('informe/select');
            $this->load->view('finConte');
            $this->load->view('pie');
        } else redirect('login');
    }
}

/*
SELECT estudiante.cc AS cc, estudiante.nombre AS nom, programa.nom AS programa, tipo.nom AS prueba, prueba.comunicacion_escrita, prueba.razonamiento_cuantitativo, prueba.lectura_critica, prueba.competencias_ciudadanas, prueba.ingles FROM programa JOIN estudiante JOIN prueba JOIN tipo ON tipo.id = prueba.id_tipo AND prueba.cc = estudiante.cc AND estudiante.id_programa = programa.id;
 */