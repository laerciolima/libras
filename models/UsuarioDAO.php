<?php

require_once (realpath($_SERVER["DOCUMENT_ROOT"]) . '/unitrans/models/Usuario.php');
class UsuarioDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM usuario');
        
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $usuario = new Usuario();

            $usuario->setId($linha['id']);
            $usuario->setLogin($linha["login"]);
            $usuario->setSenha($linha["senha"]);

            $lista[] = $usuario;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM usuario WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return UsuarioDAO::popular($req->fetch());
    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM usuario WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Usuario $usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO usuario (login,senha) VALUES (:login,:senha)");
        $req->bindValue(":login", $usuario->getLogin());
        $req->bindValue(":senha", $usuario->getSenha());
        return $req->execute();
    }

    public static function edit(Usuario $usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE usuario SET login=:login,senha=:senha WHERE id=:id");
        $req->bindValue(":id", $usuario->getId());
        $req->bindValue(":login", $usuario->getLogin());
        $req->bindValue(":senha", $usuario->getSenha());
        return $req->execute();
    }

    public static function popular($linha) {
        $usuario = new Usuario();

        $usuario->setId($linha['id']);
        $usuario->setLogin($linha['login']);
        $usuario->setSenha($linha['senha']);

        return $usuario;
    }

    public static function login($login, $senha) {
        // we make sure $id is an integer
        require_once 'connection.php';
        $req = Db::getInstance()->prepare('SELECT * FROM usuario WHERE login = :login and senha = :senha');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":login", $login);
        $req->bindValue(":senha", $senha);
        $req->execute();

        return UsuarioDAO::popular($req->fetch());
    }

}
