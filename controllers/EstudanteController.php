<?php

class EstudanteController {

    public function index() {
        // we store all the posts in a variable

        $estudantes = EstudanteDAO::all();
        require_once('views/estudante/index.php');
    }

    public function delete() {
        // we store all the posts in a variable


        if (!EstudanteDAO::delete(base64_decode($_GET['id']))) {
            $_SESSION['error'] = "Ocorreu um erro ao deletar o estudante!";
        } else {
            $_SESSION['success'] = "Estudante removido com sucesso!";
        }

        return call('estudante', 'index');
    }

    public function view() {
        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post
        $estudante = EstudanteDAO::find($_GET['id']);
        require_once('views/estudante/view.php');
    }

    public function add() {
        if (isset($_POST['cpf'])) {


            $estudante = new Estudante();
            $estudante->setNome($_POST["nome"]);
            $estudante->setCpf($_POST["cpf"]);
            $estudante->setData_de_nascimento($_POST["data_de_nascimento"]);
            $estudante->setEndereco($_POST["endereco"]);
            $estudante->setTelefone($_POST["telefone"]);
            $estudante->setFk_id_universidade($_POST["fk_id_universidade"]);
            $estudante->setCurso($_POST["curso"]);
            $estudante->setLogin($_POST["login"]);
            $estudante->setSenha($_POST["senha"]);
            $estudante->setHorario($_POST["horario"]);

            if (EstudanteDAO::add($estudante)) {
                $_SESSION['success'] = "Estudante cadastrado com sucesso!";
                mkdir("storage/comprovantes/".$estudante->getCpf());
                header("Location: ?controller=estudante&action=index");
                die();
            } else {
                $_SESSION['error'] = "Ocorreu um erro no cadastro!";
            }
        }

        $universidades = UniversidadeDAO::all();

        require_once('views/estudante/add.php');
    }

    public function edit() {

        if (isset($_POST['cpf'])) {
            $estudante = new Estudante();
            $estudante->setId(base64_decode($_GET['id']));
            $estudante->setNome($_POST["nome"]);
            $estudante->setCpf($_POST["cpf"]);
            $estudante->setData_de_nascimento($_POST["data_de_nascimento"]);
            $estudante->setEndereco($_POST["endereco"]);
            $estudante->setTelefone($_POST["telefone"]);
            $estudante->setFk_id_universidade($_POST["fk_id_universidade"]);
            $estudante->setCurso($_POST["curso"]);
            $estudante->setLogin($_POST["login"]);
            $estudante->setSenha($_POST["senha"]);
            $estudante->setHorario($_POST["horario"]);

            if (!EstudanteDAO::edit($estudante)) {
                $_SESSION['error'] = "Ocorreu um erro ao editar!";
            } else {
                $_SESSION['success'] = "Estudante alterado com sucesso!";
                header("Location: ?controller=estudante&action=index");
                die();
            }
        }

        if (!isset($_GET['id']))
            return call('page', 'error');

        // we use the given id to get the right post"

        $estudante = EstudanteDAO::find(base64_decode($_GET['id']));
        require_once('views/estudante/edit.php');
    }

    public function getDados() {
        $estudante = EstudanteDAO::find($_GET['id']);

        echo $estudante->getNome() . "&" . "ok";
    }

}

?>