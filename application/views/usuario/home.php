<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid"><br>

<div class="card-columns">

  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Información del usuario</h5>
      <p class="card-text">Super usuario root</p>
      <p class="card-text"><button type="button" onclick="if(!true) alert('no tiene permiso!'); else location.href = 'https://xuxo.000webhostapp.com/usuario/nuevo';" class="btn btn-primary btn-sm">Editar</button></p>
    </div>
  </div>

    <div class="card p-3 ">
    <blockquote class="blockquote mb-0">
      <p>Usuarios</p>
      <button type="button" onclick="if(!true) alert('no tiene permiso!'); else location.href = 'https://xuxo.000webhostapp.com/usuario/nuevo';" class="btn btn-primary btn-sm">Ver</button>
      <button type="button" onclick="if(!true) alert('no tiene permiso!'); else location.href = 'https://xuxo.000webhostapp.com/usuario/nuevo';" class="btn btn-primary btn-sm">Nuevo</button>
    </blockquote>
  </div>

  <div class="card p-3 ">
    <blockquote class="blockquote mb-0">
      <p>Agregar programa</p>
      <footer class="blockquote-footer">
        <small class="text-muted">
          Ejemplo: Diseño grafico, Software, modas...
        </small>
      </footer>
      <br>
      <button type="button" onclick="if(!true) alert('no tiene permiso!'); else location.href = 'https://xuxo.000webhostapp.com/usuario/nuevo';" class="btn btn-primary btn-sm">Agregar nuevo usuario</button>
    </blockquote>
  </div>
    
    <div class="card">
    <div class="card-body">
      <h5 class="card-title">Menú</h5>
      <div class="form-group">
        <select class="form-control" id="menu">
            <option value="primary">azul</option>
            <option value="secondary">gris</option>
            <option value="success">verde</option>
            <option value="danger">rojo</option>
            <option value="warning">amarillo</option>
            <option value="info">azul 2</option>
            <option selected="" value="dark">negro</option>
        </select>
        
      </div>
      <button type="button" onclick=" $.ajax({type: 'POST', url: 'https://xuxo.000webhostapp.com/usuario/menu', cache: false, data: 'menu='+$('#menu').val(), success: function() { document.getElementById('accordionSidebar').className = 'navbar-nav bg-gradient-'+$('#menu').val()+' sidebar sidebar-dark accordion toggled'; } }); " class="btn btn-primary btn-sm">Cambiar tema</button>
    </div>
  </div>
  
  
  <div class="card">
    <div class="card-body">
        <h5 class="card-title">Producto</h5>
      <p class="card-text">Alerta cuando haya menos de <input type="number" id="producto" value="10" style="width: 20%"> unidades.</p>
      <button type="button" onclick="if(!true) alert('no tiene permiso!'); else if (parseInt(document.getElementById('producto').value)>0) $.ajax({dataType: 'json', url: 'https://xuxo.000webhostapp.com/usuario/setProsucto/'+document.getElementById('producto').value,cache: false,success: function(data){toastr.success('Registro exitoso!', 'Correcto', {'positionClass': 'toast-bottom-center'});}});" class="btn btn-primary btn-sm">Aplicar</button>
    </div>
  </div>
  
   <div class="card">
    <div class="card-body">
      <h5 class="card-title">Cambiar clave</h5>
      <div class="form-group">
        <label for="exampleInputPassword1">Clave</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Ingrese la nueva clave</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Repita la nueva Clave</label>
        <input type="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="button" class="btn btn-primary btn-sm">Aplicar</button>
    </div>
  </div>
  
  
  
   

  
  
  <div class="card">
    <blockquote class="blockquote mb-0 card-body">
      <h4>Permisos de usuario</h4>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p1">
        <label class="form-check-label" for="p1">
            Crear usuarios        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p2">
        <label class="form-check-label" for="p2">
            Editar usuarios        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p3">
        <label class="form-check-label" for="p3">
            Agregar categorías        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p4">
        <label class="form-check-label" for="p4">
            Editar categorías        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p5">
        <label class="form-check-label" for="p5">
            Eliminar categorías        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p6">
        <label class="form-check-label" for="p6">
            Agregar productos        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p7">
        <label class="form-check-label" for="p7">
            Editar productos        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p8">
        <label class="form-check-label" for="p8">
            Eliminar productos        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p9">
        <label class="form-check-label" for="p9">
            Agregar stock        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p10">
        <label class="form-check-label" for="p10">
            Eliminar stock        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p11">
        <label class="form-check-label" for="p11">
            Eliminar historial del producto        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p12">
        <label class="form-check-label" for="p12">
            Generar reporte semanal        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p13">
        <label class="form-check-label" for="p13">
            Cambiar el rango de alerta de productos        </label>
      </div>
            <div class="form-check card-text">
        <input class="form-check-input" checked="" type="checkbox" id="p14">
        <label class="form-check-label" for="p14">
            Eliminar usuarios        </label>
      </div>
            
    </blockquote>
  </div>

 
  <script>
      function deleteUser(id){
    $.ajax({
        dataType: "json",
        url: 'https://xuxo.000webhostapp.com/usuario/removeUser/'+id,
        cache: false,
        success: function(data)
        {
            toastr.error('Registro eliminado!', 'removido exitosamente', {"positionClass": "toast-bottom-center"});
            var element = document.getElementById('u'+id);
            element.parentNode.removeChild(element);
        }
    });
    
    
}

  </script>
 
</div>

<br><br></div>
</div>
</div>