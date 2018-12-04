<?php

class AtividadeController
{





    public function index()
    {
        // we store all the posts in a variable

        $atividades = AtividadeDAO::all();
        require_once 'views/atividade/index.php';

    }

    public function delete()
    {
        // we store all the posts in a variable

        if (!AtividadeDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o atividade!";
        } else {
            $_SESSION['success'] = "Atividade removido com sucesso!";
        }

        return call('atividade', 'index');

    }

    public function view()
    {
        if (!isset($_GET['id'])) {
            return call('page', 'error');
        }

        // we use the given id to get the right post
        $atividade = AtividadeDAO::find($_GET['id']);
        require_once 'views/atividade/view.php';
    }

    public function lista()
    {
        if (!isset($_GET['modulo'])) {
            return call('page', 'error');
        }


        $usuario_logado = $_SESSION['login_object'];

        // we use the given id to get the right post
        $atividades = AtividadeDAO::listByModulo($_GET['modulo'], $usuario_logado['id']);
        require_once 'views/atividade/lista.php';
    }

    public function play()
    {
        $type = -1;
        $id = 0;
        if (!isset($_GET['id'])) {
            call('pages', 'error');
        }

        if(isset($_GET['modulo'])){
            $id = $_GET['modulo'];
        }

        $modulo = ModuloDAO::find($id);
        $fk_id_atividade = $_GET['id'];

        $usuario_logado = $_SESSION['login_object'];
        $gravacoes = [];

        $atividade = AtividadeDAO::listSinais($fk_id_atividade);
        
        foreach ($atividade->getSinais() as $sinal) {
            $gravacoes[] = GravacaoDAO::getGravacoesAleatoriasBySinal($sinal, $usuario_logado['id']);
            if(empty($gravacoes[count($gravacoes)-1]->getId()))
                array_pop($gravacoes);
        }
        
        $corretos[]

        for ($i = 0; $i < count($gravacoes); $i++) {
            $sinal = SinalDAO::find($gravacoes[$i]->getFk_id_sinal());
            //$corretos[] = $sinal->getNome();
            $opcoes = [];
            $opcoes[] = $sinal->getNome();
            $opcoes = array_merge($opcoes, CategoriaDAO::getOpcoes($sinal->getId(), $sinal->getCategoria_id()));
            
            sort($opcoes, SORT_STRING);
           
            $gravacoes[$i]->setOpcoes($opcoes);

        }
        require_once 'views/pages/jogar.php';
    }

    public function add()
    {
        if (isset($_POST['descricao'])) {

            $atividade = new Atividade();
            $atividade->setTitulo($_POST["titulo"]);
            $atividade->setDescricao($_POST["descricao"]);
            $atividade->setOrdem($_POST["ordem"]);
            $atividade->setFk_id_Modulo($_POST["fk_id_modulo"]);

            if (!isset($_POST['sinais'])) {

                $_SESSION['error'] = "Os sinais da atividade são necessários!";
                echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=atividade&action=add\">";
                die();
            } else {

                $sinais = $_POST['sinais'];

                if (($id_atividade = AtividadeDAO::add($atividade))) {

                    foreach ($sinais as $sinal) {
                        AtividadeDAO::addSinal($id_atividade, $sinal);
                    }

                    $_SESSION['success'] = "Atividade cadastrado com sucesso!";
                    echo "<meta http-equiv=\"Refresh\" content=\"0; url=?controller=atividade&action=index\">";
                    die();

                } else {

                    $_SESSION['error'] = "Ocorreu um erro no cadastro!";
                }

            }

        } else {
            $modulos = ModuloDAO::listAll();
            $sinais = SinalDAO::all();

        }

        require_once 'views/atividade/add.php';
    }

    public function edit()
    {

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
                die();}

        }

        if (!isset($_GET['id'])) {
            return call('page', 'error');
        }

        // we use the given id to get the right post"

        $atividade = AtividadeDAO::find(base64_decode($_GET['id']));
        require_once 'views/atividade/edit.php';
    }

    public function finalizar()
    {

        echo "FINALIZANDO TAREFA";
        // we use the given id to get the right post"
        $sinais_corretos = $_POST['acertos'];
        $usuario_logado = $_SESSION['login_object'];
        $atividade = AtividadeDAO::finalizarAtividade($_POST['fk_id_atividade'], $usuario_logado['id'], $sinais_corretos);
    }

}
