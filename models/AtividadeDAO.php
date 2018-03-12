<?php

require_once 'models/Atividade.php';

class AtividadeDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM atividade');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $atividade = new Atividade();

            $atividade->setId($linha['id']);
            $atividade->setTitulo($linha["titulo"]);
            $atividade->setDescricao($linha["descricao"]);
            $atividade->setOrdem($linha["ordem"]);
            $atividade->setFk_id_Modulo($linha["fk_id_modulo"]);

            $lista[] = $atividade;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM atividade WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return AtividadeDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM atividade WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Atividade $atividade) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO atividade (titulo,descricao,ordem,fk_id_modulo) VALUES (:titulo,:descricao,:ordem,:fk_id_modulo)");
        $req->bindValue(":titulo", $atividade->getTitulo());
        $req->bindValue(":descricao", $atividade->getDescricao());
        $req->bindValue(":ordem", $atividade->getOrdem());
        $req->bindValue(":fk_id_modulo", $atividade->getFk_id_Modulo());
        return $req->execute();
    }

    public static function edit(Atividade $atividade) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE atividade SET titulo=:titulo,descricao=:descricao,ordem=:ordem,fk_id_modulo=:fk_id_modulo WHERE id=:id");
        $req->bindValue(":id", $atividade->getId());
        $req->bindValue(":titulo", $atividade->getTitulo());
        $req->bindValue(":descricao", $atividade->getDescricao());
        $req->bindValue(":ordem", $atividade->getOrdem());
        $req->bindValue(":fk_id_modulo", $atividade->getFk_id_Modulo());
        return $req->execute();
    }

    public static function popular($linha) {
        $atividade = new Atividade();

        $atividade->setId($linha['id']);
        $atividade->setTitulo($linha['titulo']);
        $atividade->setDescricao($linha['descricao']);
        $atividade->setOrdem($linha['ordem']);
        $atividade->setFk_id_Modulo($linha['fk_id_modulo']);

        return $atividade;
    }


}
