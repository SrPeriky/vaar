<style type="text/css">
    body{
        background-color: #f6f6f6;
    }
</style>
<div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none p-5 d-lg-block">
                                <div class="mb-4 border-left-success">
                                    <div class="card-body">
                                        VALOR AGREGADO - APORTE RELATIVO | VAAR
                                    </div>
                                </div>
                                <div class="mb-4 border-left-danger">
                                    <div class="card-body">
                                        Este es un software desarrollado para investigadores de valor agregado en educación superior con manejo de estadística, mas no para un público general
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login!</h1>
                                    </div>
                                    <form autocomplete="off" class="user" method="post" enctype="multipart/form-data" onsubmit="login(this); return false;"> 
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" id="nom" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="clave" placeholder="Password">
                                        </div>
                                        <!--div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div-->
                                        <button  type="submit" class="btn btn-primary btn-user btn-block">Ingresar</button>
                                        <!--hr>
                                        <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a-->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url() ?>password">Lost your password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url(); ?>register">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <script type="text/javascript">
    //
    function login() {
      // body...
      $.ajax({
        type: "POST",
        dataType: "json",
        url: '<?php echo base_url(); ?>login/login',
        cache: false,
        data: "correo="+$('#nom').val()+'&clave='+$('#clave').val(),
        success: function(respuesta)
        {
            console.log(respuesta);
            dialogo(respuesta.success, respuesta.response,'mgs');
            if(parseInt(respuesta.success) == 3) location.href = '<?php echo base_url(); ?>'+respuesta.vista;
        }
      });
     
    }
</script>