<?php

class BadgeUsuarioController {

    public function index() {
        // we store all the posts in a variable
        
        $badge_usuarios = BadgeUsuarioDAO::all();
        require_once('views/badgeusuario/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!BadgeUsuarioDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o badgeusuario!";
        }else{
            $_SESSION['success'] = "BadgeUsuario removido com sucesso!"; 
        }

        return call('badgeusuario', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $badgeusuario = BadgeUsuarioDAO::find($_GET['id']);
        require_once('views/badgeusuario/view.php');
    }

    public function add() {
        if (isset($_POST['fk_id_badge'])) {


            $badgeusuario = new BadgeUsuario();
        $badgeusuario->setFk_id_usuario($_POST["fk_id_usuario"]);
        $badgeusuario->setFk_id_badge($_POST["fk_id_badge"]);
        $badgeusuario->setData($_POST["data"]);
            if(BadgeUsuarioDAO::add($badgeusuario)){
                $_SESSION['success'] = "BadgeUsuario cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=badgeusuario&action=index\">";
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/badgeusuario/add.php');
    }

    public function edit() {

        if (isset($_POST['fk_id_badge'])) {
            $badgeusuario = new BadgeUsuario();
            $badgeusuario->setId(base64_decode($_GET['id']));
        $badgeusuario->setFk_id_usuario($_POST["fk_id_usuario"]);
        $badgeusuario->setFk_id_badge($_POST["fk_id_badge"]);
        $badgeusuario->setData($_POST["data"]);
            
            if (!BadgeUsuarioDAO::edit($badgeusuario)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "BadgeUsuario alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=badgeusuario&action=index\">";
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $badgeusuario = BadgeUsuarioDAO::find(base64_decode($_GET['id']));
        require_once('views/badgeusuario/edit.php');
    }

}

?>