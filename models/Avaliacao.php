<?php

class Avaliacao{
    private $id;
    private $data;
    private $nota_configuracao_mao;
    private $nota_expressao_facial;
    private $nota_media;
    private $nota_movimento;
    private $nota_orientacao;
    private $nota_ponto_articulacao;
    private $fk_id_gravacao;
    private $fk_id_usuario;
    private $nota_final;
    private $observacoes;
    private $acertado;
    
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

    public function getNota_configuracao_mao() {
        return $this->nota_configuracao_mao;
    }

    public function setNota_configuracao_mao($nota_configuracao_mao) {
        $this->nota_configuracao_mao = $nota_configuracao_mao;
    }

    public function getNota_expressao_facial() {
        return $this->nota_expressao_facial;
    }

    public function setNota_expressao_facial($nota_expressao_facial) {
        $this->nota_expressao_facial = $nota_expressao_facial;
    }

    public function getNota_media() {
        return $this->nota_media;
    }

    public function setNota_media($nota_media) {
        $this->nota_media = $nota_media;
    }

    public function getNota_movimento() {
        return $this->nota_movimento;
    }

    public function setNota_movimento($nota_movimento) {
        $this->nota_movimento = $nota_movimento;
    }

    public function getNota_orientacao() {
        return $this->nota_orientacao;
    }

    public function setNota_orientacao($nota_orientacao) {
        $this->nota_orientacao = $nota_orientacao;
    }

    public function getNota_ponto_articulacao() {
        return $this->nota_ponto_articulacao;
    }

    public function setNota_ponto_articulacao($nota_ponto_articulacao) {
        $this->nota_ponto_articulacao = $nota_ponto_articulacao;
    }

    public function getFk_id_gravacao() {
        return $this->fk_id_gravacao;
    }

    public function setFk_id_gravacao($fk_id_gravacao) {
        $this->fk_id_gravacao = $fk_id_gravacao;
    }

    public function getFk_id_usuario() {
        return $this->fk_id_usuario;
    }

    public function setFk_id_usuario($fk_id_usuario) {
        $this->fk_id_usuario = $fk_id_usuario;
    }

    public function getNota_final() {
        return $this->nota_final;
    }

    public function setNota_final($nota_final) {
        $this->nota_final = $nota_final;
    }

    public function getObservacoes() {
        return $this->observacoes;
    }

    public function setObservacoes($observacoes) {
        $this->observacoes = $observacoes;
    }

    public function getAcerto() {
        return $this->acertado;
    }

    public function setAcerto($acertado) {
        $this->acertado = $acertado;
    }

}
?>
