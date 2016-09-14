<?php

require_once 'models/Movimento.php';

class MovimentoDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM movimento');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $movimento = new Movimento();

            $movimento->setId($linha['id']);
            $movimento->setNome($linha["nome"]);
            $movimento->setImagem($linha["imagem"]);

            $lista[] = $movimento;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM movimento WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return MovimentoDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM movimento WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Movimento $movimento) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO movimento (nome,imagem) VALUES (:nome,:imagem)");
        $req->bindValue(":nome", $movimento->getNome());
        $req->bindValue(":imagem", $movimento->getImagem());
        return $req->execute();
    }

    public static function edit(Movimento $movimento) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE movimento SET nome=:nome,imagem=:imagem WHERE id=:id");
        $req->bindValue(":id", $movimento->getId());
        $req->bindValue(":nome", $movimento->getNome());
        $req->bindValue(":imagem", $movimento->getImagem());
        return $req->execute();
    }

    public static function popular($linha) {
        $movimento = new Movimento();

        $movimento->setId($linha['id']);
        $movimento->setNome($linha['nome']);
        $movimento->setImagem($linha['imagem']);

        return $movimento;
    }


}
