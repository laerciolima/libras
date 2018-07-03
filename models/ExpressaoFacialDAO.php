<?php

require_once 'models/ExpressaoFacial.php';

class ExpressaoFacialDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM expressao_facial');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $expressaofacial = new ExpressaoFacial();

            $expressaofacial->setId($linha['id']);
            $expressaofacial->setNome($linha["nome"]);
            $expressaofacial->setImagem($linha["imagem"]);

            $lista[] = $expressaofacial;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM expressao_facial WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return ExpressaoFacialDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM expressao_facial WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(ExpressaoFacial $expressaofacial) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO expressao_facial (nome,imagem) VALUES (:nome,:imagem)");
        $req->bindValue(":nome", $expressaofacial->getNome());
        $req->bindValue(":imagem", $expressaofacial->getImagem());
        return $req->execute();
    }

    public static function edit(ExpressaoFacial $expressaofacial) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE expressao_facial SET nome=:nome,imagem=:imagem WHERE id=:id");
        $req->bindValue(":id", $expressaofacial->getId());
        $req->bindValue(":nome", $expressaofacial->getNome());
        $req->bindValue(":imagem", $expressaofacial->getImagem());
        return $req->execute();
    }

    public static function popular($linha) {
        $expressaofacial = new ExpressaoFacial();

        $expressaofacial->setId($linha['id']);
        $expressaofacial->setNome($linha['nome']);
        $expressaofacial->setImagem($linha['imagem']);

        return $expressaofacial;
    }


}
