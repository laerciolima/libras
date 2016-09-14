<?php

require_once 'models/Modulo.php';

class ModuloDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM modulo');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $modulo = new Modulo();

            $modulo->setId($linha['id']);
            $modulo->setNome($linha["nome"]);
            $modulo->setDescricao($linha["descricao"]);
            $modulo->setNivel($linha["nivel"]);

            $lista[] = $modulo;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM modulo WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return ModuloDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM modulo WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Modulo $modulo) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO modulo (nome,descricao,nivel) VALUES (:nome,:descricao,:nivel)");
        $req->bindValue(":nome", $modulo->getNome());
        $req->bindValue(":descricao", $modulo->getDescricao());
        $req->bindValue(":nivel", $modulo->getNivel());
        return $req->execute();
    }

    public static function edit(Modulo $modulo) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE modulo SET nome=:nome,descricao=:descricao,nivel=:nivel WHERE id=:id");
        $req->bindValue(":id", $modulo->getId());
        $req->bindValue(":nome", $modulo->getNome());
        $req->bindValue(":descricao", $modulo->getDescricao());
        $req->bindValue(":nivel", $modulo->getNivel());
        return $req->execute();
    }

    public static function popular($linha) {
        $modulo = new Modulo();

        $modulo->setId($linha['id']);
        $modulo->setNome($linha['nome']);
        $modulo->setDescricao($linha['descricao']);
        $modulo->setNivel($linha['nivel']);

        return $modulo;
    }


}
