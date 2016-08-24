

<link rel="stylesheet" type="text/css" href="webroot/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="webroot/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="webroot/css/menu.css">
<link rel="stylesheet" type="text/css" href="webroot/css/estilo.css">
<script src="webroot/js/jquery.min.js" ></script>
<script src="webroot/js/bootstrap.min.js" ></script>
<script src="webroot/js/jquery.dataTables.min.js" ></script>
<script src="webroot/js/jquery.maskedinput.js" ></script>


<script src="webroot/js/scripts.js" ></script>
<script src="webroot/js/jogar.js" ></script>



<?php
if(!isset($_SESSION)){
    session_start();
}
require_once('connection.php');
require_once 'controllers/LoginController.php';
if (!LoginController::isLogged()) {
    header("Location: views/login/index.php");
    //die();
}

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}

require_once('views/layout.php');
?>
