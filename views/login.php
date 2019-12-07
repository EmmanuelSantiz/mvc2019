<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Login</title>
    <style type="text/css">
      html,
        body {
          height: 100%;
        }

        body {
          display: -ms-flexbox;
          display: flex;
          -ms-flex-align: center;
          align-items: center;
          padding-top: 40px;
          padding-bottom: 40px;
          background-color: #f5f5f5;
        }

        .form-signin {
          width: 100%;
          max-width: 330px;
          padding: 15px;
          margin: auto;
        }
        .form-signin .checkbox {
          font-weight: 400;
        }
        .form-signin .form-control {
          position: relative;
          box-sizing: border-box;
          height: auto;
          padding: 10px;
          font-size: 16px;
        }
        .form-signin .form-control:focus {
          z-index: 2;
        }
        .form-signin input[type="input"] {
          margin-bottom: -1px;
          border-bottom-right-radius: 0;
          border-bottom-left-radius: 0;
        }
        .form-signin input[type="password"] {
          margin-bottom: 10px;
          border-top-left-radius: 0;
          border-top-right-radius: 0;
        }
    </style>
  </head>

  <body class="text-center">
    <form class="form-signin" action="<?php echo base_url("login/index"); ?>" method="post">
      <div class="alert alert-success alert-dismissable" style="display: none;" id="msjS">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>¡Exito!</strong> Cuenta Creada Exitosamente.
    </div>
      <div class="alert alert-danger alert-dismissable" style="display: none;" id="msjE">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong> Ocurrio un Error
      </div>
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label for="char_user" class="sr-only">Usuario</label>
      <input type="input" id="char_user" class="form-control" name="nombre" autofocus="">
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      <button type="button" class="btn btn-lg btn-info btn-block" data-toggle="modal" data-target="#myModal">Registrarse</button>
      <p class="mt-5 mb-3 text-muted">© Emmanuel Santiz <?php echo date('Y'); ?></p>
    </form>
  
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Registro</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>        
      </div>
      <div class="modal-body">
        <form id="registro">
          <div class="form-group">
              <label for="email" class="text-left">email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Password"/>
          </div>
          <div class="form-group">
              <label for="nombre" class="text-left">Usuario</label>
              <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Usuario"/>
          </div>
          <div class="form-group">
              <label for="password" class="text-left">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password"/>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="guardar">Guardar</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body></html>

<script type="text/javascript">
  var url = '<?php echo base_url("login/index"); ?>';
  $('#guardar').click(function() {
    var boton = $(this);

    $.ajax({
      url: url,
      method: 'POST',
      data: {data: $('#registro').serialize()},
      success: function(data) {
        $('#registro')[0].reset();
        boton.next().click();
        if (data == 0) {
          $('#msjS').show();
          $('#msjE').hide();
        } else {
          $('#msjS').hide();
          $('#msjE').show();
        }
      },
      error: function() {
        console.log("No se ha podido obtener la información");
      }
    });
    
    /*$.post(url, {data: $('#registro').serialize() }, function(data) {
      console.log(data)
      /*$('#registro')[0].reset();
      boton.next().click();

      if (data.data) {
        $('#msjS').show();
        $('#msjE').hide();
      } else {
        $('#msjS').hide();
        $('#msjE').show();
      }
    });*/
  });
</script>