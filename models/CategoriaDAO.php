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


    public static function listByModulo($fk_id_modulo) {
        $lista = [];

          $req = Db::getInstance()->prepare('SELECT * FROM categoria where fk_id_modulo = :fk_id_modulo');
          $req->execute(array('fk_id_modulo' => $fk_id_modulo));
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



    public static function getOpcoes($sinal, $fk_id_categoria){
         $req = Db::getInstance()->prepare("SELECT sn.nome FROM sinal as sn inner join categoria as ct on
    sn.categoria_id =  ct.id
    where ct.id = :categoria and sn.id <> :sinal
    order by rand()
    limit 3;");
        $req->bindValue(":categoria", $fk_id_categoria);
        $req->bindValue(":sinal", $sinal);
        //$req->bindValue(":limit", $limit);
        $req->execute();


        $lista = [];

        foreach ($req->fetchAll() as $linha) {
            $lista[] = $linha['nome'];
        }

        return $lista;
    }

    public static function getPorcentagemSinaisGravados($categoria_id, $usuario_id){
      $req = Db::getInstance()->prepare("SELECT (count(ct.id)*100)/(SELECT count(sn.id) FROM sinal sn
    INNER JOIN categoria ct ON ct.id = sn.categoria_id
    WHERE ct.id = :categoria_id group by ct.id) as total FROM gravacao gr
	INNER JOIN sinal sn ON gr.fk_id_sinal = sn.id
    INNER JOIN categoria ct ON ct.id = sn.categoria_id
    inner join usuario u on gr.fk_id_usuario = u.id
    WHERE ct.id = :categoria_id and u.id = :usuario_id group by ct.id;
    ");
      // the query was prepared, now we replace :id with our actual $id value
      $req->bindValue(":categoria_id", $categoria_id);
      $req->bindValue(":usuario_id", $usuario_id);

      $req->execute();

      $linha = $req->fetch();
      return $linha['total'];
    }


}
