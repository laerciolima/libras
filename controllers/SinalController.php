<?php

class SinalController {

    public function index() {
        // we store all the posts in a variable
        
        $sinais = SinalDAO::all();
        require_once('views/sinal/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!SinalDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o sinal!";
        }else{
            $_SESSION['success'] = "Sinal removido com sucesso!"; 
        }

        return call('sinal', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $sinal = SinalDAO::find($_GET['id']);
        require_once('views/sinal/view.php');
    }

    public function add() {
        if (isset($_POST['dificuldade'])) {


            $sinal = new Sinal();
        $sinal->setFk_id_categoria($_POST["fk_id_categoria"]);
        $sinal->setDificuldade($_POST["dificuldade"]);
        $sinal->setFoto($_POST["foto"]);
        $sinal->setNome($_POST["nome"]);
        $sinal->setOrientacao($_POST["orientacao"]);
        $sinal->setVideo($_POST["video"]);
        $sinal->setFk_id_expressao_facial($_POST["fk_id_expressao_facial"]);
        $sinal->setFk_id_ponto_de_articulacao($_POST["fk_id_ponto_de_articulacao"]);
            if(SinalDAO::add($sinal)){
                $_SESSION['success'] = "Sinal cadastrado com sucesso!";
                header("Location: ?controller=sinal&action=index");
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/sinal/add.php');
    }

    public function edit() {

        if (isset($_POST['dificuldade'])) {
            $sinal = new Sinal();
            $sinal->setId(base64_decode($_GET['id']));
        $sinal->setFk_id_categoria($_POST["fk_id_categoria"]);
        $sinal->setDificuldade($_POST["dificuldade"]);
        $sinal->setFoto($_POST["foto"]);
        $sinal->setNome($_POST["nome"]);
        $sinal->setOrientacao($_POST["orientacao"]);
        $sinal->setVideo($_POST["video"]);
        $sinal->setFk_id_expressao_facial($_POST["fk_id_expressao_facial"]);
        $sinal->setFk_id_ponto_de_articulacao($_POST["fk_id_ponto_de_articulacao"]);
            
            if (!SinalDAO::edit($sinal)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Sinal alterado com sucesso!";
                header("Location: ?controller=sinal&action=index");
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $sinal = SinalDAO::find(base64_decode($_GET['id']));
        require_once('views/sinal/edit.php');
    }

}

?>