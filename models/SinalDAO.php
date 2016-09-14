<?php

require_once 'models/Sinal.php';

class SinalDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM sinal');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $sinal = new Sinal();

            $sinal->setId($linha['id']);
            $sinal->setFk_id_categoria($linha["fk_id_categoria"]);
            $sinal->setDificuldade($linha["dificuldade"]);
            $sinal->setFoto($linha["foto"]);
            $sinal->setNome($linha["nome"]);
            $sinal->setOrientacao($linha["orientacao"]);
            $sinal->setVideo($linha["video"]);
            $sinal->setFk_id_expressao_facial($linha["fk_id_expressao_facial"]);
            $sinal->setFk_id_ponto_de_articulacao($linha["fk_id_ponto_de_articulacao"]);

            $lista[] = $sinal;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM sinal WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return SinalDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM sinal WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Sinal $sinal) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO sinal (fk_id_categoria,dificuldade,foto,nome,orientacao,video,fk_id_expressao_facial,fk_id_ponto_de_articulacao) VALUES (:fk_id_categoria,:dificuldade,:foto,:nome,:orientacao,:video,:fk_id_expressao_facial,:fk_id_ponto_de_articulacao)");
        $req->bindValue(":fk_id_categoria", $sinal->getFk_id_categoria());
        $req->bindValue(":dificuldade", $sinal->getDificuldade());
        $req->bindValue(":foto", $sinal->getFoto());
        $req->bindValue(":nome", $sinal->getNome());
        $req->bindValue(":orientacao", $sinal->getOrientacao());
        $req->bindValue(":video", $sinal->getVideo());
        $req->bindValue(":fk_id_expressao_facial", $sinal->getFk_id_expressao_facial());
        $req->bindValue(":fk_id_ponto_de_articulacao", $sinal->getFk_id_ponto_de_articulacao());
        return $req->execute();
    }

    public static function edit(Sinal $sinal) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE sinal SET fk_id_categoria=:fk_id_categoria,dificuldade=:dificuldade,foto=:foto,nome=:nome,orientacao=:orientacao,video=:video,fk_id_expressao_facial=:fk_id_expressao_facial,fk_id_ponto_de_articulacao=:fk_id_ponto_de_articulacao WHERE id=:id");
        $req->bindValue(":id", $sinal->getId());
        $req->bindValue(":fk_id_categoria", $sinal->getFk_id_categoria());
        $req->bindValue(":dificuldade", $sinal->getDificuldade());
        $req->bindValue(":foto", $sinal->getFoto());
        $req->bindValue(":nome", $sinal->getNome());
        $req->bindValue(":orientacao", $sinal->getOrientacao());
        $req->bindValue(":video", $sinal->getVideo());
        $req->bindValue(":fk_id_expressao_facial", $sinal->getFk_id_expressao_facial());
        $req->bindValue(":fk_id_ponto_de_articulacao", $sinal->getFk_id_ponto_de_articulacao());
        return $req->execute();
    }

    public static function popular($linha) {
        $sinal = new Sinal();

        $sinal->setId($linha['id']);
        $sinal->setFk_id_categoria($linha['fk_id_categoria']);
        $sinal->setDificuldade($linha['dificuldade']);
        $sinal->setFoto($linha['foto']);
        $sinal->setNome($linha['nome']);
        $sinal->setOrientacao($linha['orientacao']);
        $sinal->setVideo($linha['video']);
        $sinal->setFk_id_expressao_facial($linha['fk_id_expressao_facial']);
        $sinal->setFk_id_ponto_de_articulacao($linha['fk_id_ponto_de_articulacao']);

        return $sinal;
    }


}
