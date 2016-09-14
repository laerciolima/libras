<?php

class Sinal{
    private $id;
    private $fk_id_categoria;
    private $dificuldade;
    private $foto;
    private $nome;
    private $orientacao;
    private $video;
    private $fk_id_expressao_facial;
    private $fk_id_ponto_de_articulacao;
    
function setId ($id){
        
        $this->id=$id;
    }
    function getId (){
        
        return $this->id;
    }
    public function getFk_id_categoria() {
        return $this->fk_id_categoria;
    }

    public function setFk_id_categoria($fk_id_categoria) {
        $this->fk_id_categoria = $fk_id_categoria;
    }

    public function getDificuldade() {
        return $this->dificuldade;
    }

    public function setDificuldade($dificuldade) {
        $this->dificuldade = $dificuldade;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getOrientacao() {
        return $this->orientacao;
    }

    public function setOrientacao($orientacao) {
        $this->orientacao = $orientacao;
    }

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function getFk_id_expressao_facial() {
        return $this->fk_id_expressao_facial;
    }

    public function setFk_id_expressao_facial($fk_id_expressao_facial) {
        $this->fk_id_expressao_facial = $fk_id_expressao_facial;
    }

    public function getFk_id_ponto_de_articulacao() {
        return $this->fk_id_ponto_de_articulacao;
    }

    public function setFk_id_ponto_de_articulacao($fk_id_ponto_de_articulacao) {
        $this->fk_id_ponto_de_articulacao = $fk_id_ponto_de_articulacao;
    }

}
?>
