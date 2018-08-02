<?php

class Gravacao{
    private $id;
    private $data;
    private $video;
    private $fk_id_sinal;
    private $nome_sinal;
    private $fk_id_usuario;
    private $opcoes = [];
    private $qntd_avaliacao;
    private $video_original;


    
function setId ($id){
        
        $this->id=$id;
    }
    function getId (){
        
        return $this->id;
    }
    public function getdata() {
        return $this->data;
    }

    public function setdata($data) {
        $this->data = $data;
    }

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function getFk_id_sinal() {
        return $this->fk_id_sinal;
    }

    public function setFk_id_sinal($fk_id_sinal) {
        $this->fk_id_sinal = $fk_id_sinal;
    }

    public function getNome_sinal() {
        return $this->nome_sinal;
    }

    public function setNome_sinal($nome_sinal) {
        $this->nome_sinal = $nome_sinal;
    }

    
    public function getFk_id_usuario() {
        return $this->fk_id_usuario;
    }

    public function setFk_id_usuario($fk_id_usuario) {
        $this->fk_id_usuario = $fk_id_usuario;
    }

    public function getOpcoes() {
        
        return $this->opcoes;
    }

    public function setOpcoes($opcoes) {
        $this->opcoes = $opcoes;
    }

    public function getQntdAv() {
        
        return $this->qntd_avaliacao;
    }

    public function setQntdAv($qntd_avaliacao) {
        $this->qntd_avaliacao = $qntd_avaliacao;
    }

    public function getVideoOriginal() {
        
        return $this->video_original;
    }

    public function setVideoOriginal($video_original) {
        $this->video_original = $video_original;
    }

}
?>
