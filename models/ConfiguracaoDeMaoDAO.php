<?php

require_once 'models/ConfiguracaoDeMao.php';

class ConfiguracaoDeMaoDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM configuracao_de_mao');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $configuracaodemao = new ConfiguracaoDeMao();

            $configuracaodemao->setId($linha['id']);
            $configuracaodemao->setNome($linha["nome"]);
            $configuracaodemao->setImagem($linha["imagem"]);

            $lista[] = $configuracaodemao;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM configuracao_de_mao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return ConfiguracaoDeMaoDAO::popular($req->fetch());
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM configuracao_de_mao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(ConfiguracaoDeMao $configuracaodemao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO configuracao_de_mao (nome,imagem) VALUES (:nome,:imagem)");
        $req->bindValue(":nome", $configuracaodemao->getNome());
        $req->bindValue(":imagem", $configuracaodemao->getImagem());
        return $req->execute();
    }

    public static function edit(ConfiguracaoDeMao $configuracaodemao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE configuracao_de_mao SET nome=:nome,imagem=:imagem WHERE id=:id");
        $req->bindValue(":id", $configuracaodemao->getId());
        $req->bindValue(":nome", $configuracaodemao->getNome());
        $req->bindValue(":imagem", $configuracaodemao->getImagem());
        return $req->execute();
    }

    public static function popular($linha) {
        $configuracaodemao = new ConfiguracaoDeMao();

        $configuracaodemao->setId($linha['id']);
        $configuracaodemao->setNome($linha['nome']);
        $configuracaodemao->setImagem($linha['imagem']);

        return $configuracaodemao;
    }


}
