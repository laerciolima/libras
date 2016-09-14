<?php

class Gravacao{
    private $id;
    private $data;
    private $video;
    private $fk_id_sinal;
    private $fk_id_usuario;
    
function setId ($id){
        
        $this->id=$id;
    }
    function getId (){
        
        return $this->id;
    }
    public function getData() {
        return $this->data;
    }

    public function setData($data) {
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

}
?>
