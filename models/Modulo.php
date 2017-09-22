<?php

class Modulo{
    private $id;
    private $nome;
    private $descricao;
    private $nivel;
    private $qntd_sinais;
    
function setId ($id){
        
        $this->id=$id;
    }
    function getId (){
        
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getQntdSinais() {
        return $this->qntd_sinais;
    }

    public function setQntdSinais($qntd_sinais) {
        $this->qntd_sinais = $qntd_sinais;
    }


}
?>
