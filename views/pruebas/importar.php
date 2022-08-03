<br><div class="container card mb-3 shadow py-3">
  <form autocomplete="off"  method="post" id="import_csv" enctype="multipart/form-data">
    <h1>
      Registrar
    </h1>
    <div class="row p-3">
      <div class="col-6">
        <div class="mb-0">
          <label for="curso">Seleccionar el curso</label>
          <select class="form-control" id="curso" name="curso" aria-label="Default select example">
            <?php foreach ($cursos as $key):?>
            <option value="<?php echo $key->id ?>"><?php echo "[".$key->codigo."] ".$key->nom ?></option>
            <?php endforeach;?>
          </select>
        </div>
      </div>
      <div class="col-6">
        <div class="mb-0">
          <label for="prueba">Seleccionar tipo de prueba</label>
          <select class="form-control" id="prueba" name="prueba" aria-label="Default select example">
            <?php foreach ($pruebas as $key):?>
            <option value="<?php echo $key->id ?>"><?php echo $key->nom ?></option>
            <?php endforeach;?>
          </select>
        </div>
      </div>
    </div>
    <div class="drag-area text-center">
      <div class="bg-primary p-5 text-white rounded mt-3">
        <i class="fas fa-cloud-upload-alt fa-2x"></i>
        <h1>Arrastrar archivo <br> o</h1>
        <button  class="btn btn-lg btn-light">Buscar archivo</button>
        <input type="file" name="csv_file" id="csv_file" required accept=".csv" hidden>
      </div>
    </div>
  </form>
</div>
  
<script type="text/javascript">
    //selecting all required elements
    const dropArea = document.querySelector(".drag-area"),
    dragText = dropArea.querySelector("h1"),
    button = dropArea.querySelector("button"),
    input = dropArea.querySelector("input");
    let file; //this is a global variable and we'll use it inside multiple functions

    button.onclick = ()=>{
      input.click(); //if user click on the button then the input also clicked
    }

    input.addEventListener("change", function(){
      //getting user select file and [0] this means if user select multiple files then we'll select only the first one
      file = this.files[0];
      dropArea.classList.add("active");
      showFile(); //calling function
    });

    console.log(input.files);


    //If user Drag File Over DropArea
    dropArea.addEventListener("dragover", (event)=>{
      event.preventDefault(); //preventing from default behaviour
      dropArea.classList.add("active");
      dragText.innerHTML = "<br>Suelta para subir archivo<br><br>";
      button.setAttribute('hidden', '');

    });

    //If user leave dragged File from DropArea
    dropArea.addEventListener("dragleave", ()=>{
      dropArea.classList.remove("active");
      dragText.innerHTML = "Subir archivo <br> o";
      button.removeAttribute('hidden');
    });

    //If user drop File on DropArea
    dropArea.addEventListener("drop", (event)=>{
      event.preventDefault(); //preventing from default behaviour
      //getting user select file and [0] this means if user select multiple files then we'll select only the first one
      file = event.dataTransfer.files[0];
      input.files = event.dataTransfer.files;
      //console.log(event.dataTransfer.files[0]);
      showFile(); //calling function
    });

    function showFile(){
      let archivo = file.name; //getting selected file type
      //let fileType = file.type; //getting selected file type
      let extensiones_permitidas = new Array(".csv", ".CSV");
      let extension = (archivo.substring(archivo.lastIndexOf("."))).toLowerCase();
      let permitida = false;
      for (var i = 0; i < extensiones_permitidas.length; i++) {
         if (extensiones_permitidas[i] == extension) {
         permitida = true;
         break;
         }
      }
      if(permitida){ //if user selected file is an image file
        let fileReader = new FileReader(); //creating new FileReader object
        //dialogo(6, "Subiendo archivo CSV!");
        dragText.textContent = "Cargando...";
        fileReader.onload = ()=>{
          let fileURL = fileReader.result; //passing user file source in fileURL variable
          //dropArea.innerHTML = imgTag; //adding that created img tag inside dropArea container
          dialogo(4, "Cargado correctamente");
          dragText.textContent = file.name;

          /**************
          ** LOAD DATA **
          **************/
          let csv = new FormData($('#import_csv')[0]);
          $.ajax({
            url:"<?php echo base_url(); ?>pruebas/import",
            method:"POST",
            data: csv,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
              button.setAttribute('hidden', '');
            },
            success:function(data)
            {
              $('.rounded').html("<h1>"+file.name+"</h1> <br>"+data);
            }
          })
        }
        fileReader.readAsDataURL(file);
      }else{
        //alert("This is not an CSV File!");
        dialogo(7, "Esto no es un archivo CSV!");
        dropArea.classList.remove("active");
        dragText.innerHTML = "Arrastrar archivo <br> o";
        button.removeAttribute('hidden');
      }
    }
</script>