<?php

require_once 'models/Categoria.php';

class CategoriaDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM categoria');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $categoria = new Categoria();

            $categoria->setId($linha['id']);
            $categoria->setNome($linha["nome"]);
            $categoria->setDescricao($linha["descricao"]);
            $categoria->setImagem($linha["imagem"]);
            $categoria->setFk_id_modulo($linha["fk_id_modulo"]);

            $lista[] = $categoria;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM categoria WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return CategoriaDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM categoria WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Categoria $categoria) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO categoria (nome,descricao,imagem,fk_id_modulo) VALUES (:nome,:descricao,:imagem,:fk_id_modulo)");
        $req->bindValue(":nome", $categoria->getNome());
        $req->bindValue(":descricao", $categoria->getDescricao());
        $req->bindValue(":imagem", $categoria->getImagem());
        $req->bindValue(":fk_id_modulo", $categoria->getFk_id_modulo());
        return $req->execute();
    }

    public static function edit(Categoria $categoria) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE categoria SET nome=:nome,descricao=:descricao,imagem=:imagem,fk_id_modulo=:fk_id_modulo WHERE id=:id");
        $req->bindValue(":id", $categoria->getId());
        $req->bindValue(":nome", $categoria->getNome());
        $req->bindValue(":descricao", $categoria->getDescricao());
        $req->bindValue(":imagem", $categoria->getImagem());
        $req->bindValue(":fk_id_modulo", $categoria->getFk_id_modulo());
        return $req->execute();
    }

    public static function popular($linha) {
        $categoria = new Categoria();

        $categoria->setId($linha['id']);
        $categoria->setNome($linha['nome']);
        $categoria->setDescricao($linha['descricao']);
        $categoria->setImagem($linha['imagem']);
        $categoria->setFk_id_modulo($linha['fk_id_modulo']);

        return $categoria;
    }


}
