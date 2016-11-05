<?php

class GravacaoController {


  public function __construct() {

     if (isset($_POST['metodo'])) {
         switch ($_POST['metodo']) {
             case 'getPontuacao':
                 self::getPontuacao();
                 break;
         }
     }
   }

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
        $gravacao->setdata($_POST["data"]);
        $gravacao->setVideo($_POST["video"]);
        $gravacao->setFk_id_sinal($_POST["fk_id_sinal"]);
        $gravacao->setFk_id_usuario($_POST["fk_id_usuario"]);
            if(GravacaoDAO::add($gravacao)){
                $_SESSION['success'] = "Gravacao cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=gravacao&action=index\">";
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
        $gravacao->setdata($_POST["data"]);
        $gravacao->setVideo($_POST["video"]);
        $gravacao->setFk_id_sinal($_POST["fk_id_sinal"]);
        $gravacao->setFk_id_usuario($_POST["fk_id_usuario"]);

            if (!GravacaoDAO::edit($gravacao)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Gravacao alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=gravacao&action=index\">";
                die();
                  }

        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $gravacao = GravacaoDAO::find(base64_decode($_GET['id']));
        require_once('views/gravacao/edit.php');
    }

    public function play(){
        $type = -1;
        $id = 0;
        if(isset($_GET['modulo'])){
            $type = 0;
            $id = $_GET['modulo'];
        }else if(isset($_GET['categoria'])){
            $type = 1;
            $id = $_GET['categoria'];
        }

        $usuario_logado = $_SESSION['login_object'];
        $gravacoes = GravacaoDAO::getGravacoesAleatorias($type, $id, $usuario_logado['id'], 8);

        for($i= 0; $i < count($gravacoes); $i++){
            $sinal = SinalDAO::find($gravacoes[$i]->getFk_id_sinal());
            $opcoes = [];
            echo $sinal->getNome()."-";
            $opcoes[] = $sinal->getNome();
            $opcoes = array_merge($opcoes, CategoriaDAO::getOpcoes($sinal->getId(), $sinal->getCategoria_id()));
            sort($opcoes, SORT_STRING);
            $gravacoes[$i]->setOpcoes($opcoes);

        }

        require_once('views/pages/jogar.php');
    }

    public function verificarResposta(){

      $fk_id_sinal = $_POST['fk_id_sinal'];
      $resposta =  $_POST['resposta'];

      if(GravacaoDAO::respostaCorreta($fk_id_sinal, $resposta)){
        $usuarioController = new UsuarioController();
        $usuarioController->addPontuacao(10);
        echo "verificarResposta=true";
      }else{
        echo "false";
      }
    }

}

?>
