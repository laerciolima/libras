<?php

function call($controller, $action) {
    require_once('controllers/' . ucfirst($controller) . 'Controller.php');
    require_once('models/' . ucfirst($controller) . 'DAO.php');
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

        case 'login':
            // we need the model to query the database later in the controller
            $controller = new LoginController();
            break;

        case 'modulo':
            // we need the model to query the database later in the controller
            $controller = new ModuloController();
            break;
        case 'categoria':
            // we need the model to query the database later in the controller
            $controller = new CategoriaController();
            break;
        case 'gravacao':
            // we need the model to query the database later in the controller
            require_once('models/CategoriaDAO.php');
            require_once('models/ModuloDAO.php');
            require_once('models/SinalDAO.php');
            require_once('models/UsuarioDAO.php');
            require_once('models/AvaliacaoDAO.php');
            require_once('controllers/UsuarioController.php');
            $controller = new GravacaoController();
            break;
        case 'movimento':
            // we need the model to query the database later in the controller
            $controller = new MovimentoController();
            break;
        case 'configuracaoDeMao':
            // we need the model to query the database later in the controller
            $controller = new ConfiguracaoDeMaoController();
            break;
        case 'expressaoFacial':
            // we need the model to query the database later in the controller
            $controller = new ExpressaoFacialController();
            break;
         case 'pontoDeArticulacao':
            // we need the model to query the database later in the controller
            $controller = new PontoDeArticulacaoController();
            break;
        case 'sinal':
            // we need the model to query the database later in the controller
            require_once('models/ExpressaoFacialDAO.php');
            require_once('models/PontoDeArticulacaoDAO.php');
            require_once('models/ModuloDAO.php');
            $controller = new SinalController();
            break;
        case 'atividade':
            // we need the model to query the database later in the controller
            require_once('models/ModuloDAO.php');
            require_once('models/SinalDAO.php');
            require_once('models/GravacaoDAO.php');
            require_once('models/CategoriaDAO.php');
            $controller = new AtividadeController();
            break;
        case 'avaliacao':
            // we need the model to query the database later in the controller
            $controller = new AvaliacaoController();

            break;
        case 'badge':
            // we need the model to query the database later in the controller
            $controller = new BadgeController();
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
$controllers = array('pages' => ['home', 'error','avaliar', 'amigos', 'gravar'],
    'usuario' => ['index', 'add', 'edit', 'view', 'home', 'delete', 'ranking', 'amigos', 'buscarUsuario', 'getPontuacao', 'notificacoes', 'removerAmizade', 'aceitarAmizade', 'addAmigo', 'perfil'],
    'modulo' => ['index', 'add', 'edit', 'view','delete'],
    'categoria' => ['index', 'add', 'edit', 'view','delete', 'lista'],
    'sinal' => ['index', 'add', 'edit', 'view','delete'],
    'avaliacao' => ['index', 'add', 'edit', 'view','delete'],
    'gravacao' => ['index', 'add', 'edit', 'view','delete','play', 'verificarResposta', 'meusVideos'],
    'movimento' => ['index', 'add', 'edit', 'view','delete'],
    'atividade' => ['index', 'add', 'edit', 'view','delete', 'lista', 'play'],
    'configuracaoDeMao' => ['index', 'add', 'edit', 'view','delete'],
    'pontoDeArticulacao' => ['index', 'add', 'edit', 'view','delete'],
    'expressaoFacial' => ['index', 'add', 'edit', 'view','delete'],
    'badge' => ['index', 'add', 'edit', 'view','delete'],
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
