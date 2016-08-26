<?php

class RankingController {

    public function index() {
        // we store all the posts in a variable
        
        //$rankings = RankingDAO::all();
        require_once('views/ranking/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!RankingDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o ranking!";
        }else{
            $_SESSION['success'] = "Ranking removido com sucesso!"; 
        }

        return call('ranking', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $ranking = RankingDAO::find($_GET['id']);
        require_once('views/ranking/view.php');
    }

    public function add() {
        if (isset($_POST['nome'])) {


            $ranking = new Ranking();
        $ranking->setPosicao($_POST["posicao"]);
        $ranking->setNome($_POST["nome"]);
        $ranking->setNivel($_POST["nivel"]);
        $ranking->setPontuacao($_POST["pontuacao"]);
        $ranking->setfk_id_usuario($_POST["fk_id_usuario"]);
            if(RankingDAO::add($ranking)){
                $_SESSION['success'] = "Ranking cadastrado com sucesso!";
                header("Location: ?controller=ranking&action=index");
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/ranking/add.php');
    }

    public function edit() {

        if (isset($_POST['nome'])) {
            $ranking = new Ranking();
            $ranking->setId(base64_decode($_GET['id']));
        $ranking->setPosicao($_POST["posicao"]);
        $ranking->setNome($_POST["nome"]);
        $ranking->setNivel($_POST["nivel"]);
        $ranking->setPontuacao($_POST["pontuacao"]);
        $ranking->setfk_id_usuario($_POST["fk_id_usuario"]);
            
            if (!RankingDAO::edit($ranking)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Ranking alterado com sucesso!";
                header("Location: ?controller=ranking&action=index");
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $ranking = RankingDAO::find(base64_decode($_GET['id']));
        require_once('views/ranking/edit.php');
    }

}

?>