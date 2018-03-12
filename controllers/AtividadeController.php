<?php

class AtividadeController {

    public function index() {
        // we store all the posts in a variable
        
        $atividades = AtividadeDAO::all();
        require_once('views/atividade/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!AtividadeDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o atividade!";
        }else{
            $_SESSION['success'] = "Atividade removido com sucesso!"; 
        }

        return call('atividade', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $atividade = AtividadeDAO::find($_GET['id']);
        require_once('views/atividade/view.php');
    }

    public function add() {
        if (isset($_POST['descricao'])) {


            $atividade = new Atividade();
        $atividade->setTitulo($_POST["titulo"]);
        $atividade->setDescricao($_POST["descricao"]);
        $atividade->setOrdem($_POST["ordem"]);
        $atividade->setFk_id_Modulo($_POST["fk_id_modulo"]);
            if(AtividadeDAO::add($atividade)){
                $_SESSION['success'] = "Atividade cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=atividade&action=index\">";
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/atividade/add.php');
    }

    public function edit() {

        if (isset($_POST['descricao'])) {
            $atividade = new Atividade();
            $atividade->setId(base64_decode($_GET['id']));
        $atividade->setTitulo($_POST["titulo"]);
        $atividade->setDescricao($_POST["descricao"]);
        $atividade->setOrdem($_POST["ordem"]);
        $atividade->setFk_id_Modulo($_POST["fk_id_modulo"]);
            
            if (!AtividadeDAO::edit($atividade)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Atividade alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=atividade&action=index\">";
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $atividade = AtividadeDAO::find(base64_decode($_GET['id']));
        require_once('views/atividade/edit.php');
    }

}

?>