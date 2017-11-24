<?php

require_once 'models/Avaliacao.php';

class AvaliacaoDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM avaliacao');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $avaliacao = new Avaliacao();

            $avaliacao->setId($linha['id']);
            $avaliacao->setData($linha["data"]);
            $avaliacao->setNota_configuracao_mao($linha["nota_configuracao_mao"]);
            $avaliacao->setNota_expressao_facial($linha["nota_expressao_facial"]);
            $avaliacao->setNota_media($linha["nota_media"]);
            $avaliacao->setNota_movimento($linha["nota_movimento"]);
            $avaliacao->setNota_orientacao($linha["nota_orientacao"]);
            $avaliacao->setNota_ponto_articulacao($linha["nota_ponto_articulacao"]);
            $avaliacao->setFk_id_gravacao($linha["fk_id_gravacao"]);
            $avaliacao->setFk_id_usuario($linha["fk_id_usuario"]);
            $avaliacao->setNota_final($linha["nota_final"]);
            $avaliacao->setObservacoes($linha["observacoes"]);

            $lista[] = $avaliacao;
        }

        return $lista;
    }




    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM avaliacao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return AvaliacaoDAO::popular($req->fetch());

    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM avaliacao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Avaliacao $avaliacao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO avaliacao (data,nota_configuracao_mao,nota_expressao_facial,nota_media,nota_movimento,nota_orientacao,nota_ponto_articulacao,fk_id_gravacao,fk_id_usuario,nota_final,observacoes, acertado) VALUES (NOW(),:nota_configuracao_mao,:nota_expressao_facial,:nota_media,:nota_movimento,:nota_orientacao,:nota_ponto_articulacao,:fk_id_gravacao,:fk_id_usuario,:nota_final,:observacoes, :acertado)");



        $req->bindValue(":nota_configuracao_mao", $avaliacao->getNota_configuracao_mao());
        $req->bindValue(":nota_expressao_facial", $avaliacao->getNota_expressao_facial());
        $req->bindValue(":nota_media", $avaliacao->getNota_media());
        $req->bindValue(":nota_movimento", $avaliacao->getNota_movimento());
        $req->bindValue(":nota_orientacao", $avaliacao->getNota_orientacao());
        $req->bindValue(":nota_ponto_articulacao", $avaliacao->getNota_ponto_articulacao());
        $req->bindValue(":fk_id_gravacao", $avaliacao->getFk_id_gravacao());
        $req->bindValue(":fk_id_usuario", $avaliacao->getFk_id_usuario());
        $req->bindValue(":nota_final", $avaliacao->getNota_final());
        $req->bindValue(":observacoes", $avaliacao->getObservacoes());

        $req->bindValue(":acertado", $avaliacao->getAcerto());


        return $req->execute();
    }

    public static function edit(Avaliacao $avaliacao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE avaliacao SET data=:data,nota_configuracao_mao=:nota_configuracao_mao,nota_expressao_facial=:nota_expressao_facial,nota_media=:nota_media,nota_movimento=:nota_movimento,nota_orientacao=:nota_orientacao,nota_ponto_articulacao=:nota_ponto_articulacao,fk_id_gravacao=:fk_id_gravacao,fk_id_usuario=:fk_id_usuario,nota_final=:nota_final,observacoes=:observacoes WHERE id=:id");
        $req->bindValue(":id", $avaliacao->getId());
        $req->bindValue(":data", $avaliacao->getData());
        $req->bindValue(":nota_configuracao_mao", $avaliacao->getNota_configuracao_mao());
        $req->bindValue(":nota_expressao_facial", $avaliacao->getNota_expressao_facial());
        $req->bindValue(":nota_media", $avaliacao->getNota_media());
        $req->bindValue(":nota_movimento", $avaliacao->getNota_movimento());
        $req->bindValue(":nota_orientacao", $avaliacao->getNota_orientacao());
        $req->bindValue(":nota_ponto_articulacao", $avaliacao->getNota_ponto_articulacao());
        $req->bindValue(":fk_id_gravacao", $avaliacao->getFk_id_gravacao());
        $req->bindValue(":fk_id_usuario", $avaliacao->getFk_id_usuario());
        $req->bindValue(":nota_final", $avaliacao->getNota_final());
        $req->bindValue(":observacoes", $avaliacao->getObservacoes());
        return $req->execute();
    }

    public static function popular($linha) {
        $avaliacao = new Avaliacao();

        $avaliacao->setId($linha['id']);
        $avaliacao->setData($linha['data']);
        $avaliacao->setNota_configuracao_mao($linha['nota_configuracao_mao']);
        $avaliacao->setNota_expressao_facial($linha['nota_expressao_facial']);
        $avaliacao->setNota_media($linha['nota_media']);
        $avaliacao->setNota_movimento($linha['nota_movimento']);
        $avaliacao->setNota_orientacao($linha['nota_orientacao']);
        $avaliacao->setNota_ponto_articulacao($linha['nota_ponto_articulacao']);
        $avaliacao->setFk_id_gravacao($linha['fk_id_gravacao']);
        $avaliacao->setFk_id_usuario($linha['fk_id_usuario']);
        $avaliacao->setNota_final($linha['nota_final']);
        $avaliacao->setObservacoes($linha['observacoes']);
        $avaliacao->setAcerto($linha['acertado']);

        return $avaliacao;
    }



    public static function findByGravacao($id) {
        $lista = [];

        $req = Db::getInstance()->prepare('SELECT * FROM avaliacao WHERE fk_id_gravacao = :idGravacao');

          $req->execute(array('idGravacao' => $id));
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $avaliacao = new Avaliacao();

            $avaliacao->setId($linha['id']);
            $avaliacao->setData($linha["data"]);
            $avaliacao->setNota_configuracao_mao($linha["nota_configuracao_mao"]);
            $avaliacao->setNota_expressao_facial($linha["nota_expressao_facial"]);
            $avaliacao->setNota_media($linha["nota_media"]);
            $avaliacao->setNota_movimento($linha["nota_movimento"]);
            $avaliacao->setNota_orientacao($linha["nota_orientacao"]);
            $avaliacao->setNota_ponto_articulacao($linha["nota_ponto_articulacao"]);
            $avaliacao->setFk_id_gravacao($linha["fk_id_gravacao"]);
            $avaliacao->setFk_id_usuario($linha["fk_id_usuario"]);
            $avaliacao->setNota_final($linha["nota_final"]);
            $avaliacao->setObservacoes($linha["observacoes"]);

            $lista[] = $avaliacao;
        }

        return $lista;
    }


}
