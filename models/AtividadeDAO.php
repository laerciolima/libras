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

    public static function listByModulo($fk_id_modulo) {
        $lista = [];

        $req = Db::getInstance()->prepare('SELECT atv.*, MAX(atu.sinais_corretos) AS pontuacao
FROM atividade atv
LEFT JOIN atividade_usuario atu
ON atv.id = atu.fk_id_atividade
WHERE atv.fk_id_modulo = :fk_id_modulo
GROUP BY atv.id;
');

        $req->execute(array('fk_id_modulo' => $fk_id_modulo));

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $atividade = new Atividade();

            $atividade->setId($linha['id']);
            $atividade->setTitulo($linha["titulo"]);
            $atividade->setDescricao($linha["descricao"]);
            $atividade->setOrdem($linha["ordem"]);
            $atividade->setFk_id_Modulo($linha["fk_id_modulo"]);
            $atividade->setPontuacao($linha["pontuacao"]);
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
        $req->execute();
        return Db::getInstance()->lastInsertId();
    }

    public static function addSinal($atividade, $sinal) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO atividade_sinal (fk_id_atividade, fk_id_sinal) VALUES (:atividade,:sinal)");

        $req->bindValue(":atividade", $atividade);
        $req->bindValue(":sinal", $sinal);
        return $req->execute();
        
    }


    public static function listSinais($fk_id_atividade) {
        $lista = array();

        $req = Db::getInstance()->prepare('SELECT * FROM atividade_sinal
                                        WHERE fk_id_atividade = :fk_id_atividade');

        $req->execute(array('fk_id_atividade' => $fk_id_atividade));
        $atividade = new Atividade();

        foreach ($req->fetchAll() as $linha) {
            $lista[] = $linha['fk_id_sinal'];
        }
        
        $atividade->setSinais($lista);

        return $atividade;
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

    public static function finalizarAtividade($fk_id_atividade, $fk_id_usuario, $acertos){
        $req = Db::getInstance()->prepare("INSERT INTO atividade_usuario (fk_id_atividade, fk_id_usuario, sinais_corretos) VALUES (:atividade,:usuario, :sinal)");

        $req->bindValue(":atividade", $fk_id_atividade);
        $req->bindValue(":usuario", $fk_id_usuario);
        $req->bindValue(":sinal", $acertos);
        
        return $req->execute();

    }


}
