<?php

class Gravacao{
    private $id;
    private $data;
    private $video;
    private $fk_id_sinal;
    private $fk_id_usuario;
    private $opcoes = [];


    
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

}
?>
