<style type="text/css">
    body{
        background-color: #f7f7f7;
    }
</style>
<div class="container-fluid">
    <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5 " >
                    <div class="card-body p-5">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <form  autocomplete="off"  method="post" id="datos" enctype="multipart/form-data" onsubmit="guardar();return false;">
                                    <div id="mgs"></div>
                                    <div class="p-2">
                                        <h3>Datos de la universidad </h3>
                                        <div class="form-group">
                                            <label class="form-label">Departamento</label>
                                            <select id="departamento" name="departamento" class="form-control" aria-label="Default select example" onchange="selet(this.value, 'municipio', 'Municipio', 1);">
                                              <option value="" selected>Departamento</option>
                                              <?php foreach($departamento AS $d): ?>
                                                <option value="<?php echo $d->id; ?>"><?php echo $d->nom ?></option>
                                            <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Municipio</label>
                                            <select id="municipio" name="municipio" disabled="" class="form-control" aria-label="Default select example"  onchange="selet(this.value, 'institucion', 'Instituciòn', 2);">
                                              <option value="" selected>Municipio</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Instituciòn</label>
                                            <select id="institucion" name="institucion" disabled="" class="form-control" aria-label="Default select example"  onchange="selet(this.value, 'direccion', 'Direcciòn', 3);">
                                              <option value="" selected>Instituciòn</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Direcciòn</label>
                                            <select id="direccion" name="direccion" disabled="" class="form-control" aria-label="Default select example">
                                              <option value="" selected>Direcciòn</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="p-2">
                                        <h3>Datos del administrador</h3>
                                        <div class="form-group">
                                            <label class="form-label">Nombre</label>
                                            <input type="text" class="form-control " name="nomAdmin" aria-describedby="emailHelp" placeholder="Nombre">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Apellido</label>
                                            <input type="text" class="form-control " name="apeAdmin" aria-describedby="emailHelp" placeholder="Apellido">
                                        </div><div class="form-group">
                                            <label class="form-label">Correo</label>
                                            <input type="text" class="form-control " name="correoAdmin" aria-describedby="emailHelp" placeholder="Correo">
                                        </div><div class="form-group">
                                            <label class="form-label">Telefono</label>
                                            <input type="text" class="form-control " name="telAdmin" aria-describedby="emailHelp" placeholder="Telefono">
                                        </div><div class="form-group">
                                            <label class="form-label">Clave</label>
                                            <input type="password" class="form-control " name="claveAdmin1" aria-describedby="emailHelp" placeholder="Clave">
                                        </div><div class="form-group">
                                            <label class="form-label">Clave</label>
                                            <input type="password" class="form-control " name="claveAdmin2" aria-describedby="emailHelp" placeholder="Repita la clave">
                                        </div>
                                        <div class="form-group">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check card-text">
                                                    <input class="form-check-input" checked name="terCond" type="checkbox">
                                                    <label class="form-check-label" for="p2">
                                                        Acepto los <a href="#" onclick="terminos();">terminos de uso</a>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <input type="submit" class="btn btn-primary btn-sm" value="Guardar">
                                            </div>
                                        </div>
                                        <hr>
                                        <!--div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                        </div-->
                                        <div class="text-center">
                                            <a class="small" href="<?php echo base_url(); ?>login">Login!</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
    <!-- FIN Outer Row -->

</div>
<script type="text/javascript">
    var noms = [
        "Departamento",
        "Municipio",
        "Instituciòn",
        "Direcciòn"
    ];
    //
    function guardar() {
      var parametros = new FormData($('#datos')[0]);
  
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>login/save',
            cache: false,
            mimeType: 'text/html; charset=utf-8',
            method: 'POST',
            async: true,
            data: parametros,
            contentType:false,
            processData:false,
            dataType: 'json',
            success: function(respuesta) {
              if(parseInt(respuesta.success)==3){
                $('#Modal').modal('hide');
                $('#Mbody').html('');
                  location.href = (respuesta.vista);
              }else{
                dialogo((respuesta.success + 5), respuesta.response,'mgs');
              }
          },
          error: function(jqXHR, textStatus, errorThrown) {
              dialogo(7,'ERROR');
          }
      });
     
    }
 
    function selet(e, id, nom, x){
        let selet = document.getElementsByTagName("select");
        for (var i = x+1; i < selet.length; i++){
            selet[i].innerHTML = '<option value="" selected>'+noms[i]+'</option>';
            selet[i].setAttribute("disabled", "disabled");
        }
        if (parseInt(e)) {
             $.ajax({
                type: "POST",
                dataType: 'html',
                url: '<?php echo base_url(); ?>register/select/'+id,
                cache: false,
                data: "id="+e,
                success: function(respuesta)
                {
                    $('#'+id).html(respuesta);
                    document.getElementById(id).removeAttribute("disabled");
                    
                }
              });
        } else {
            $('#'+id).html('<option value="" selected>'+nom+'</option>');
            document.getElementById(id).setAttribute("disabled", "disabled");
        }
    }
</script>