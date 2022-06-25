<div class="card shadow mb-4">
  <div class="card-body">
    <form autocomplete="off"  method="post" enctype="multipart/form-data" onsubmit="programasSubmit(this); return false;"> 
      <div class="row p-3">
        <div class="col">
          <h5 class="card-title">Programas</h5>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i></button>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nomProgramas" class="form-control" value="">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Codigo:</label>
        <div class="col-sm-10">
          <input type="text" name="codigoProgramas" class="form-control" value="">
        </div>
      </div>  
      <div class="mb-3">
        <label class="form-label">Detalles</label>
        <textarea class="form-control" name="detallesProgramas" rows="3"></textarea>
      </div>
    </form>
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nombre</th>
          <th scope="col">codigo</th>
          <th scope="col">detalles</th>
          <th scope="col">
            <i class="fas fa-cog"></i></th>
        </tr>
      </thead>
      <tbody id="tablaProgramas">
        <?php $i=0; foreach ($progrmas as $key): $i++;?>
        
        <tr id="tdp<?php echo $key->id; ?>">
          <th scope="row"><?php echo $i; ?></th>
          <td  colspan="3">
            <form autocomplete="off" method="post" enctype="multipart/form-data" onsubmit="editProgramas(this); return false;"> 
              <input type="hidden" value="<?php echo $key->id; ?>" name="idProgramas">
              <div class="row">
                <div class="col">
                  <input type="text" readonly name="nomProgramas" class="form-control-plaintext" value="<?php echo $key->nom; ?>">
                </div>
                <div class="col">
                  <input type="text" readonly name="codigoProgramas" class="form-control-plaintext" value="<?php echo $key->codigo; ?>">
                </div>
                <div class="col">
                  <input type="text" readonly name="detallesProgramas" class="form-control-plaintext" value="<?php echo $key->detalles; ?>">
                </div>
                <div class="col-auto">
                  <button  type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                </div>
              </div>
            </form>
          </td>
          <th scope="row">
            <button onclick="trashProgramas(<?php echo $key->id; ?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
          </th>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
var i = <?php echo $i; ?>;
function programasSubmit(data) {
      let parametros = new FormData(data);
      $.ajax({
          mimeType: 'text/html; charset=utf-8',
          url: '<?php echo base_url() ?>user/programasSubmit',
          method: 'POST',
          async: true,
          data: parametros,
          contentType:false,
          processData:false,
          dataType: 'json',
          success: function(respuesta) {
            dialogo(respuesta.success, respuesta.response,'mgs');
            if (respuesta.success == 3) {
              data.reset();
              i++;
              document.getElementById('tablaProgramas').innerHTML += 
              '<tr id="tdp'+respuesta.num+'">'+
                '<th scope="row">'+i+'</th>'+
                '<td  colspan="3">'+
                  '<form autocomplete="off" method="post" enctype="multipart/form-data" onsubmit="editProgramas(this); return false;"> '+
                    '<input type="hidden" value="'+respuesta.num+'" name="idTipoDePrueba">'+
                    '<div class="row">'+
                      '<div class="col">'+
                        '<input type="text" readonly name="nomProgramas" class="form-control-plaintext" value="'+respuesta.nom+'">'+
                      '</div>'+
                      '<div class="col">'+
                        '<input type="text" readonly name="codigoProgramas" class="form-control-plaintext" value="'+respuesta.cod+'">'+
                      '</div>'+
                      '<div class="col">'+
                        '<input type="text" readonly name="detallesProgramas" class="form-control-plaintext" value="'+respuesta.des+'">'+
                      '</div>'+
                      '<div class="col">'+
                        '<button  type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>'+
                      '</div>'+
                    '</div>'+
                  '</form>'+
                '</td>'+
                '<th scope="row">'+
                  '<button onclick="trashProgramas('+respuesta.num+')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>'+
                '</th>'+
              '</tr>';
            } 
        },
        error: function(jqXHR, textStatus, errorThrown) {
            dialogo(7,'ERROR');
            $('#submit').fadeIn();
        }
      });
  }

  function trashProgramas(id){
    if (confirm('se borran los datos de este programa')) $.ajax({
        type: "POST",
        dataType: "json",
        url: '<?php echo base_url() ?>user/trashProgramas',
        cache: false,
        data: "id="+id,
        success: function(respuesta)
        {
          dialogo(respuesta.success, respuesta.response,'mgs');
          let element = document.getElementById('tdp'+id);
          element.parentNode.removeChild(element);
        }
    });
  }

  function editProgramas(data) {
    if (inputChange(data)) {   
      var parametros = new FormData(data);
      $.ajax({
          mimeType: 'text/html; charset=utf-8',
          url: '<?php echo base_url() ?>user/editProgramas',
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
              btn.getElementsByTagName('i')[0].className = 'fas fa-edit';
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            dialogo(7,'ERROR');
            $('#submit').fadeIn();
        }
      });
    }
  }

</script>