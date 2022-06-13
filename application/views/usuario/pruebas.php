<div class="card shadow mb-4">
  <div class="card-body">
    <form autocomplete="off"  method="post" enctype="multipart/form-data" onsubmit="tiposDePruebasSubmit(this); return false;"> 
      <div class="row p-3">
        <div class="col">
          <h5 class="card-title">Tipos de pruebas</h5>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-save"></i></button>
        </div>
      </div>
      <div class="form-group row">
        <label for="nomTipoDePrueba" class="col-sm-2 col-form-label">Nombre:</label>
        <div class="col-sm-10">
          <input type="text" name="nomTipoDePrueba" class="form-control" id="nomTipoDePrueba" value="">
        </div>
      </div>
      <div class="mb-3">
        <label for="detallesTipoDePrueba" class="form-label">Detalles</label>
        <textarea class="form-control" name="detallesTipoDePrueba" id="detallesTipoDePrueba" rows="3"></textarea>
      </div>
    </form>
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">nombre</th>
          <th scope="col">detalles</th>
          <th scope="col">
          
          </th>
          <th scope="col">
            <i class="fas fa-cog"></i></th>
        </tr>
      </thead>
      <tbody id="tablaTipoDePrueba">
        <?php $i=0; foreach ($tipoPruebas as $key): $i++;?>
        
        <tr id="tdp<?php echo $key->id; ?>">
          <th scope="row"><?php echo $i; ?></th>
          <td  colspan="3">
            <form autocomplete="off" method="post" enctype="multipart/form-data" onsubmit="editTipoDePrueba(this); return false;"> 
              <input type="hidden" value="<?php echo $key->id; ?>" name="idTipoDePrueba">
              <div class="row">
                <div class="col-auto">
                  <input type="text" readonly name="nomTipoDePrueba" class="form-control-plaintext" value="<?php echo $key->nom; ?>">
                </div>
                <div class="col">
                  <input type="text" readonly name="detallesTipoDePrueba" class="form-control-plaintext" value="<?php echo $key->detalle; ?>">
                </div>
                <div class="col-auto">
                  <button  type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>
                </div>
              </div>
            </form>
          </td>
          <th scope="row">
            <button onclick="trashTipoDePrueba(<?php echo $key->id; ?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
          </th>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>  
<script type="text/javascript">
var i = <?php echo $i; ?>;
function tiposDePruebasSubmit(data) {
      let parametros = new FormData(data);
      $.ajax({
          mimeType: 'text/html; charset=utf-8',
          url: '<?php echo base_url() ?>user/tiposDePruebasSubmit',
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
              document.getElementById('tablaTipoDePrueba').innerHTML += 
              '<tr id="tdp'+respuesta.num+'">'+
                '<th scope="row">'+i+'</th>'+
                '<td  colspan="3">'+
                  '<form autocomplete="off" method="post" enctype="multipart/form-data" onsubmit="editTipoDePrueba(this); return false;"> '+
                    '<input type="hidden" value="'+respuesta.num+'" name="idTipoDePrueba">'+
                    '<div class="row">'+
                      '<div class="col-auto">'+
                        '<input type="text" readonly name="nomTipoDePrueba" class="form-control-plaintext" value="'+respuesta.nom+'">'+
                      '</div>'+
                      '<div class="col">'+
                        '<input type="text" readonly name="detallesTipoDePrueba" class="form-control-plaintext" value="'+respuesta.des+'">'+
                      '</div>'+
                      '<div class="col-auto">'+
                        '<button  type="submit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>'+
                      '</div>'+
                    '</div>'+
                  '</form>'+
                '</td>'+
                '<th scope="row">'+
                  '<button onclick="trashTipoDePrueba('+respuesta.num+')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>'+
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

  function trashTipoDePrueba(id){
    if (confirm('se borran los datos de esta prueba')) $.ajax({
        type: "POST",
        dataType: "json",
        url: '<?php echo base_url() ?>user/trashTipoDePrueba',
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

  function editTipoDePrueba(data) {
    if (inputChange(data)) {   
      var parametros = new FormData(data);
      $.ajax({
          mimeType: 'text/html; charset=utf-8',
          url: '<?php echo base_url() ?>user/editTipoDePrueba',
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