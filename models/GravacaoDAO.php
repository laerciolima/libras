<?php

require_once 'models/Gravacao.php';

class GravacaoDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM gravacao');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $gravacao = new Gravacao();

            $gravacao->setId($linha['id']);
            $gravacao->setData($linha["data"]);
            $gravacao->setVideo($linha["video"]);
            $gravacao->setFk_id_sinal($linha["fk_id_sinal"]);
            $gravacao->setFk_id_usuario($linha["fk_id_usuario"]);

            $lista[] = $gravacao;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM gravacao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return GravacaoDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM gravacao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Gravacao $gravacao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO gravacao (data,video,fk_id_sinal,fk_id_usuario) VALUES (:data,:video,:fk_id_sinal,:fk_id_usuario)");
        $req->bindValue(":data", $gravacao->getData());
        $req->bindValue(":video", $gravacao->getVideo());
        $req->bindValue(":fk_id_sinal", $gravacao->getFk_id_sinal());
        $req->bindValue(":fk_id_usuario", $gravacao->getFk_id_usuario());
        return $req->execute();
    }

    public static function edit(Gravacao $gravacao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE gravacao SET data=:data,video=:video,fk_id_sinal=:fk_id_sinal,fk_id_usuario=:fk_id_usuario WHERE id=:id");
        $req->bindValue(":id", $gravacao->getId());
        $req->bindValue(":data", $gravacao->getData());
        $req->bindValue(":video", $gravacao->getVideo());
        $req->bindValue(":fk_id_sinal", $gravacao->getFk_id_sinal());
        $req->bindValue(":fk_id_usuario", $gravacao->getFk_id_usuario());
        return $req->execute();
    }

    public static function popular($linha) {
        $gravacao = new Gravacao();

        $gravacao->setId($linha['id']);
        $gravacao->setData($linha['data']);
        $gravacao->setVideo($linha['video']);
        $gravacao->setFk_id_sinal($linha['fk_id_sinal']);
        $gravacao->setFk_id_usuario($linha['fk_id_usuario']);

        return $gravacao;
    }


}
