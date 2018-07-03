<?php

require_once 'models/Badge.php';

class BadgeDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM badge');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $badge = new Badge();

            $badge->setId($linha['id']);
            $badge->setDescricao($linha["descricao"]);
            $badge->setImg($linha["img"]);

            $lista[] = $badge;
        }

        return $lista;
    }


    public static function listByUsuario($fk_id_usuario) {
        $lista = [];

        $req = Db::getInstance()->prepare("SELECT b.* FROM badge b
INNER JOIN badge_usuario bu ON b.id = bu.fk_id_badge
where bu.fk_id_usuario = :id
        ");


        $req->execute(array('id' => $fk_id_usuario));

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $badge = new Badge();

            $badge->setId($linha['id']);
            $badge->setDescricao($linha["descricao"]);
            $badge->setImg($linha["img"]);
            $lista[] = $badge;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM badge WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return BadgeDAO::popular($req->fetch());

    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM badge WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Badge $badge) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO badge (descricao,img) VALUES (:descricao,:img)");
        $req->bindValue(":descricao", $badge->getDescricao());
        $req->bindValue(":img", $badge->getImg());
        return $req->execute();
    }

    public static function edit(Badge $badge) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE badge SET descricao=:descricao,img=:img WHERE id=:id");
        $req->bindValue(":id", $badge->getId());
        $req->bindValue(":descricao", $badge->getDescricao());
        $req->bindValue(":img", $badge->getImg());
        return $req->execute();
    }

    public static function popular($linha) {
        $badge = new Badge();

        $badge->setId($linha['id']);
        $badge->setDescricao($linha['descricao']);
        $badge->setImg($linha['img']);

        return $badge;
    }


}
