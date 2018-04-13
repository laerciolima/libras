<?php

class Atividade{
    private $id;
    private $titulo;
    private $descricao;
    private $ordem;
    private $fk_id_modulo;
    private $pontuacao;
    private $sinais;
    
function setId ($id){
        
        $this->id=$id;
    }
    function getId (){
        
        return $this->id;
    }
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getOrdem() {
        return $this->ordem;
    }

    public function setOrdem($ordem) {
        $this->ordem = $ordem;
    }

    public function getFk_id_Modulo() {
        return $this->fk_id_modulo;
    }

    public function setFk_id_Modulo($fk_id_modulo) {
        $this->fk_id_modulo = $fk_id_modulo;
    }

    public function getPontuacao() {
        return $this->pontuacao;
    }

    public function setPontuacao($pontuacao) {
        $this->pontuacao = $pontuacao;
    }

    public function getSinais() {
        return $this->sinais;
    }

    public function setSinais($sinais) {
        $this->sinais = $sinais;
    }

}
?>
