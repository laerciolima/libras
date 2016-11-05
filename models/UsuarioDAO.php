<?php

@include_once 'models/Usuario.php';

class UsuarioDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM usuario');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $usuario = new Usuario();

            $usuario->setId($linha['id']);
            $usuario->setNome($linha["nome"]);
            $usuario->setEmail($linha["email"]);
            $usuario->setPerfil($linha["perfil"]);
            $usuario->setusuario($linha["usuario"]);
            $usuario->setSenha($linha["senha"]);
            $usuario->setNivel($linha["nivel"]);
            $usuario->setPontuacao($linha["pontuacao"]);
            $usuario->setImagem($linha["imagem"]);

            $lista[] = $usuario;
        }

        return $lista;
    }

    public static function rankingGeral() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT id, nome, email, usuario, nivel, pontuacao, imagem FROM usuario WHERE perfil = \'comum\' ORDER BY nivel DESC, pontuacao DESC');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $usuario = new Usuario();

            $usuario->setId($linha['id']);
            $usuario->setNome($linha["nome"]);
            $usuario->setEmail($linha["email"]);
            $usuario->setusuario($linha["usuario"]);
            $usuario->setNivel($linha["nivel"]);
            $usuario->setPontuacao($linha["pontuacao"]);
            $usuario->setImagem($linha["imagem"]);

            $lista[] = $usuario;
        }

        return $lista;
    }

    public static function amigos($id) {
        $lista = [];
        echo $id;
        $req = Db::getInstance()->prepare('SELECT * FROM usuario u
INNER join amizade a ON (a.fk_id_usuario1 = u.id OR a.fk_id_usuario2 = u.id)
WHERE (a.fk_id_usuario1 = :id OR a.fk_id_usuario2 = :id)
	AND id != :id');

        $req->bindValue(":id", $id);
        $req->execute();
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $usuario = new Usuario();

            $usuario->setId($linha['id']);
            $usuario->setNome($linha["nome"]);
            $usuario->setEmail($linha["email"]);
            $usuario->setusuario($linha["usuario"]);
            $usuario->setNivel($linha["nivel"]);
            $usuario->setPontuacao($linha["pontuacao"]);
            $usuario->setImagem($linha["imagem"]);

            $lista[] = $usuario;
        }

        return $lista;
    }
    
    public static function buscarUsuario($busca, $id) {
        $lista = [];

        
        $req = Db::getInstance()->prepare('SELECT * FROM usuario WHERE (nome LIKE :busca OR usuario LIKE :busca OR email LIKE :busca) AND id <> :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":busca", "%".$busca."%");
        $req->bindValue(":id", $id);
        $req->execute();

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $usuario = new Usuario();

            $usuario->setId($linha['id']);
            $usuario->setNome($linha["nome"]);
            $usuario->setEmail($linha["email"]);
            $usuario->setPerfil($linha["perfil"]);
            $usuario->setusuario($linha["usuario"]);
            $usuario->setSenha($linha["senha"]);
            $usuario->setNivel($linha["nivel"]);
            $usuario->setPontuacao($linha["pontuacao"]);
            $usuario->setImagem($linha["imagem"]);

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

    public static function findByEmail($email, $usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare('SELECT * FROM usuario WHERE email = :email or usuario = :usuario');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":usuario", $usuario);
        $req->bindValue(":email", $email);
        $req->execute();
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

        $req = Db::getInstance()->prepare("INSERT INTO usuario (nome,email,perfil,usuario,senha,nivel,pontuacao,imagem, url) VALUES (:nome,:email,:perfil,:usuario,:senha,:nivel,:pontuacao,:imagem, :url)");
        $req->bindValue(":nome", $usuario->getNome());
        $req->bindValue(":email", $usuario->getEmail());
        $req->bindValue(":perfil", $usuario->getPerfil());
        $req->bindValue(":usuario", $usuario->getusuario());
        $req->bindValue(":senha", $usuario->getSenha());
        $req->bindValue(":nivel", $usuario->getNivel());
        $req->bindValue(":pontuacao", $usuario->getPontuacao());
        $req->bindValue(":imagem", $usuario->getImagem());
        $req->bindValue(":url", $usuario->getUrl());
        return $req->execute();
    }

    public static function edit(Usuario $usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE usuario SET nome=:nome , imagem=:imagem WHERE id=:id");
        $req->bindValue(":id", $usuario->getId());
        $req->bindValue(":nome", $usuario->getNome());
        $req->bindValue(":imagem", $usuario->getImagem());


        return $req->execute();
    }

    public static function validarUsuario($url) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE usuario SET status=1 , url='' WHERE url=:url");
        $req->bindValue(":url", $url);


        return $req->execute();
    }
    
    public static function addAmigo($id_logado, $id_usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO amizade (fk_id_usuario1, fk_id_usuario2, data, pendente ) values (:id1, :id2, NOW(), 2)");
        $req->bindValue(":id1", $id_logado);
        $req->bindValue(":id2", $id_usuario);


        return $req->execute();
    }


    public static function addPontuacao(Usuario $usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE usuario SET pontuacao=:pontuacao , nivel=:nivel WHERE id=:id");
        $req->bindValue(":id", $usuario->getId());
        $req->bindValue(":pontuacao", $usuario->getPontuacao());
        $req->bindValue(":nivel", $usuario->getNivel());


        return $req->execute();
    }




    public static function popular($linha) {
        $usuario = new Usuario();

        $usuario->setId($linha['id']);
        $usuario->setNome($linha['nome']);
        $usuario->setEmail($linha['email']);
        $usuario->setPerfil($linha['perfil']);
        $usuario->setusuario($linha['usuario']);
        $usuario->setSenha($linha['senha']);
        $usuario->setNivel($linha['nivel']);
        $usuario->setPontuacao($linha['pontuacao']);
        $usuario->setImagem($linha['imagem']);

        return $usuario;
    }

}
