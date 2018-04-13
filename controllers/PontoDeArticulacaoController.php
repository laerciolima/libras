<?php

class PontoDeArticulacaoController {

    public function index() {
        // we store all the posts in a variable
        
        $pontosdearticulacao = PontoDeArticulacaoDAO::all();
        require_once('views/pontodearticulacao/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!PontoDeArticulacaoDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o pontodearticulacao!";
        }else{
            $_SESSION['success'] = "PontoDeArticulacao removido com sucesso!"; 
        }

        return call('pontoDeArticulacao', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $pontodearticulacao = PontoDeArticulacaoDAO::find($_GET['id']);
        require_once('views/pontodearticulacao/view.php');
    }

    public function add() {
        if (isset($_POST['imagem'])) {


            $pontodearticulacao = new PontoDeArticulacao();
        $pontodearticulacao->setNome($_POST["nome"]);
        $pontodearticulacao->setImagem($_POST["imagem"]);
            if(PontoDeArticulacaoDAO::add($pontodearticulacao)){
                $_SESSION['success'] = "PontoDeArticulacao cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=pontoDeArticulacao&action=index\">";
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/pontodearticulacao/add.php');
    }

    public function edit() {

        if (isset($_POST['imagem'])) {
            $pontodearticulacao = new PontoDeArticulacao();
            $pontodearticulacao->setId(base64_decode($_GET['id']));
        $pontodearticulacao->setNome($_POST["nome"]);
        $pontodearticulacao->setImagem($_POST["imagem"]);
            
            if (!PontoDeArticulacaoDAO::edit($pontodearticulacao)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "PontoDeArticulacao alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=pontoDeArticulacao&action=index\">";
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $pontodearticulacao = PontoDeArticulacaoDAO::find(base64_decode($_GET['id']));
        require_once('views/pontodearticulacao/edit.php');
    }

}

?>