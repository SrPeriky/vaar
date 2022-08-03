<?PHP
class Validacion{

/*AUTENTICACION */

function estaconectado($variables=NULL,$valores=NULL){
  try {
      $TK=@$_SESSION['TK'];
      if(!isset($_SESSION[$TK])){
         return false;
      }
      if($_SESSION[$TK]!=(MD5($_SESSION['ID'].$_SESSION['NOM']))){
        return false;
      }

    if($variables!=NULL){
      $ses=explode(',',$variables);
      $val=explode(',',$valores);
      $l=sizeof($ses);
      $check=0;
      for($i=0;$i<$l;$i++){
          if(!isset($_SESSION[$ses[$i]])|| $_SESSION[$ses[$i]]!=$val[$i])
          {
            $check++;
          }
      }
      if($check>0){
         return false;
      }
    }
    $now=time();
     if(!isset($_SESSION['expire']))
     {
      return false;
     }
    if($now<$_SESSION['expire']){
      $_SESSION['expire'] = time() + (3600*60);
    }else{
     return false;
    }
    return true;
  } catch (\Throwable $th) {


  }

}

    public function SubirFile($file,$ext=NULL,$size=NULL,$local){
      $directorioSubida=$local;
      $errores = array();
      $respuesta = array();
      $nombreArchivo = $file['name'];
      $filesize = $file['size'];
      $directorioTemp = $file['tmp_name'];
      $tipoArchivo = $file['type'];
      $arrayArchivo = pathinfo($nombreArchivo);
      $extension = $arrayArchivo['extension'];
     if($ext!=null){
        $extensionesValidas=explode(',',$ext);
         // Comprobamos la extensión del archivo
        if(!in_array($extension, $extensionesValidas)){
          $errores[] = "La extensión del archivo no es válida o no se ha subido ningún archivo";
          }
      }

      // Comprobamos el tamaño del archivo
      if($size!=null){
        $max_file_size=$size*1000000;
        if($filesize > $max_file_size){
          $errores[] = "La imagen excede el tamaño de ".$size." MB";
        }
      }

      // Comprobamos y renombramos el nombre del archivo
      $nombreArchivo = $arrayArchivo['filename'];
      $nombreArchivo = preg_replace("/[^A-Z0-9._-]/i", "_", $nombreArchivo);
      $nombreArchivo = $nombreArchivo . rand(1, 1000);
      // Desplazamos el archivo si no hay errores

     if(empty($errores)){
          $nombreCompleto = $directorioSubida.$nombreArchivo.".".$extension;
          move_uploaded_file($directorioTemp, $nombreCompleto);
          $Error='No hay errores';
          $Error.=',Supera el tamaño máximo indicado en php.ini';
          $Error.=',Supera el tamaño máximo indicado en MAX_FILE_SIZE de html';
          $Error.=',Sólo se ha subido el archivo parcialmente';
          $Error.=',No se ha subido ningún archivo';
          $Error.=',Falta la carpeta temporal';
          $Error.=',No se puede escribir en el directorio especificado';
          $Error.=',Una extensión de PHP ha detenido la subida';
          $informeError=explode(',',$Error);


          if($file["error"]==0){

             $respuesta=array("Error"=>0,"NombreFile"=>$nombreCompleto);
          }
          else{
            $identificador=$file["error"];
            $respuesta=array("Error"=>$identificador,"Informe"=>$informeError[$identificador]);
          }

      }

      else{
        $respuesta=array("Error"=>-1,"Informe"=>$errores);
      }
      return json_encode($respuesta);

    }

    function MSG($opcion,$mensaje,$div=NULL){

        if($div==NULL){
          return "<script>dialogo($opcion,'$mensaje');</script>";
        }
        else{
          return "<script>mensaje($opcion,'$mensaje' ,$div);</script>";
        }
    }

    function setUrl($url,$time){
      return "<script>setTimeout(function() { location.href = '$url';}, $time);</script>";
    }

    function offline(){
      return "<script>location.href ='./?c=logout';</script>";
    }

    public function mensaje($id,$msg,$html=NULL){
      $array=array("success"=>$id,"response"=>$msg,"vista"=>$html);
      echo json_encode($array);
      exit;
    }

    function correo_linux($de,$para,$text,$Nombredestinatario,$asunto)
    {
        if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");
              $address = $para;
              $e_subject = $asunto;
              $e_body = $text. PHP_EOL . PHP_EOL;
              $e_reply = '';
              $msg = wordwrap( $e_body . $e_reply, 70 );
              $headers = "From:<".$de.">" . PHP_EOL;
              //$headers .= "Reply-To: $email" . PHP_EOL;
              $headers .= "MIME-Version: 1.0" . PHP_EOL;
              $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
              $headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
             // $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;
             if(mail($address, $e_subject, $msg, $headers)) {
                  $html="Envio realizado a la cuenta $para de ".$Nombredestinatario;
                  return $html;
                }
                else {
                 return 0;
                }
      }



public function igual($n,$nombrecampo,$l=NULL, $t_msg = 1){
   $lg=strlen($n);
   if($lg!=$l){
     $this->mensaje($t_msg,$nombrecampo.' no válido');
   }
}
public function logitud_vector($v,$ck,$input, $t_msg = 1){
      $ln=sizeof($v);
      if($ln<$ck){
        $this->mensaje($t_msg,'minimo '.$ck.' caracteres  del campo'.$input);
      }

}

public function crypto($data)
{   $key="@h4893f@";
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted=openssl_encrypt($data, "aes-256-cbc", $key, 0, $iv);
    // return the encrypted string with $iv joined
    return base64_encode($encrypted."::".$iv);
}

function genkey($length = NULL) {
  if($length==NULL){
    $length = 10;
  }
  return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}

public function decrypto($data)
{   $key="@h4893f@";
    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $key, 0, $iv);
}


  /*Elimina espacios en blanco*/
    public function limpiar($str){
        $str=trim($str);
        $str = stripslashes($str);
        $srt=htmlspecialchars($str);
        return $str;
    }
    /*Convierte la primera a mayuscula*/
    public function  initmayus($str){
      $str=trim($str);
      $str = stripslashes($str);
      $srt=htmlspecialchars($str);
      $str = ucwords($str);
      return $str;
  }
   /*Convierte todo a mayuscula*/
    public function  Upper($str){
      $str=trim($str);
      $str = stripslashes($str);
      $srt=htmlspecialchars($str);
        $str = strtoupper($str);
        return $str;
    }
/*Convierte todo a minuscula*/
    public function lower($str){
      $str=trim($str);
      $str = stripslashes($str);
      $srt=htmlspecialchars($str);
        $str = strtolower($str);

        return $str;
    }
/*verifica la escritura del correo*/
    public function EmailValido($str, $t_msg = 1){
      $str=trim($str);
      $str = strtolower($str);
      if(!filter_var($str,FILTER_VALIDATE_EMAIL)){
            //correo  no valido
            $this->mensaje($t_msg,'Correo no válido ');
          }

    }


     public function EsNombre($str, $t_msg = 1)
        {
                if(!preg_match("/^[A-Za-záéíóúñÑüÁÉÍÓÚÜNIÑOniñoN\sN]*$/",$str))
                {
                  $this->mensaje($t_msg,'Texto no válido ');
                }


        }
        public function EsNumero($str, $t_msg = 1)
        {
                if(!preg_match("/^([0-9])*$/",$str))
                {
                  $this->mensaje($t_msg,'Dato no válido ');
                }
                else{
                    return false;
                }

        }


        function formatMoney($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
          if (is_numeric($number)) { // a number
            if (!$number) { // zero
              $money = ($cents == 2 ? '0.00' : '0'); // output zero
            } else { // value
              if (floor($number) == $number) { // whole number
                $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
              } else { // cents
                $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
              } // integer or decimal
            } // value
            return '$'.$money;
          } // numeric
        } // formatMoney

        function getMeses(){
          $Meses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
       'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
       $array=[];
          for($i=0;$i<12;$i++){
             $d=$i+1;
             if($i<10){
               $d='0'.$d;  
             }
             $array[]=[
               'Dia'=>$d,
               'Mes'=>$Meses[$i],
             ];
           
          }
          return $array;
        }
        public function Esdate($str,$op, $t_msg = 1)
        {
            if($op=="1"){ //fecha y hora
                $regexFecha = '/^([0-2][0-9]|3[0-1])(\/|-)(0[1-9]|1[0-2])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9])$/';
              }
              if($op==2){ // fecha sola
                $regexFecha='/^((([0-9][0-9][0-9][1-9])|([1-9][0-9][0-9][0-9])|([0-9][1-9][0-9][0-9])|([0-9][0-9][1-9][0-9]))-((0[13578])|(1[02]))-((0[1-9])|([12][0-9])|(3[01])))|((([0-9][0-9][0-9][1-9])|([1-9][0-9][0-9][0-9])|([0-9][1-9][0-9][0-9])|([0-9][0-9][1-9][0-9]))-((0[469])|11)-((0[1-9])|([12][0-9])|(30)))|(((000[48])|([0-9][0-9](([13579][26])|([2468][048])))|([0-9][1-9][02468][048])|([1-9][0-9][02468][048]))-02-((0[1-9])|([12][0-9])))|((([0-9][0-9][0-9][1-9])|([1-9][0-9][0-9][0-9])|([0-9][1-9][0-9][0-9])|([0-9][0-9][1-9][0-9]))-02-((0[1-9])|([1][0-9])|([2][0-8])))$/';
                //$regexFecha='^\d{4}([\-/.])(0?[1-9]|1[1-2])\1(3[01]|[12][0-9]|0?[1-9])$';
              }
              if(!preg_match($regexFecha,$str))
              {
                $this->mensaje($t_msg,'Fecha no válida');
              }


        }

        public function eliminar_acentos($cadena){
    
            //Reemplazamos la A y a
            $cadena = str_replace(
            array('Á', 'À', 'Â', 'Ä', 'á', 'à', 'ä', 'â', 'ª'),
            array('A', 'A', 'A', 'A', 'a', 'a', 'a', 'a', 'a'),
            $cadena
            );

            //Reemplazamos la E y e
            $cadena = str_replace(
            array('É', 'È', 'Ê', 'Ë', 'é', 'è', 'ë', 'ê'),
            array('E', 'E', 'E', 'E', 'e', 'e', 'e', 'e'),
            $cadena );

            //Reemplazamos la I y i
            $cadena = str_replace(
            array('Í', 'Ì', 'Ï', 'Î', 'í', 'ì', 'ï', 'î'),
            array('I', 'I', 'I', 'I', 'i', 'i', 'i', 'i'),
            $cadena );

            //Reemplazamos la O y o
            $cadena = str_replace(
            array('Ó', 'Ò', 'Ö', 'Ô', 'ó', 'ò', 'ö', 'ô'),
            array('O', 'O', 'O', 'O', 'o', 'o', 'o', 'o'),
            $cadena );

            //Reemplazamos la U y u
            $cadena = str_replace(
            array('Ú', 'Ù', 'Û', 'Ü', 'ú', 'ù', 'ü', 'û'),
            array('U', 'U', 'U', 'U', 'u', 'u', 'u', 'u'),
            $cadena );

            //Reemplazamos la N, n, C y c
            $cadena = str_replace(
            array('Ñ', 'ñ', 'Ç', 'ç'),
            array('N', 'n', 'C', 'c'),
            $cadena
            );
            
            return $cadena;
          }

}
?>
