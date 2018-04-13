<?php

class ExpressaoFacialController {

    public function index() {
        // we store all the posts in a variable
        
        $expressoesfaciais = ExpressaoFacialDAO::all();
        require_once('views/expressaofacial/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!ExpressaoFacialDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o expressaofacial!";
        }else{
            $_SESSION['success'] = "ExpressaoFacial removido com sucesso!"; 
        }

        return call('expressaoFacial', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $expressaofacial = ExpressaoFacialDAO::find($_GET['id']);
        require_once('views/expressaofacial/view.php');
    }

    public function add() {
        if (isset($_POST['imagem'])) {


            $expressaofacial = new ExpressaoFacial();
        $expressaofacial->setNome($_POST["nome"]);
        $expressaofacial->setImagem($_POST["imagem"]);
            if(ExpressaoFacialDAO::add($expressaofacial)){
                $_SESSION['success'] = "ExpressaoFacial cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=expressaoFacial&action=index\">";
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/expressaofacial/add.php');
    }

    public function edit() {

        if (isset($_POST['imagem'])) {
            $expressaofacial = new ExpressaoFacial();
            $expressaofacial->setId(base64_decode($_GET['id']));
        $expressaofacial->setNome($_POST["nome"]);
        $expressaofacial->setImagem($_POST["imagem"]);
            
            if (!ExpressaoFacialDAO::edit($expressaofacial)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "ExpressaoFacial alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=expressaoFacial&action=index\">";
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $expressaofacial = ExpressaoFacialDAO::find(base64_decode($_GET['id']));
        require_once('views/expressaofacial/edit.php');
    }

}

?>