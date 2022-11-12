<!DOCTYPE html>
<html lang="en">

<head>
  <!---llamamos al archivo php con el encabezado del html-->
    <?php require 'head.php' ?> 
    <title>Login</title>
</head>

<body>
<!---llamamos al archivo php donde se crean las cookies-->
 <?php require 'fmrlogin.php'?>
<div class="encabezado">
  <h1>DAWES-PRÁCTICA#2:SESIONES Y COOKIES</h1>
</div>
<div class="cuerpo text-center">
  <h2>Login de usuario: </h2>
  <div class="container-fluid">
    <!---formulario donde vamos a pedir el usuario y contraseña para entrar en la sesion-->
    <form method="post">
      <div class="row justify-content-center">
        <div class="col-xs-3 col-md-3 col-lg-3">
          <label for="exampleFormControlInput1" class="form-label">Usuario:
            <input type="text" class="form-control" id="exampleFormControlInput1" name="usuario" value="<?php
                                                                                                        //si existe la cookie de nombre con el usuario, se imprime
                                                                                                        if (!empty($_COOKIE['nombre'])) {
                                                                                                          echo $_COOKIE['nombre'];
                                                                                                        }


                                                                                                        ?>">
          </label>

        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-xs-3 col-md-3 col-lg-3">
          <label for="exampleFormControlTextarea1" class="form-label">Contraseña:
            <input type="password" class="form-control" id="exampleFormControlInput1" name="contrasenia" value="<?php //si existe la cookie de pass con la contraseña, se imprime
                                                                                                                if (!empty($_COOKIE['pass'])) {
                                                                                                                  echo $_COOKIE['pass'];
                                                                                                                } ?>">
          </label>
        </div>
      </div>
      <div class="form-check">

        <label class="form-check-label" for="flexCheckDefault">
          <input class="form-check-input" type="checkbox" value="check" id="flexCheckDefault" name="check" <?php // si hay una cookie  de recuerdame, entonces imprimimos un tick
                                                                                                      if(isset($_COOKIE['recuerdame'])){?> checked<?php }  ?>>

          Recuérdame :)
        </label>

      </div>
      <div class="form-check">

        <label class="form-check-label" for="flexCheckDefault">
          <input class="form-check-input" type="checkbox" value="check2" id="flexCheckDefault" name="check2"<?php // si hay una cookie de abierta, entonces imprimimos un tick
                                                                                                    if(isset($_COOKIE['abierta'])){?> checked<?php } ?>>

          Mantener sesión abierta ;)
        </label>

      </div>
  </div>
  <div>
    <div>
      <button type="submit" class="btn btn-primary" name="enviar">Enviar</button>
    </div>
  </div>
  </form>
  <?php
  // variables que guardan la informacion de la sesion
  $usuarioValido = "rosa";
  $passwordValido = "123";

  if (isset($_POST["enviar"])) { // si pulsamos el botón enviar empieza todo el proceso
    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["contrasenia"];
    
// se comprueba de que se ha introducido el usuario y la contraseña
    if (!empty($usuario) && !empty($contrasenia)) {
      // se compara si el usuario y la contraseña son iguales a los establecidos
      if ($usuario == $usuarioValido && $contrasenia == $passwordValido) {
        //si son iguales, vamos a iniciar una sesion
        session_start();
        $_SESSION["verificado"] = "si"; //la sesión se va a llamar verificado y guardará la cadena si
        $_SESSION["nombre"]=$usuario; //la sesión llamada nombre guardará el nombre del usuario
       
        header("Location: inicio.php"); // si todo el correcto vamos a enviar al usuario a la pagina de inicio
       
      } else { 

    // si el usuario y le contraseña no son correctos se produce un error y redireccionamos al login
        header("Location:login.php?error=si"); 
      }
    } else {
      // si no se han introducido el usuario y la contraseña en los campos, se produce otro error y redireccionamos a login
      header("Location:login.php?error=fuera");

     
    }
  }
  ?>

</div>
<?php
// aqui vamos a crear la logica de los errores
if (isset($_GET["error"])) {
    // si el error es igual a si en la url entonces mostramos una alerta advirtiendo que las credenciales no son correctas
    if ($_GET["error"] == "si") {

        echo
        "<div class='alert alert-danger' role='alert'>
    Tu usuario y contraseña no son correctos :(
    </div>";
    // si el error es igual a fuera entonces mostramos una alerta advirtiendo que deberias logearte para entrar
    } else if ($_GET["error"] == "fuera") {
        echo
        "<div class='alert alert-danger' role='alert'>
    No puedes acceder directamente a esta página. Debería loguearse antes
  </div>";
    }
}

?>

</div>
</div>
    
    <!---llamamos al footer--->
    <?php require 'footer.php' ?>

</body>

</html>