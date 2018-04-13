<?php

require_once 'models/PontoDeArticulacao.php';

class PontoDeArticulacaoDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM ponto_de_articulacao');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $pontodearticulacao = new PontoDeArticulacao();

            $pontodearticulacao->setId($linha['id']);
            $pontodearticulacao->setNome($linha["nome"]);
            $pontodearticulacao->setImagem($linha["imagem"]);

            $lista[] = $pontodearticulacao;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM ponto_de_articulacao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return PontoDeArticulacaoDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM ponto_de_articulacao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(PontoDeArticulacao $pontodearticulacao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO ponto_de_articulacao (nome,imagem) VALUES (:nome,:imagem)");
        $req->bindValue(":nome", $pontodearticulacao->getNome());
        $req->bindValue(":imagem", $pontodearticulacao->getImagem());
        return $req->execute();
    }

    public static function edit(PontoDeArticulacao $pontodearticulacao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE ponto_de_articulacao SET nome=:nome,imagem=:imagem WHERE id=:id");
        $req->bindValue(":id", $pontodearticulacao->getId());
        $req->bindValue(":nome", $pontodearticulacao->getNome());
        $req->bindValue(":imagem", $pontodearticulacao->getImagem());
        return $req->execute();
    }

    public static function popular($linha) {
        $pontodearticulacao = new PontoDeArticulacao();

        $pontodearticulacao->setId($linha['id']);
        $pontodearticulacao->setNome($linha['nome']);
        $pontodearticulacao->setImagem($linha['imagem']);

        return $pontodearticulacao;
    }


}
