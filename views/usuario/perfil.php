<div class="card shadow mb-4">
  <div class="card-body">
    <form autocomplete="off"  method="post" id="datosadmin" enctype="multipart/form-data" onsubmit="perfilSubmit(this); return false;"> 
      <div class="row">
        <div class="col-12">
          <div class="row p-3">
            <div class="col">
              <h5 class="card-title">Información del usuario</h5>
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-user-edit"></i></button>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group row">
            <label for="nomUser" class="col-sm-3 col-form-label">Nombre:</label>
            <div class="col-sm-9">
              <input type="text" readonly name="nomAdmin" class="form-control-plaintext" id="nomAdmin" value="<?php echo $user->nom; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="correoUser" class="col-sm-3 col-form-label"> Telefono:</label>
            <div class="col-sm-9">
              <input type="text" readonly name="telAdmin" class="form-control-plaintext" id="telAdmin" value="<?php echo $user->tel; ?>">
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="form-group row">
            <label for="apeUser" class="col-sm-3 col-form-label">Apellido:</label>
            <div class="col-sm-9">
              <input type="text" readonly name="apeAdmin" class="form-control-plaintext" id="apeAdmin" value="<?php echo $user->ape; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="telUser" class="col-sm-3 col-form-label">Correo:</label>
            <div class="col-sm-9">
              <input type="text" readonly name="correoAdmin" class="form-control-plaintext" id="correoAdmin" value="<?php echo $user->correo; ?>">
            </div>
          </div>
        </div>
      </div>
      
    </form>
  </div>
</div>

<script type="text/javascript">
  function perfilSubmit(data) {
    if (inputChange(data)) {
      var parametros = new FormData(data);
      $.ajax({
          mimeType: 'text/html; charset=utf-8',
          url: '<?php echo base_url() ?>user/editUser',
          method: 'POST',
          async: true,
          data: parametros,
          contentType:false,
          processData:false,
          dataType: 'json',
          success: function(respuesta) {
            dialogo(respuesta.success, respuesta.response,'mgs');
            if (respuesta.success == 3) {
              for (var i = t.length - 1; i >= 0; i--) {
                t[i].setAttribute('readonly', '');
                t[i].className = 'form-control-plaintext';
              }
              let btn = data.getElementsByClassName('btn btn-success btn-sm')[0];
              btn.className = 'btn btn-warning btn-sm';
              btn.getElementsByTagName('i')[0].className = 'fas fa-user-edit';
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            dialogo(7,'ERROR');
            $('#submit').fadeIn();
        }
      });
    }
  }

  function inputChange(data) {

    t = data.getElementsByTagName('input');
    if (data.getElementsByClassName('btn btn-success btn-sm')[0]) return true;
    else {
      for (var i = t.length - 1; i >= 0; i--) {
        t[i].removeAttribute('readonly');
        t[i].className = 'form-control';
      } console.log(data);
      let btn = data.getElementsByClassName('btn btn-warning btn-sm')[0];
      btn.className = 'btn btn-success btn-sm';
      btn.getElementsByTagName('i')[0].className = 'fas fa-save';
      return false;
    }
  }

</script>