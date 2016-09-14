<?php

require_once 'models/Ranking.php';

class RankingDAO {

    public static function geral() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM usuario ORDER BY nivel, pontuacao DESC');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $ranking = new Ranking();

            $ranking->setId($linha['id']);
            $ranking->setPosicao($linha["posicao"]);
            $ranking->setNome($linha["nome"]);
            $ranking->setNivel($linha["nivel"]);
            $ranking->setPontuacao($linha["pontuacao"]);

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
