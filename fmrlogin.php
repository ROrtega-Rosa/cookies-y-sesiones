<?php

$usuarioValido = "rosa";
$passwordValido = "123";
// si se pulsa el boton enviar
if (isset($_POST["enviar"])) {
  $usuario = $_POST["usuario"];
  $contrasenia = $_POST["contrasenia"];
  //comprobamos que existe el usuario y la contraseña y coincidan
  if (!empty($usuario) && !empty($contrasenia)) {
    if ($usuario == $usuarioValido && $contrasenia == $passwordValido) { // si todo esta correcto prodecemos a tratar con cookies
  // si se ha señalado el checkbox cuyo atributo nombre es check entonces creamos tres cookies
  if (!empty($_POST["check"])) {
    // las cookies tendrán un nombre, valor y tiempo de caducidad
    setcookie("nombre", $usuario, time()+(365*24*60*60)); // cookie que guarda el nombre
    setcookie("pass", $contrasenia,time()+(365*24*60*60));// cookies que guarda la contraseña
    setcookie("recuerdame",$_POST["check"],time()+(365*24*60*60)); //cookie que guarda el check de recuerdame
  } else {

    // sino señalamos el checkbox entonces eliminamos las cookies retrocediento el tiempo
    setcookie("nombre", "", time() - 100);
    setcookie("pass", "", time() - 100);
    setcookie("recuerdame","",time()-100);
  }
// si se ha señalado el checkbox cuyo atributo nombre es check2 entoces creamos una cookie llamada abierta con el nombre del usuario
  if(isset($_POST["check2"])){
    setcookie("abierta",$usuario);
    header("Location:inicio.php");

  }else{
    // sino eliminamos la cookie retrocediendo el tiempo
    setcookie("abierta", "", time() - 100);

  }
}
  }
}





?>