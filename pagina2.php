<?php
//abrimos siempre una sesión sino se producirá un error
session_start();

// si no existe una sesion llamada verificado y una cookie llamada abierta
if(!isset($_SESSION["verificado"])&& !isset($_COOKIE["abierta"])){
// se produce un error y redirigimos a la pagina del login
    header("Location:/TareaPHP3/login.php?error=fuera");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php  require 'head.php'?>
    <title>Pagina2</title>
</head>
<body>

<div class="encabezado">
  <h1>DAWES-PRÁCTICA#2:SESIONES Y COOKIES</h1>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-xs-1 col-md-1 col-lg-1, cuerpo text-center">
            <nav class="navbar  navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href='inicio.php'>Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="pagina2.php">Pagina2</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="col col-xs-3 col-md-3 col-lg-3, cuerpo text-center" >
        <p></p>
        </div>
        <div class="col col-xs-3 col-md-3 col-lg-3, cuerpo text-center" >
        <a class="link" href="cerrarSesion.php" style="color:black;">Cerrar sesión</a>
        </div>
    </div>
    
</div>

<div class="container-fluid">
<div class="row justify-content-center">
        <div class="cuerpo text-center">
            <h1>MISitio-Pagina2</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="cuerpo text-center">
            <?php
           
           
           
           
           
           if(isset($_COOKIE["abierta"])){

                echo "<h2>Bienvenido ".$_COOKIE["abierta"]."</br>";

           }else{

            echo "<h2>Bienvenido ".$_COOKIE["usuario"]."</br>";
           }
           
           
           
           
        
           
           ?>
        </div>
    </div>
</div>
<?php  require 'footer.php'?>

</body>
</html>