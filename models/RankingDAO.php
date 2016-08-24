<?php

require_once 'models/Ranking.php';

class RankingDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM ranking');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $ranking = new Ranking();

            $ranking->setId($linha['id']);
            $ranking->setPosicao($linha["posicao"]);
            $ranking->setNome($linha["nome"]);
            $ranking->setNivel($linha["nivel"]);
            $ranking->setPontuacao($linha["pontuacao"]);
            $ranking->setfk_id_usuario($linha["fk_id_usuario"]);

            $lista[] = $ranking;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM ranking WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return RankingDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM ranking WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Ranking $ranking) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO ranking (posicao,nome,nivel,pontuacao,fk_id_usuario) VALUES (:posicao,:nome,:nivel,:pontuacao,:fk_id_usuario)");
        $req->bindValue(":posicao", $ranking->getPosicao());
        $req->bindValue(":nome", $ranking->getNome());
        $req->bindValue(":nivel", $ranking->getNivel());
        $req->bindValue(":pontuacao", $ranking->getPontuacao());
        $req->bindValue(":fk_id_usuario", $ranking->getfk_id_usuario());
        return $req->execute();
    }

    public static function edit(Ranking $ranking) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE ranking SET posicao=:posicao,nome=:nome,nivel=:nivel,pontuacao=:pontuacao,fk_id_usuario=:fk_id_usuario WHERE id=:id");
        $req->bindValue(":id", $ranking->getId());
        $req->bindValue(":posicao", $ranking->getPosicao());
        $req->bindValue(":nome", $ranking->getNome());
        $req->bindValue(":nivel", $ranking->getNivel());
        $req->bindValue(":pontuacao", $ranking->getPontuacao());
        $req->bindValue(":fk_id_usuario", $ranking->getfk_id_usuario());
        return $req->execute();
    }

    public static function popular($linha) {
        $ranking = new Ranking();

        $ranking->setId($linha['id']);
        $ranking->setPosicao($linha['posicao']);
        $ranking->setNome($linha['nome']);
        $ranking->setNivel($linha['nivel']);
        $ranking->setPontuacao($linha['pontuacao']);
        $ranking->setfk_id_usuario($linha['fk_id_usuario']);

        return $ranking;
    }


}
