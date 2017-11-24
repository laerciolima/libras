<?php

class AvaliacaoController {

    public function index() {
        // we store all the posts in a variable

        $avaliacoes = AvaliacaoDAO::all();
        require_once('views/avaliacao/index.php');

    }

    public function delete() {
        // we store all the posts in a variable

        if (!AvaliacaoDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o avaliacao!";
        }else{
            $_SESSION['success'] = "Avaliacao removido com sucesso!";
        }

        return call('avaliacao', 'index');

    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $avaliacao = AvaliacaoDAO::find($_GET['id']);
        require_once('views/avaliacao/view.php');
    }

    public function add() {
        if (isset($_POST['nota_configuracao_mao'])) {

          $usuario_logado = $_SESSION['login_object'];


        $avaliacao = new Avaliacao();
        $avaliacao->setNota_configuracao_mao($_POST["nota_configuracao_mao"]);
        $avaliacao->setNota_expressao_facial($_POST["nota_expressao_facial"]);

        $avaliacao->setNota_movimento($_POST["nota_movimento"]);
        $avaliacao->setNota_orientacao($_POST["nota_orientacao"]);
        $avaliacao->setNota_ponto_articulacao($_POST["nota_ponto_articulacao"]);
        $avaliacao->setFk_id_gravacao($_POST["fk_id_gravacao"]);
        $avaliacao->setFk_id_usuario($usuario_logado['id']);

        $avaliacao->setObservacoes($_POST["observacoes"]);

        $avaliacao->setAcerto($_POST['sinal_avaliacao']);


        $soma_das_notas = $_POST["nota_configuracao_mao"] + $_POST["nota_expressao_facial"] + $_POST["nota_movimento"] + $_POST["nota_orientacao"] + $_POST["nota_ponto_articulacao"];
        $avaliacao->setNota_media($soma_das_notas/5);
        $avaliacao->setNota_final($soma_das_notas/5);

            if(AvaliacaoDAO::add($avaliacao)){
                echo "addAvaliacao=true";
            }else{
                echo "addAvaliacao=false";
          }

        }

    }

    public function edit() {

        if (isset($_POST['nota_configuracao_mao'])) {
            $avaliacao = new Avaliacao();
            $avaliacao->setId(base64_decode($_GET['id']));
        $avaliacao->setData($_POST["data"]);
        $avaliacao->setNota_configuracao_mao($_POST["nota_configuracao_mao"]);
        $avaliacao->setNota_expressao_facial($_POST["nota_expressao_facial"]);
        $avaliacao->setNota_media($_POST["nota_media"]);
        $avaliacao->setNota_movimento($_POST["nota_movimento"]);
        $avaliacao->setNota_orientacao($_POST["nota_orientacao"]);
        $avaliacao->setNota_ponto_articulacao($_POST["nota_ponto_articulacao"]);
        $avaliacao->setFk_id_gravacao($_POST["fk_id_gravacao"]);
        $avaliacao->setFk_id_usuario($_POST["fk_id_usuario"]);
        $avaliacao->setNota_final($_POST["nota_final"]);
        $avaliacao->setObservacoes($_POST["observacoes"]);

            if (!AvaliacaoDAO::edit($avaliacao)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Avaliacao alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=avaliacao&action=index\">";
                die();            }

        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $avaliacao = AvaliacaoDAO::find(base64_decode($_GET['id']));
        require_once('views/avaliacao/edit.php');
    }

}

?>
