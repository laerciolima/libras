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
        } else {
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
        if (isset($_POST['video'])) {


            $sinal = new Sinal();
            $sinal->setNome($_POST["nome"]);
            $sinal->setVideo($_POST["video"]);
            $sinal->setFoto($_POST["foto"]);
            $sinal->setOrientacao($_POST["orientacao"]);
            $sinal->setExpressaoFacial_idExpressaoFacial($_POST["expressaofacial_idexpressaofacial"]);
            $sinal->setPontoDeArticulacao_idPontoDeArticulacao($_POST["pontodearticulacao_idpontodearticulacao"]);
            $sinal->setSinalDefinePesoInicial($_POST["sinaldefinepesoinicial"]);
            $sinal->setModulo_id($_POST["modulo_id"]);
            $sinal->setUtilizacaoDasMaos($_POST["utilizacaodasmaos"]);
            $sinal->setMaoPrincipal_id($_POST["maoprincipal_id"]);
            $sinal->setMaoSecundaria_id($_POST["maosecundaria_id"]);
            if (SinalDAO::add($sinal)) {
                $_SESSION['success'] = "Sinal cadastrado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=sinal&action=index\">";
                die();
            } else {
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
        }
        require_once('views/sinal/add.php');
    }

    public function edit() {

        if (isset($_POST['video'])) {
            $sinal = new Sinal();
            $sinal->setId(base64_decode($_GET['id']));
            $sinal->setNome($_POST["nome"]);
            $sinal->setVideo($_POST["video"]);
            $sinal->setFoto($_POST["foto"]);
            $sinal->setOrientacao($_POST["orientacao"]);
            $sinal->setExpressaoFacial_idExpressaoFacial($_POST["expressaofacial_idexpressaofacial"]);
            $sinal->setPontoDeArticulacao_idPontoDeArticulacao($_POST["pontodearticulacao_idpontodearticulacao"]);
            $sinal->setSinalDefinePesoInicial($_POST["sinaldefinepesoinicial"]);
            $sinal->setModulo_id($_POST["modulo_id"]);
            $sinal->setUtilizacaoDasMaos($_POST["utilizacaodasmaos"]);
            $sinal->setMaoPrincipal_id($_POST["maoprincipal_id"]);
            $sinal->setMaoSecundaria_id($_POST["maosecundaria_id"]);

            if (!SinalDAO::edit($sinal)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Sinal alterado com sucesso!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=sinal&action=index\">";
                die();
            }
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $sinal = SinalDAO::find(base64_decode($_GET['id']));
        require_once('views/sinal/edit.php');
    }

}

?>