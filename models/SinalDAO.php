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
            $sinal->setNome($linha["nome"]);
            $sinal->setVideo($linha["video"]);
            $sinal->setFoto($linha["foto"]);
            $sinal->setOrientacao($linha["orientacao"]);
            $sinal->setExpressaoFacial_idExpressaoFacial($linha["expressaofacial_idexpressaofacial"]);
            $sinal->setPontoDeArticulacao_idPontoDeArticulacao($linha["pontodearticulacao_idpontodearticulacao"]);
            $sinal->setSinalDefinePesoInicial($linha["sinaldefinepesoinicial"]);
            $sinal->setModulo_id($linha["modulo_id"]);
            $sinal->setUtilizacaoDasMaos($linha["utilizacaodasmaos"]);
            $sinal->setMaoPrincipal_id($linha["maoprincipal_id"]);
            $sinal->setMaoSecundaria_id($linha["maosecundaria_id"]);

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

        $req = Db::getInstance()->prepare("INSERT INTO sinal (nome,video,foto,orientacao,expressaofacial_idexpressaofacial,pontodearticulacao_idpontodearticulacao,sinaldefinepesoinicial,modulo_id,utilizacaodasmaos,maoprincipal_id,maosecundaria_id) VALUES (:nome,:video,:foto,:orientacao,:expressaofacial_idexpressaofacial,:pontodearticulacao_idpontodearticulacao,:sinaldefinepesoinicial,:modulo_id,:utilizacaodasmaos,:maoprincipal_id,:maosecundaria_id)");
        $req->bindValue(":nome", $sinal->getNome());
        $req->bindValue(":video", $sinal->getVideo());
        $req->bindValue(":foto", $sinal->getFoto());
        $req->bindValue(":orientacao", $sinal->getOrientacao());
        $req->bindValue(":expressaofacial_idexpressaofacial", $sinal->getExpressaoFacial_idExpressaoFacial());
        $req->bindValue(":pontodearticulacao_idpontodearticulacao", $sinal->getPontoDeArticulacao_idPontoDeArticulacao());
        $req->bindValue(":sinaldefinepesoinicial", $sinal->getSinalDefinePesoInicial());
        $req->bindValue(":modulo_id", $sinal->getModulo_id());
        $req->bindValue(":utilizacaodasmaos", $sinal->getUtilizacaoDasMaos());
        $req->bindValue(":maoprincipal_id", $sinal->getMaoPrincipal_id());
        $req->bindValue(":maosecundaria_id", $sinal->getMaoSecundaria_id());
        return $req->execute();
    }

    public static function edit(Sinal $sinal) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE sinal SET nome=:nome,video=:video,foto=:foto,orientacao=:orientacao,expressaofacial_idexpressaofacial=:expressaofacial_idexpressaofacial,pontodearticulacao_idpontodearticulacao=:pontodearticulacao_idpontodearticulacao,sinaldefinepesoinicial=:sinaldefinepesoinicial,modulo_id=:modulo_id,utilizacaodasmaos=:utilizacaodasmaos,maoprincipal_id=:maoprincipal_id,maosecundaria_id=:maosecundaria_id WHERE id=:id");
        $req->bindValue(":id", $sinal->getId());
        $req->bindValue(":nome", $sinal->getNome());
        $req->bindValue(":video", $sinal->getVideo());
        $req->bindValue(":foto", $sinal->getFoto());
        $req->bindValue(":orientacao", $sinal->getOrientacao());
        $req->bindValue(":expressaofacial_idexpressaofacial", $sinal->getExpressaoFacial_idExpressaoFacial());
        $req->bindValue(":pontodearticulacao_idpontodearticulacao", $sinal->getPontoDeArticulacao_idPontoDeArticulacao());
        $req->bindValue(":sinaldefinepesoinicial", $sinal->getSinalDefinePesoInicial());
        $req->bindValue(":modulo_id", $sinal->getModulo_id());
        $req->bindValue(":utilizacaodasmaos", $sinal->getUtilizacaoDasMaos());
        $req->bindValue(":maoprincipal_id", $sinal->getMaoPrincipal_id());
        $req->bindValue(":maosecundaria_id", $sinal->getMaoSecundaria_id());
        return $req->execute();
    }

    public static function popular($linha) {
        $sinal = new Sinal();

        $sinal->setId($linha['id']);
        $sinal->setNome($linha['nome']);
        $sinal->setVideo($linha['video']);
        $sinal->setFoto($linha['foto']);
        $sinal->setOrientacao($linha['orientacao']);
        $sinal->setExpressaoFacial_idExpressaoFacial($linha['expressaofacial_idexpressaofacial']);
        $sinal->setPontoDeArticulacao_idPontoDeArticulacao($linha['pontodearticulacao_idpontodearticulacao']);
        $sinal->setSinalDefinePesoInicial($linha['sinaldefinepesoinicial']);
        $sinal->setModulo_id($linha['modulo_id']);
        $sinal->setUtilizacaoDasMaos($linha['utilizacaodasmaos']);
        $sinal->setMaoPrincipal_id($linha['maoprincipal_id']);
        $sinal->setMaoSecundaria_id($linha['maosecundaria_id']);

        return $sinal;
    }


}
