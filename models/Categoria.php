<?php

class Categoria{
    private $id;
    private $nome;
    private $descricao;
    private $imagem;
    private $fk_id_modulo;
    private $porcentagem_gravada;
    private $qntd_sinais;
    private $qntd_sinais_aprendidos;

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

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getFk_id_modulo() {
        return $this->fk_id_modulo;
    }

    public function setFk_id_modulo($fk_id_modulo) {
        $this->fk_id_modulo = $fk_id_modulo;
    }

    public function getQntdSinaisAprendidos() {
        return $this->qntd_sinais_aprendidos;
    }

    public function setQntdSinaisAprendidos($qntd_sinais) {
        $this->qntd_sinais_aprendidos = $qntd_sinais;
    }

    public function getQntdSinais() {
        return $this->qntd_sinais;
    }

    public function setQntdSinais($qntd_sinais) {
        $this->qntd_sinais = $qntd_sinais;
    }

}
?>
