<?php

require_once 'models/BadgeUsuario.php';

class BadgeUsuarioDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM badgeusuario');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $badgeusuario = new BadgeUsuario();

            $badgeusuario->setId($linha['id']);
            $badgeusuario->setFk_id_usuario($linha["fk_id_usuario"]);
            $badgeusuario->setFk_id_badge($linha["fk_id_badge"]);
            $badgeusuario->setData($linha["data"]);

            $lista[] = $badgeusuario;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM badgeusuario WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return BadgeUsuarioDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM badgeusuario WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(BadgeUsuario $badgeusuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO badgeusuario (fk_id_usuario,fk_id_badge,data) VALUES (:fk_id_usuario,:fk_id_badge,:data)");
        $req->bindValue(":fk_id_usuario", $badgeusuario->getFk_id_usuario());
        $req->bindValue(":fk_id_badge", $badgeusuario->getFk_id_badge());
        $req->bindValue(":data", $badgeusuario->getData());
        return $req->execute();
    }

    public static function edit(BadgeUsuario $badgeusuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE badgeusuario SET fk_id_usuario=:fk_id_usuario,fk_id_badge=:fk_id_badge,data=:data WHERE id=:id");
        $req->bindValue(":id", $badgeusuario->getId());
        $req->bindValue(":fk_id_usuario", $badgeusuario->getFk_id_usuario());
        $req->bindValue(":fk_id_badge", $badgeusuario->getFk_id_badge());
        $req->bindValue(":data", $badgeusuario->getData());
        return $req->execute();
    }

    public static function popular($linha) {
        $badgeusuario = new BadgeUsuario();

        $badgeusuario->setId($linha['id']);
        $badgeusuario->setFk_id_usuario($linha['fk_id_usuario']);
        $badgeusuario->setFk_id_badge($linha['fk_id_badge']);
        $badgeusuario->setData($linha['data']);

        return $badgeusuario;
    }


}
