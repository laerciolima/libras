<?php

class ConfiguracaoDeMaoController {

    public function index() {
        // we store all the posts in a variable
        
        $configuracoesdemaos = ConfiguracaoDeMaoDAO::all();
        require_once('views/configuracaodemao/index.php');
        
    }

    public function delete() {
        // we store all the posts in a variable

        if (!ConfiguracaoDeMaoDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o configuracaodemao!";
        }else{
            $_SESSION['success'] = "ConfiguracaoDeMao removido com sucesso!"; 
        }

        return call('configuracaoDeMao', 'index');
        
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $configuracaodemao = ConfiguracaoDeMaoDAO::find($_GET['id']);
        require_once('views/configuracaodemao/view.php');
    }

    public function add() {
        if (isset($_POST['imagem'])) {


            $configuracaodemao = new ConfiguracaoDeMao();
        $configuracaodemao->setNome($_POST["nome"]);
        $configuracaodemao->setImagem($_POST["imagem"]);
            if(ConfiguracaoDeMaoDAO::add($configuracaodemao)){
                $_SESSION['success'] = "ConfiguracaoDeMao cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=configuracaoDeMao&action=index\">";
                die();            }else{
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
            
        }
        require_once('views/configuracaodemao/add.php');
    }

    public function edit() {

        if (isset($_POST['imagem'])) {
            $configuracaodemao = new ConfiguracaoDeMao();
            $configuracaodemao->setId(base64_decode($_GET['id']));
        $configuracaodemao->setNome($_POST["nome"]);
        $configuracaodemao->setImagem($_POST["imagem"]);
            
            if (!ConfiguracaoDeMaoDAO::edit($configuracaodemao)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "ConfiguracaoDeMao alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=configuracaoDeMao&action=index\">";
                die();            }
            
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $configuracaodemao = ConfiguracaoDeMaoDAO::find(base64_decode($_GET['id']));
        require_once('views/configuracaodemao/edit.php');
    }

}

?>