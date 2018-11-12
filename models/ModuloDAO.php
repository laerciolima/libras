<?php

require_once 'models/Modulo.php';

class ModuloDAO {

    public static function all($fk_id_usuario) {
        $lista = [];

        $req = Db::getInstance()->query('SELECT m.*, count(s.id) as qntd_sinais FROM modulo m
INNER JOIN categoria cat on cat.fk_id_modulo = m.id
INNER JOIN sinal s on s.categoria_id = cat.id
group by m.id');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $modulo = new Modulo();

            $modulo->setId($linha['id']);
            $modulo->setNome($linha["nome"]);
            $modulo->setDescricao($linha["descricao"]);
            $modulo->setNivel($linha["nivel"]);
            $modulo->setQntdSinais($linha["qntd_sinais"]);
            $modulo->setTempo($linha["tempo"]);
            $modulo->setQntdSinaisAprendidos(self::getSinaisAprendidos($linha['id'], $fk_id_usuario));

            $lista[] = $modulo;
        }

        return $lista;
    }


    public static function listAll() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * from modulo');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $modulo = new Modulo();

            $modulo->setId($linha['id']);
            $modulo->setNome($linha['nome']);
            $modulo->setDescricao($linha['descricao']);
            $modulo->setNivel($linha['nivel']);
            $modulo->setTempo($linha["tempo"]);

            $lista[] = $modulo;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM modulo WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return ModuloDAO::popular($req->fetch());
        
    }



     public static function getSinaisAprendidos($fk_id_modulo, $fk_id_usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare('SELECT count(DISTINCT s.id) as qntd_acertados FROM modulo m
INNER JOIN categoria cat on cat.fk_id_modulo = m.id
INNER JOIN sinal s on s.categoria_id = cat.id
INNER JOIN avaliacao av on av.fk_id_sinal = s.id
where av.acertado = 1 and m.id = :id_modulo and av.fk_id_usuario = :id_usuario');
        // the query was prepared, now we replace :id with our actual $id value

        $req->bindValue(":id_modulo", $fk_id_modulo);
        $req->bindValue(":id_usuario", $fk_id_usuario);

        $req->execute();

        return $req->fetch()['qntd_acertados'];
        
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM modulo WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Modulo $modulo) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO modulo (nome,descricao,nivel) VALUES (:nome,:descricao,:nivel)");
        $req->bindValue(":nome", $modulo->getNome());
        $req->bindValue(":descricao", $modulo->getDescricao());
        $req->bindValue(":nivel", $modulo->getNivel());
        return $req->execute();
    }

    public static function edit(Modulo $modulo) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE modulo SET nome=:nome,descricao=:descricao,nivel=:nivel WHERE id=:id");
        $req->bindValue(":id", $modulo->getId());
        $req->bindValue(":nome", $modulo->getNome());
        $req->bindValue(":descricao", $modulo->getDescricao());
        $req->bindValue(":nivel", $modulo->getNivel());
        return $req->execute();
    }

    public static function popular($linha) {
        $modulo = new Modulo();

        $modulo->setId($linha['id']);
        $modulo->setNome($linha['nome']);
        $modulo->setDescricao($linha['descricao']);
        $modulo->setNivel($linha['nivel']);
        $modulo->setTempo($linha["tempo"]);

        return $modulo;
    }


}
