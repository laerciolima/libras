

<link rel="stylesheet" type="text/css" href="webroot/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="webroot/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="webroot/css/menu.css">
<link rel="stylesheet" type="text/css" href="webroot/css/estilo.css">
<link rel="stylesheet" type="text/css" href="webroot/css/select2.min.css">
<script src="webroot/js/jquery.min.js" ></script>
<script src="webroot/js/bootstrap.min.js" ></script>
<script src="webroot/js/jquery.dataTables.min.js" ></script>
<script src="webroot/js/jquery.maskedinput.js" ></script>
<script src="webroot/js/select2.min.js" ></script>


<script src="webroot/js/scripts.js" ></script>




<?php
if(isset($_GET['validation'])){
 
    @require_once('controllers/UsuarioController.php');


    if(UsuarioController::validarUsuario($_GET['validation'])){
        echo "E-mail confirmado.";
    }else{
        echo "URL inválida.";
    }

    echo "<meta http-equiv=\"Refresh\" content=\"1; url=views/login/index.php\">";

    die();
}

if(!isset($_SESSION)){
    session_start();
}
require_once('connection.php');
require_once 'controllers/LoginController.php';
if (!LoginController::isLogged()) {
    header("Location: views/login/index.php");
    //die();
}
$usuario_logado = $_SESSION['login_object'];

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}

require_once('views/layout.php');
?>
