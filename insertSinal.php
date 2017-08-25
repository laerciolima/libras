<?php

require './connection.php';


/*
$dir = "storage/videos/sinais/";
$files = scandir($dir);
$orientacao = ['pra cima', 'pra baixo'];
for ($i = 3; $i < count($files); $i++) {

    try {

        $req = Db::getInstance()->prepare("INSERT INTO sinal (nome,video,foto,orientacao,ExpressaoFacial_idExpressaoFacial,pontodearticulacao_idpontodearticulacao,sinaldefinepesoinicial,categoria_id,utilizacaodasmaos) VALUES (:nome,:video,:foto,:orientacao,:ExpressaoFacial_idExpressaoFacial,:pontodearticulacao_idpontodearticulacao,:sinaldefinepesoinicial,:categoria_id,:utilizacaodasmaos)");
        $req->bindValue(":nome", str_replace(".mp4", "", $files[$i]));
        $req->bindValue(":video", $files[$i]);
        $req->bindValue(":foto", "foto" . rand(1, 20) . ".jpg");
        $req->bindValue(":orientacao", $orientacao[rand(0, 1)]);
        $req->bindValue(":ExpressaoFacial_idExpressaoFacial", rand(1, 4));
        $req->bindValue(":pontodearticulacao_idpontodearticulacao", rand(1, 5));
        $req->bindValue(":sinaldefinepesoinicial", 1);
        $req->bindValue(":categoria_id", rand(1, 8));
        $req->bindValue(":utilizacaodasmaos", 0);
        $req->execute();
        
        echo $files[$i]." cadastrado<br/>";
    } catch (Exception $ex) {
        var_dump($ex->getMessage());
    }
}




for($i=0; $i < 1000; $i++){
        $req = Db::getInstance()->prepare("INSERT INTO gravacao (data,video,fk_id_sinal,fk_id_usuario) VALUES (NOW() ,:video,:fk_id_sinal,:fk_id_usuario)");
        $req->bindValue(":video", "video1.mp4");
        $req->bindValue(":fk_id_sinal", rand(15, 567));
        $req->bindValue(":fk_id_usuario", rand(1,14));
        $req->execute();
}

SELECT gr.*, count(av.id) from gravacao as gr 
    left outer join avaliacao as av 
        ON gr.id = av.fk_id_gravacao 
    inner join sinal as sn
        ON gr.fk_id_sinal = sn.id
    inner join categoria as ct 
        ON sn.categoria_id = ct.id
    INNER JOIN modulo as md 
        ON ct.fk_id_modulo = md.id
    WHERE gr.fk_id_usuario <> 2
    group by gr.id; 

*/
for($i=4; $i <= 14; $i++){

    mkdir("storage/videos/users/".$i);
}