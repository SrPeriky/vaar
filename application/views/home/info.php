<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">

        <div class="col-lg-6">

            <!-- Brand Buttons -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Institución</h6>
                </div>
                <div class="card-body">
                  <h3 class="font-weight-bold text-primary"><?php echo $instituto->nom?> </h3>
                    <p><?php echo $instituto->caracter_academico;  ?> - Sector <?php echo $instituto->sector;  ?></p>
                    <p><?php echo $instituto->naturaleza_juridica;  ?></p>
                    <p class="card-text"><small class="text-muted"><a href="https://<?php echo $instituto->pagina_web; ?>" target="_blank">
                      <?php echo $instituto->pagina_web; ?>
                    </a></small></p>
                    <!--a href="#" class="btn btn-google btn-block"><i class="fab fa-google fa-fw"></i>
                        .btn-google</a>
                    <a href="#" class="btn btn-facebook btn-block"><i class="fab fa-facebook-f fa-fw"></i> .btn-facebook</a-->

                </div>
            </div>

            <!-- Circle Buttons -->
            <div class="card shadow mb-4">
              <!--div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
              </div-->
              <div class="row no-gutters">
                  <div class="col-md-4">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="https://hibotchat.com/wp-content/uploads/2020/03/drdr.png" alt="...">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h4 class="font-weight-bold text-primary">Arrasta y suelta las pruebas</h4>
                      <p class="card-text">Las pruebas de los años anteriores al 2016 <strong>no se tendrán en cuenta </strong> porque el ICFES en 2015 hizo cambios en la estructura de la prueba por lo que no son comparables con los años siguientes.</p>
                    </div>
                  </div>
                  
                </div>
              </div>


        </div>

        <div class="col-lg-6">

             <!-- Circle Buttons -->
            <div class="card shadow mb-4">
              <!--div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Circle Buttons</h6>
              </div-->
              <div class="row no-gutters">
      
                  <div class="col-md-8">
                    <div class="card-body">
                      <h4 class="font-weight-bold text-primary">Carga de datos masivos</h4>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" src="https://us.123rf.com/450wm/magurok/magurok1708/magurok170800012/83482866-icono-de-archivo-csv-tipo-de-documento-de-valores-separados-por-comas-ilustraci%C3%B3n-gr%C3%A1fica-de-dise%C3%B1o-.jpg" alt="...">
                  </div>
                </div>
              </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Split Buttons with Icon</h6>
                </div>
                <div class="card-body">
                    <p>Works with any button colors, just use the <code>.btn-icon-split</code> class and
                        the markup in the examples below. The examples below also use the
                        <code>.text-white-50</code> helper class on the icons for additional styling,
                        but it is not required.</p>
                    
                </div>
            </div>

        </div>

    </div>

</div>