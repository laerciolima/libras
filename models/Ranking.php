<?php

class Ranking{
    private $id;
    private $posicao;
    private $nome;
    private $nivel;
    private $pontuacao;
    private $fk_id_usuario;
    
function setId ($id){
        
        $this->id=$id;
    }
    function getId (){
        
        return $this->id;
    }
    public function getPosicao() {
        return $this->posicao;
    }

    public function setPosicao($posicao) {
        $this->posicao = $posicao;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNivel() {
        return $this->nivel;
    }

    public function setNivel($nivel) {
        $this->nivel = $nivel;
    }

    public function getPontuacao() {
        return $this->pontuacao;
    }

    public function setPontuacao($pontuacao) {
        $this->pontuacao = $pontuacao;
    }

    public function getfk_id_usuario() {
        return $this->fk_id_usuario;
    }

    public function setfk_id_usuario($fk_id_usuario) {
        $this->fk_id_usuario = $fk_id_usuario;
    }

}
?>
