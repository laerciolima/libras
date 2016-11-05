<?php

require_once 'models/Estudante.php';

class EstudanteDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM estudante');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $estudante = new Estudante();

            $estudante->setId($linha['id']);
            $estudante->setNome($linha["nome"]);
            $estudante->setCpf($linha["cpf"]);
            $estudante->setData_de_nascimento($linha["data_de_nascimento"]);
            $estudante->setEndereco($linha["endereco"]);
            $estudante->setTelefone($linha["telefone"]);
            $estudante->setFk_id_universidade($linha["fk_id_universidade"]);
            $estudante->setCurso($linha["curso"]);
            $estudante->setLogin($linha["login"]);
            $estudante->setSenha($linha["senha"]);
            $estudante->setHorario($linha["horario"]);

            $lista[] = $estudante;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM estudante WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return EstudanteDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM estudante WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Estudante $estudante) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO estudante (nome,cpf,data_de_nascimento,endereco,telefone,fk_id_universidade,curso,login,senha,horario) VALUES (:nome,:cpf,:data_de_nascimento,:endereco,:telefone,:fk_id_universidade,:curso,:login,:senha,:horario)");
        $req->bindValue(":nome", $estudante->getNome());
        $req->bindValue(":cpf", $estudante->getCpf());
        $req->bindValue(":data_de_nascimento", $estudante->getData_de_nascimento());
        $req->bindValue(":endereco", $estudante->getEndereco());
        $req->bindValue(":telefone", $estudante->getTelefone());
        $req->bindValue(":fk_id_universidade", $estudante->getFk_id_universidade());
        $req->bindValue(":curso", $estudante->getCurso());
        $req->bindValue(":login", $estudante->getLogin());
        $req->bindValue(":senha", $estudante->getSenha());
        $req->bindValue(":horario", $estudante->getHorario());
        return $req->execute();
    }

    public static function edit(Estudante $estudante) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE estudante SET nome=:nome,cpf=:cpf,data_de_nascimento=:data_de_nascimento,endereco=:endereco,telefone=:telefone,fk_id_universidade=:fk_id_universidade,curso=:curso,login=:login,senha=:senha,horario=:horario WHERE id=:id");
        $req->bindValue(":id", $estudante->getId());
        $req->bindValue(":nome", $estudante->getNome());
        $req->bindValue(":cpf", $estudante->getCpf());
        $req->bindValue(":data_de_nascimento", $estudante->getData_de_nascimento());
        $req->bindValue(":endereco", $estudante->getEndereco());
        $req->bindValue(":telefone", $estudante->getTelefone());
        $req->bindValue(":fk_id_universidade", $estudante->getFk_id_universidade());
        $req->bindValue(":curso", $estudante->getCurso());
        $req->bindValue(":login", $estudante->getLogin());
        $req->bindValue(":senha", $estudante->getSenha());
        $req->bindValue(":horario", $estudante->getHorario());
        return $req->execute();
    }

    public static function popular($linha) {
        $estudante = new Estudante();

        $estudante->setId($linha['id']);
        $estudante->setNome($linha['nome']);
        $estudante->setCpf($linha['cpf']);
        $estudante->setData_de_nascimento($linha['data_de_nascimento']);
        $estudante->setEndereco($linha['endereco']);
        $estudante->setTelefone($linha['telefone']);
        $estudante->setFk_id_universidade($linha['fk_id_universidade']);
        $estudante->setCurso($linha['curso']);
        $estudante->setLogin($linha['login']);
        $estudante->setSenha($linha['senha']);
        $estudante->setHorario($linha['horario']);

        return $estudante;
    }


}
