<?php

function call($controller, $action) {
    require_once('controllers/' . ucfirst($controller) . 'Controller.php');
    if ($controller != "login")
        verificacoes();
    switch ($controller) {
        case 'pages':
            $controller = new PagesController();
            break;
        case 'posts':
            // we need the model to query the database later in the controller
            require_once('models/post.php');
            $controller = new PostsController();
            break;
        case 'usuario':
            // we need the model to query the database later in the controller
            require_once('models/UsuarioDAO.php');
            $controller = new UsuarioController();
            break;
        case 'universidade':
            // we need the model to query the database later in the controller
            require_once('models/UniversidadeDAO.php');
            $controller = new UniversidadeController();
            break;
        case 'estudante':
            // we need the model to query the database later in the controller
            require_once('models/EstudanteDAO.php');
            require_once('models/UniversidadeDAO.php');
            $controller = new EstudanteController();
            break;
        case 'login':
        case 'ranking':
            // we need the model to query the database later in the controller
            require_once('models/RankingDAO.php');
            $controller = new RankingController();
            break;
        case 'login':
            // we need the model to query the database later in the controller
            require_once('models/UsuarioDAO.php');
            $controller = new LoginController();
            break;
    }

    $controller->{ $action }();
}

function verificacoes() {
    
    
    if (isset($_SESSION['success'])) {
        ?>
        <div class="alert alert-success">
            <strong><?php echo $_SESSION['success']; ?></strong> 
        </div>
        <?php
        unset($_SESSION['success']);
    }
    if (isset($_SESSION['error'])) {
        ?>
        <div class="alert alert-danger">
            <strong><?php echo $_SESSION['error']; ?></strong> 
        </div>
        <?php
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['warning'])) {
        ?>
        <div class="alert alert-warning">
            <strong><?php echo $_SESSION['warning']; ?></strong> 
        </div>
        <?php
        unset($_SESSION['warning']);
    }
}

// we're adding an entry for the new controller and its actions
$controllers = array('pages' => ['home', 'error','avaliar', 'amigos'],
    'usuario' => ['index', 'add', 'edit', 'view', 'home', 'delete'],
    'universidade' => ['index', 'add', 'edit', 'view', 'delete'],
    'estudante' => ['index', 'add', 'edit', 'view', 'delete'],
    'ranking' => ['index'],
    'login' => ['login', 'logout'],
    'posts' => ['index', 'show' ]);

if (array_key_exists($controller, $controllers)) {
    if (in_array($action, $controllers[$controller])) {
        call($controller, $action);
    } else {
        call('pages', 'error');
    }
} else {
    call('pages', 'error');
}
?>