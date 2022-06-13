<form autocomplete="off"  method="post" id="datos" enctype="multipart/form-data" action="<?php echo base_url() ?>reportes/dowload" onsubmit="//calcularValorAgregadoSubmit(this); return false;"> 
	<input type="hidden" name="v0">
	<input type="hidden" name="v1">
	<input type="hidden" name="v2">
	<input type="hidden" name="v3">
	<div class="shadow mb-4 card card-body">
		<div class="row">
			<div class="col">
			  <h5 class="card-title">Calcular valor agregado</h5>
			</div>
			<div class="col-auto">
			  <button type="submit" class="btn shadow btn-success btn-sm">Generar Informe</button>
			</div>
		</div>
	</div>
</form>
<div-result>
	<div class="row">

        <div class="col-lg-6">

            <!-- Overflow Hidden -->
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Seleccionar programa</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="select0" aria-label="Default select example" onchange="consultar(this.value, 0);">
                          <option selected value="">---</option>
                          <option value="0">Todo</option>
                          <option value="1">Una opción</option>
                          <option value="2">Personalizado</option>
                        </select>
                    </div>
                    <div-va id="programa"></div-va>
                </div>
            </div>


            <!-- Roitation Utilities -->
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Seleccionar estudiante</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="select1" aria-label="Default select example" onchange="consultar(this.value, 1);">
                          <option selected value="">---</option>
                          <option value="0">Todo</option>
                          <option value="1">Una opción</option>
                          <option value="2">Personalizado</option>
                        </select>
                    </div>
                    <div-va id="estudiante"></div-va>
                </div>
            </div>



        </div>

        <div class="col-lg-6">

        	<!-- Progress Small -->
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Seleccionar tipo de prueba</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="select2" aria-label="Default select example" onchange="consultar(this.value, 2);">
                          <option selected value="">---</option>
                          <option value="0">Todo</option>
                          <option value="1">Una opción</option>
                          <option value="2">Personalizado</option>
                        </select>
                    </div>
                    <div-va id="prueba"></div-va>
                </div>
            </div>


        	<!-- Dropdown No Arrow -->
            <div class="card mb-4 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Seleccionar periodo de prueba</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <select class="form-control" name="select3" aria-label="Default select example" onchange="consultar(this.value, 3);">
                          <option selected value="">---</option>
                          <option value="0">Todo</option>
                          <option value="1">Una opción</option>
                          <option value="2">Personalizado</option>
                        </select>
                    </div>
                    <div-va id="periodo"></div-va>
                </div>
            </div>

        </div>

    </div>

</div-result>

<script type="text/javascript">
	var obj = new Array();
	function agregar(tipo, agg = true) {
	  	limpio(tipo);
		let temp = document.getElementsByName("res"+tipo)[0];
		//let rst = document.getElementsByName("rst"+tipo)[0];
		let element = temp.options[parseInt(temp.selectedIndex)];
		let l = element.innerHTML;
		let v = document.getElementsByName("v"+tipo)[0];
		/*let vacio = "";
		if (tipo==3 || tipo == 1) vacio = "'";
		let p = (v.value == null || v.value == "") ? vacio+temp.value+vacio : ","+vacio+temp.value+vacio;*/
		let p = (v.value == null || v.value == "") ? temp.value : ","+temp.value;
		v.value += p;
		//obj[parseInt(tipo)].push(parseInt(temp.value)); str.substr(0, str.length - 1)
    	element.parentNode.removeChild(element);
		$("div-va")[tipo].innerHTML += l+"<br>";
		//rst.innerHTML += l+"<br>";
	}


  function consultar(valor, tipo) {
  	console.log(valor+" "+tipo);
  	obj[parseInt(tipo)] = undefined;
  	var parametros = new FormData($('#datos')[0]);
  	parametros.set("tipo", tipo);
  	parametros.set("valor", valor);
  	$.ajax({
	    type: "POST",
	    url: '<?php echo base_url(); ?>reportes/getSelect',
	    cache: false,
	    mimeType: 'text/html; charset=utf-8',
	    method: 'POST',
	    async: true,
	    data: parametros,
	    contentType:false,
	    processData:false,
	    dataType: 'json',
	    success: function(respuesta) {
			let t = $("div-va");
		  	limpio(tipo);
			$("#"+t[tipo].id).html(respuesta[0]);
			document.getElementsByName('v'+tipo)[0].value = respuesta[1];
			console.log(respuesta);
	  },
	  error: function(jqXHR, textStatus, errorThrown) {
	      dialogo(7,'ERROR');
	      return false;
	  }
	});
	return false;
  }

  function agg(v, tipo) {
  	limpio(tipo);
  	document.getElementsByName('v'+tipo)[0].value = v;
  }

  function limpio(tipo) {
  	let t = $("div-va");
	for (var i = t.length - 1; i >= (tipo+1); i--){
		document.getElementsByName("select"+i)[0].innerHTML = '<option selected value="">---</option><option value="0">Todo</option><option value="1">Una opción</option><option value="2">Personalizado</option>';
		document.getElementsByName('v'+i)[0].value = null;
		$("#"+t[i].id).html("");
	}
  }

  function calcularValorAgregadoSubmit() {
  	var parametros = new FormData($('#datos')[0]);
  	$.ajax({
	    type: "POST",
	    url: '<?php echo base_url(); ?>reportes/getCalVA',
	    cache: false,
	    mimeType: 'text/html; charset=utf-8',
	    method: 'POST',
	    async: true,
	    data: parametros,
	    contentType:false,
	    processData:false,
	    dataType: 'json',
	    success: function(respuesta) {
			let t = $("div-result")[0];
			t.innerHTML = respuesta;
			console.log(respuesta);
	  },
	  error: function(jqXHR, textStatus, errorThrown) {
	      dialogo(7,'ERROR');
	      return false;
	  }
	});
  }
</script>