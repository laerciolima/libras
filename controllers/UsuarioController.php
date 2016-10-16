<?php

class UsuarioController {

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
            $error = [];
            $imagem_alterada = 0;
            
            
            // Se a foto estiver sido selecionada
            if (!empty($foto["name"])) {
                $imagem_alterada = 1;
                // Largura máxima em pixels
                $largura = 500;
                // Altura máxima em pixels
                $altura = 500;
                // Tamanho máximo do arquivo em bytes
                $tamanho = 100000;

                // Verifica se o arquivo é uma imagem
                if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
                    $error[1] = "Isso não é uma imagem.";

                }

                // Pega as dimensões da imagem
                $dimensoes = getimagesize($foto["tmp_name"]);

                // Verifica se a largura da imagem é maior que a largura permitida
                if($dimensoes[0] > $largura) {
                    $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";

                }

                // Verifica se a altura da imagem é maior que a altura permitida
                if($dimensoes[1] > $altura) {
                    $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
                }

                // Verifica se o tamanho da imagem é maior que o tamanho permitido

                if($foto["size"] > $tamanho) {
                    $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
                }

                // Se não houver nenhum erro

                if (count($error) == 0) {
                    // Pega extensão da imagem
                    preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

                    // Gera um nome único para a imagem
                    $nome_imagem = md5(uniqid(time())) . "." . $ext[1];

                    // Caminho de onde ficará a imagem
                    $caminho_imagem = "storage/imagens/users/" . $nome_imagem;

                    // Faz o upload da imagem para seu respectivo caminho
                    move_uploaded_file($foto["tmp_name"], $caminho_imagem);

                    $usuario->setImagem($nome_imagem);
                }

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
            }











            if (!UsuarioDAO::edit($usuario)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Usuario alterado com sucesso!";
                
                if($imagem_alterada)
                    unlink("storage/imagens/users/".$usuario_logado['imagem']);
                
                
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

}

?>
