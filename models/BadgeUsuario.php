<?php

class BadgeUsuario{
    private $id;
    private $fk_id_usuario;
    private $fk_id_badge;
    private $data;
    
function setId ($id){
        
        $this->id=$id;
    }
    function getId (){
        
        return $this->id;
    }
    public function getFk_id_usuario() {
        return $this->fk_id_usuario;
    }

    public function setFk_id_usuario($fk_id_usuario) {
        $this->fk_id_usuario = $fk_id_usuario;
    }

    public function getFk_id_badge() {
        return $this->fk_id_badge;
    }

    public function setFk_id_badge($fk_id_badge) {
        $this->fk_id_badge = $fk_id_badge;
    }

    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

}
?>
