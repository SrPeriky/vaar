<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid"><br>
      <div class="card">
        <div class="card-body">
          <h2>Pruebas registradas</h2>
          <br>  
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tipo de prueba</th>
                <th scope="col">Periodo</th>
                <th scope="col">Programa</th>
                <th><i class="fas fa-eye"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; foreach ($tabla as $key): ?>
              <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td><?php echo $key->tipo; ?></td>
                <td><?php echo $key->periodo; ?></td>
                <td><?php echo $key->programa; ?></td>
                <td>
                  <a class="btn btn-info" href="<?php echo base_url() ?>inventario/ver/<?php //echo $key->id ?>" role="button">
                    <i class="fas fa-eye "></i>
                  </a>
                </td>
              </tr>
              <?php $i++; endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
      <br><br>
    </div>
  </div>
</div>