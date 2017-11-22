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
            $usuario->setPontuacao($linha["pontuacao"]);
            $usuario->setImagem($linha["imagem"]);

            $lista[] = $usuario;
        }

        return $lista;
    }

    public static function listSolicitacaoAmizade($id_usuario) {
        $lista = [];

        $req = Db::getInstance()->prepare('SELECT u.* FROM amizade as a
                inner join usuario as u on u.id = a.fk_id_usuario1
                where fk_id_usuario2 = :id AND  pendente = 1;');

        $req->bindValue(":id", $id_usuario);
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
            $usuario->setPontuacao($linha["pontuacao"]);
            $usuario->setImagem($linha["imagem"]);

            $lista[] = $usuario;
        }

        return $lista;
    }

    public static function rankingGeral() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT id, nome, email, usuario, pontuacao, imagem FROM usuario WHERE perfil = \'comum\' ORDER BY pontuacao DESC');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $usuario = new Usuario();

            $usuario->setId($linha['id']);
            $usuario->setNome($linha["nome"]);
            $usuario->setEmail($linha["email"]);
            $usuario->setusuario($linha["usuario"]);
            $usuario->setPontuacao($linha["pontuacao"]);
            $usuario->setImagem($linha["imagem"]);

            $lista[] = $usuario;
        }

        return $lista;
    }

    public static function rankingAmigos($fk_id_usuario) {
        $lista = [];

        $req = Db::getInstance()->prepare("SELECT id, nome, email, usuario, pontuacao, imagem FROM usuario u
	inner join amizade a on (u.id = a.fk_id_usuario1 or u.id = a.fk_id_usuario2)
WHERE perfil = 'comum' and (a.fk_id_usuario1=:id or a.fk_id_usuario2=:id) ORDER BY pontuacao DESC");

        $req->bindValue(":id", $fk_id_usuario);
        $req->execute();
        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $usuario = new Usuario();

            $usuario->setId($linha['id']);
            $usuario->setNome($linha["nome"]);
            $usuario->setEmail($linha["email"]);
            $usuario->setusuario($linha["usuario"]);

            $usuario->setPontuacao($linha["pontuacao"]);
            $usuario->setImagem($linha["imagem"]);

            $lista[] = $usuario;
        }

        return $lista;
    }

    public static function amigos($id) {
        $lista = [];
        $req = Db::getInstance()->prepare('SELECT * FROM usuario u
INNER join amizade a ON (a.fk_id_usuario1 = u.id OR a.fk_id_usuario2 = u.id)
WHERE (a.fk_id_usuario1 = :id OR a.fk_id_usuario2 = :id) and a.pendente = 0
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


        $req = Db::getInstance()->prepare("INSERT INTO usuario (nome,email,perfil,usuario,senha,pontuacao,imagem, url) VALUES (:nome,:email,:perfil,:usuario,:senha,:pontuacao,:imagem, :url)");
        $req->bindValue(":nome", $usuario->getNome());
        $req->bindValue(":email", $usuario->getEmail());
        $req->bindValue(":perfil", $usuario->getPerfil());
        $req->bindValue(":usuario", $usuario->getusuario());
        $req->bindValue(":senha", $usuario->getSenha());
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

        $req = Db::getInstance()->prepare("INSERT INTO amizade (fk_id_usuario1, fk_id_usuario2, data, pendente ) values (:id1, :id2, NOW(), 1)");
        $req->bindValue(":id1", $id_logado);
        $req->bindValue(":id2", $id_usuario);


        return $req->execute();
    }


    public static function addPontuacao(Usuario $usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE usuario SET pontuacao=:pontuacao WHERE id=:id");
        $req->bindValue(":id", $usuario->getId());
        $req->bindValue(":pontuacao", $usuario->getPontuacao());


        return $req->execute();
    }

    public static function getNumNotificacoes($id_usuario) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare('SELECT count(fk_id_usuario2) as qntd FROM amizade
                                            where fk_id_usuario2 = :id AND  pendente = 1;');
        $req->bindValue(":id", $id_usuario);


        $req->execute();

        foreach ($req->fetchAll() as $linha) {
            return $linha['qntd'];
        }

        return 0;
    }


    public static function removerAmizade($id_logado, $fk_id_usuario) {


        $id = intval($id);

        $req = Db::getInstance()->prepare('delete from amizade where (fk_id_usuario1 = :id1 and fk_id_usuario2 = :id2) or (fk_id_usuario1 = :id2 and fk_id_usuario2 = :id1)');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id1", $id_logado);
        $req->bindValue(":id2", $fk_id_usuario);

        return $req->execute();
    }


    public static function aceitarAmizade($id_logado, $fk_id_usuario) {


        $req = Db::getInstance()->prepare('UPDATE amizade SET pendente = 0  WHERE fk_id_usuario1 = :id1 and fk_id_usuario2 = :id2');
        $req->bindValue(":id1", $fk_id_usuario);
        $req->bindValue(":id2", $id_logado);


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
        $usuario->setPontuacao($linha['pontuacao']);
        $usuario->setImagem($linha['imagem']);

        return $usuario;
    }

}
