<?php

class BadgeController {

    public function index() {
        // we store all the posts in a variable
        
        $badges = BadgeDAO::all();
        require_once('views/badge/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!BadgeDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o badge!";
        }else{
            $_SESSION['success'] = "Badge removido com sucesso!"; 
        }

        return call('badge', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $badge = BadgeDAO::find($_GET['id']);
        require_once('views/badge/view.php');
    }

    public function add() {
        if (isset($_POST['img'])) {


            $badge = new Badge();
        $badge->setDescricao($_POST["descricao"]);
        $badge->setImg($_POST["img"]);
            if(BadgeDAO::add($badge)){
                $_SESSION['success'] = "Badge cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=badge&action=index\">";
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/badge/add.php');
    }

    public function edit() {

        if (isset($_POST['img'])) {
            $badge = new Badge();
            $badge->setId(base64_decode($_GET['id']));
        $badge->setDescricao($_POST["descricao"]);
        $badge->setImg($_POST["img"]);
            
            if (!BadgeDAO::edit($badge)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Badge alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=badge&action=index\">";
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $badge = BadgeDAO::find(base64_decode($_GET['id']));
        require_once('views/badge/edit.php');
    }

}

?>