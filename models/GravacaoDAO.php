<?php

require_once 'models/Gravacao.php';

class GravacaoDAO {

    public static function all() {
        $lista = [];

        $req = Db::getInstance()->query('SELECT * FROM gravacao');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $linha) {
            $gravacao = new Gravacao();

            $gravacao->setId($linha['id']);
            $gravacao->setdata($linha["data"]);
            $gravacao->setVideo($linha["video"]);
            $gravacao->setFk_id_sinal($linha["fk_id_sinal"]);
            $gravacao->setFk_id_usuario($linha["fk_id_usuario"]);

            $lista[] = $gravacao;
        }

        return $lista;
    }

    public static function find($id) {
        // we make sure $id is an integer

        $id = intval($id);
        $req = Db::getInstance()->prepare('SELECT * FROM gravacao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('id' => $id));

        return GravacaoDAO::popular($req->fetch());

    }

    public static function delete($id) {
        // we make sure $id is an integer

        $id = intval($id);

        $req = Db::getInstance()->prepare('DELETE FROM gravacao WHERE id = :id');
        // the query was prepared, now we replace :id with our actual $id value
        $req->bindValue(":id", $id);

        return $req->execute();
    }

    public static function add(Gravacao $gravacao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("INSERT INTO gravacao (data,video,fk_id_sinal,fk_id_usuario) VALUES (:data,:video,:fk_id_sinal,:fk_id_usuario)");
        $req->bindValue(":data", $gravacao->getdata());
        $req->bindValue(":video", $gravacao->getVideo());
        $req->bindValue(":fk_id_sinal", $gravacao->getFk_id_sinal());
        $req->bindValue(":fk_id_usuario", $gravacao->getFk_id_usuario());
        return $req->execute();




    }

    public static function edit(Gravacao $gravacao) {
        // we make sure $id is an integer

        $req = Db::getInstance()->prepare("UPDATE gravacao SET data=:data,video=:video,fk_id_sinal=:fk_id_sinal,fk_id_usuario=:fk_id_usuario WHERE id=:id");
        $req->bindValue(":id", $gravacao->getId());
        $req->bindValue(":data", $gravacao->getdata());
        $req->bindValue(":video", $gravacao->getVideo());
        $req->bindValue(":fk_id_sinal", $gravacao->getFk_id_sinal());
        $req->bindValue(":fk_id_usuario", $gravacao->getFk_id_usuario());
        return $req->execute();
    }

    public static function popular($linha) {
        $gravacao = new Gravacao();

        $gravacao->setId($linha['id']);
        $gravacao->setdata($linha['data']);
        $gravacao->setVideo($linha['video']);
        $gravacao->setFk_id_sinal($linha['fk_id_sinal']);
        $gravacao->setFk_id_usuario($linha['fk_id_usuario']);

        return $gravacao;
    }


    public static function getGravacoesByUsuario($id) {
        $lista = [];

        $sql = "SELECT gr.*, s.nome, count(av.id) as qntd_av FROM gravacao gr
left JOIN avaliacao av
ON gr.id = av.fk_id_gravacao
inner join sinal s 
on s.id = gr.fk_id_sinal
where gr.fk_id_usuario = :id
group by gr.id
 order by qntd_av DESC";




        $req = Db::getInstance()->prepare($sql);
        $req->bindValue(":id", $id);

        $req->execute();



        foreach ($req->fetchAll() as $linha) {
            $gravacao = new Gravacao();

            $gravacao->setId($linha['id']);
            $gravacao->setdata($linha["data"]);
            $gravacao->setVideo($linha["video"]);
            $gravacao->setFk_id_sinal($linha["fk_id_sinal"]);
            $gravacao->setFk_id_usuario($linha["fk_id_usuario"]);
            $gravacao->setQntdAv($linha["qntd_av"]);
            $gravacao->setNome_sinal($linha['nome']);

            $lista[] = $gravacao;
        }

        return $lista;
    }


    public static function getGravacoesAleatorias($type, $id, $id_usuario, $limit){
        $sql = "SELECT gr.*, count(av.id) as avaliacoes from gravacao as gr left outer join avaliacao as av
        ON gr.id = av.fk_id_gravacao
    inner join sinal as sn
        ON gr.fk_id_sinal = sn.id
    inner join categoria as ct
        ON sn.categoria_id = ct.id
    INNER JOIN modulo as md
        ON ct.fk_id_modulo = md.id
        WHERE gr.fk_id_usuario <> :id_usuario
        AND (av.fk_id_usuario is NULL OR av.fk_id_usuario <> :id_usuario ) ";

        if($type == 0){
            $sql .= " and md.id = :id ";
        }else{
            $sql .= " and ct.id = :id ";
        }

        $sql .= "group by gr.id
    order by avaliacoes, rand()

    LIMIT 8";


    //echo $sql;





        $req = Db::getInstance()->prepare($sql);
        $req->bindValue(":id_usuario", $id_usuario);
        $req->bindValue(":id", $id);
        //$req->bindValue(":limit", $limit);
        $req->execute();


        $lista = [];

        foreach ($req->fetchAll() as $linha) {
            $lista[] = GravacaoDAO::popular($linha);
        }

        return $lista;

    }




    public static function getGravacoesAleatoriasBySinal($fk_id_sinal, $fk_id_usuario){
        $sql = "SELECT gr.*, count(av.id) as avaliacoes from gravacao as gr left outer join avaliacao as av
        ON gr.id = av.fk_id_gravacao
        WHERE gr.fk_id_usuario <> :fk_id_usuario
        AND gr.fk_id_sinal = :fk_id_sinal
        group by gr.id
    order by avaliacoes, rand()

    LIMIT 1";


    //echo $sql;





        $req = Db::getInstance()->prepare($sql);

        $req->bindValue("fk_id_usuario", $fk_id_usuario);
        $req->bindValue("fk_id_sinal", $fk_id_sinal);
        //$req->bindValue(":limit", $limit);
        $req->execute();


        $gravacao = new Gravacao();

        foreach ($req->fetchAll() as $linha) {
            $gravacao = GravacaoDAO::popular($linha);
        }
        return $gravacao;

    }



    public static function respostaCorreta($fk_id_sinal, $resposta){
        return true;
    }

}
