<?php

class MovimentoController
{

    public function index()
    {
        // we store all the posts in a variable

        $movimentos = MovimentoDAO::all();
        require_once 'views/movimento/index.php';

    }

    public function delete()
    {
        // we store all the posts in a variable

        if (!MovimentoDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o movimento!";
        } else {
            $_SESSION['success'] = "Movimento removido com sucesso!";
        }

        return call('movimento', 'index');

    }

    public function view()
    {
        if (!isset($_GET['id'])) {
            return call('page', 'error');
        }

        // we use the given id to get the right post
        $movimento = MovimentoDAO::find($_GET['id']);
        require_once 'views/movimento/view.php';
    }

    public function add()
    {
        if (isset($_POST['nome'])) {

            $movimento = new Movimento();
            $movimento->setNome($_POST["nome"]);

            $foto = $_FILES["imagem"];

            require_once "IOUtils.php";
            $ioUtils = new IOUtils();

            // Se a foto estiver sido selecionada
            echo "nome foto" . $foto["name"];
            if (!empty($foto["name"])) {
                
                $error = $ioUtils->processImage($foto, "storage/imagens/movimento/", 1920, 1920, 1000000);

                // Se houver mensagens de erro, exibe-as
                if (count($error) != 0) {
                    $retorno_erro = "";
                    foreach ($error as $erro) {
                        $retorno_erro .= $erro . "<br />";
                    }
                    $_SESSION['error'] = $retorno_erro;
                    
                    echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=movimento&action=index\">";
                    die();
                }
                $movimento->setImagem($ioUtils->saveImage());
                if (MovimentoDAO::add($movimento)) {
                    $_SESSION['success'] = "Movimento cadastrado com sucesso!";
                    echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=movimento&action=index\">";
                    die();} else {
                    $_SESSION['error'] = "Ocorreu um erro no cadastro!";
                }
            }

        }
        require_once 'views/movimento/add.php';
    }

    public function edit()
    {

        if (isset($_POST['imagem'])) {
            $movimento = new Movimento();
            $movimento->setId(base64_decode($_GET['id']));
            $movimento->setNome($_POST["nome"]);
            $movimento->setImagem($_POST["imagem"]);

            if (!MovimentoDAO::edit($movimento)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Movimento alterado com sucesso!";
                header("Location: ?controller=movimento&action=index");
                die();}

        }

        if (!isset($_GET['id'])) {
            return call('page', 'error');
        }

        // we use the given id to get the right post"

        $movimento = MovimentoDAO::find(base64_decode($_GET['id']));
        require_once 'views/movimento/edit.php';
    }

}
