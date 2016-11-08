<?php
$usuarioController = new UsuarioController();
class UsuarioController {


  public function __construct() {
     if (isset($_POST['metodo'])) {
         switch ($_POST['metodo']) {
             case 'getPontuacao':
                 self::getPontuacao();
                 break;
         }
     }
   }


    public function index() {
        // we store all the posts in a variable

        $usuarios = UsuarioDAO::all();
        require_once('views/usuario/index.php');
    }

    public function home() {
        // we store all the posts in a variable
        include_once 'models/ModuloDAO.php';

        $modulos = ModuloDAO::all();

        require_once('views/usuario/home.php');
    }

    public function delete() {
        // we store all the posts in a variable

        if (!UsuarioDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o usuario!";
        } else {
            $_SESSION['success'] = "Usuario removido com sucesso!";
        }

        return call('usuario', 'index');
    }

    public function view() {
        if (!isset($_GET['id']))
        return call('page', 'error');

        // we use the given id to get the right post
        $usuario = UsuarioDAO::find($_GET['id']);
        require_once('views/usuario/view.php');
    }

    public function ranking() {
        $ranking_geral = UsuarioDAO::rankingGeral();
        $usuario_logado =  $_SESSION['login_object'];
        $ranking_amigos = UsuarioDAO::rankingAmigos($usuario_logado['id']);
        require_once('views/ranking/index.php');
    }

    public function amigos() {
        $usuario_logado = $_SESSION['login_object'];
        $usuarios = UsuarioDAO::amigos($usuario_logado['id']);
        require_once('views/usuario/amigos.php');
    }

    public static function validarUsuario($url) {
        if(UsuarioDAO::validarUsuario($url)){
            require_once('views/usuario/amigos.php');
        }

    }

    public static function addAmigo($id){
        $usuario_logado = $_SESSION['login_object'];
        if(UsuarioDAO::addAmigo($usuario_logado['id'], $id)){
            echo "true";
        }

    }

    public static function buscarUsuario(){
        $usuario_logado = $_SESSION['login_object'];
        $usuarios = UsuarioDAO::buscarUsuario($_GET['busca'], $usuario_logado['id']);
        require_once('views/usuario/amigos.php');


    }

    public function add() {
        if (isset($_POST['email'])) {


            $usuario = new Usuario();
            $usuario->setNome($_POST["nome"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPerfil($_POST["perfil"]);
            $usuario->setusuario($_POST["usuario"]);
            $usuario->setSenha($_POST["senha"]);
            $usuario->setNivel($_POST["nivel"]);
            $usuario->setPontuacao($_POST["pontuacao"]);
            $usuario->setImagem($_POST["imagem"]);
            if (UsuarioDAO::add($usuario)) {
                $_SESSION['success'] = "Usuario cadastrado com sucesso!";
                header("Location: ?controller=usuario&action=index");
                die();
            } else {
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
        }
        require_once('views/usuario/add.php');
    }

    public function edit() {
        $usuario_logado = $_SESSION['login_object'];
        if (isset($_POST['nome'])) {
            $usuario = new Usuario();
            $usuario->setId($usuario_logado['id']);
            $usuario->setNome($_POST["nome"]);
            $usuario->setImagem($usuario_logado['imagem']);





            $foto = $_FILES["imagem"];

            $imagem_alterada = 0;


            // Se a foto estiver sido selecionada
            if (!empty($foto["name"])) {

                $ioUtils = new IOUtils();
                $error = $ioUtils->processImage($foto, "storage/imagens/users/", 500, 500, 100000);


                // Se houver mensagens de erro, exibe-as
                if (count($error) != 0) {
                    $retorno_erro  = "";
                    foreach ($error as $erro) {
                        $retorno_erro .= $erro . "<br />";
                    }
                    $_SESSION['error'] = $retorno_erro;

                    echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=usuario&action=edit\">";
                    die();
                }
                $usuario->setImagem($ioUtils->saveImage());
                $imagem_alterada =1;
            }




            if (!UsuarioDAO::edit($usuario)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Usuario alterado com sucesso!";

                if($imagem_alterada)
                    IOUtils::unlink("storage/imagens/users/".$usuario_logado['imagem']);


                $usuario_logado['nome'] = $usuario->getNome();
                $usuario_logado['imagem'] = $usuario->getImagem();

                $_SESSION['login_object'] = $usuario_logado;


                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=usuario&action=edit\">";
                die();
            }
        }


        // we use the given id to get the right post"


        $usuario = UsuarioDAO::find(($usuario_logado['id']));

        require_once('views/usuario/edit.php');
    }


    function addPontuacao($pontuacao){
        $usuario_logado = $_SESSION['login_object'];

        $usuario = new Usuario();

        if($usuario_logado['pontuacao']+$pontuacao > 200){
            $usuario_logado['pontuacao'] = $usuario_logado['pontuacao']+$pontuacao - 200;
            $usuario_logado['nivel'] += 1;
        }else{
            $usuario_logado['pontuacao'] += $pontuacao;
        }
        $_SESSION['login_object'] = $usuario_logado;
        $usuario->setPontuacao($usuario_logado['pontuacao']);
        $usuario->setNivel($usuario_logado['nivel']);
        $usuario->setId($usuario_logado['id']);

        return UsuarioDAO::addPontuacao($usuario);
    }


    function getPontuacao(){
      if(!isset($_SESSION)){
        session_start();
      }
      @require_once '../connection.php';
      @require_once '../models/Usuario.php';
      @require_once '../models/UsuarioDAO.php';
      $usuario_logado = $_SESSION['login_object'];
      $usuario = UsuarioDAO::find($usuario_logado['id']);
      echo $usuario->getNivel()."#".$usuario->getPontuacao();
    }

}

?>
