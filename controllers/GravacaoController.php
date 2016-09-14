<?php

class GravacaoController {

    public function index() {
        // we store all the posts in a variable
        
        $gravacoes = GravacaoDAO::all();
        require_once('views/gravacao/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!GravacaoDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o gravacao!";
        }else{
            $_SESSION['success'] = "Gravacao removido com sucesso!"; 
        }

        return call('gravacao', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $gravacao = GravacaoDAO::find($_GET['id']);
        require_once('views/gravacao/view.php');
    }

    public function add() {
        if (isset($_POST['video'])) {


            $gravacao = new Gravacao();
        $gravacao->setData($_POST["data"]);
        $gravacao->setVideo($_POST["video"]);
        $gravacao->setFk_id_sinal($_POST["fk_id_sinal"]);
        $gravacao->setFk_id_usuario($_POST["fk_id_usuario"]);
            if(GravacaoDAO::add($gravacao)){
                $_SESSION['success'] = "Gravacao cadastrado com sucesso!";
                header("Location: ?controller=gravacao&action=index");
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/gravacao/add.php');
    }

    public function edit() {

        if (isset($_POST['video'])) {
            $gravacao = new Gravacao();
            $gravacao->setId(base64_decode($_GET['id']));
        $gravacao->setData($_POST["data"]);
        $gravacao->setVideo($_POST["video"]);
        $gravacao->setFk_id_sinal($_POST["fk_id_sinal"]);
        $gravacao->setFk_id_usuario($_POST["fk_id_usuario"]);
            
            if (!GravacaoDAO::edit($gravacao)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Gravacao alterado com sucesso!";
                header("Location: ?controller=gravacao&action=index");
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $gravacao = GravacaoDAO::find(base64_decode($_GET['id']));
        require_once('views/gravacao/edit.php');
    }

}

?>