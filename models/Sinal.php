<?php

class Sinal{
    private $id;
    private $nome;
    private $video;
    private $foto;
    private $orientacao;
    private $expressaofacial_idexpressaofacial;
    private $pontodearticulacao_idpontodearticulacao;
    private $sinaldefinepesoinicial;
    private $categoria_id;
    private $utilizacaodasmaos;
    private $maoprincipal_id;
    private $maosecundaria_id;
    
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

    public function getVideo() {
        return $this->video;
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }

    public function getOrientacao() {
        return $this->orientacao;
    }

    public function setOrientacao($orientacao) {
        $this->orientacao = $orientacao;
    }

    public function getExpressaoFacial_idExpressaoFacial() {
        return $this->expressaofacial_idexpressaofacial;
    }

    public function setExpressaoFacial_idExpressaoFacial($expressaofacial_idexpressaofacial) {
        $this->expressaofacial_idexpressaofacial = $expressaofacial_idexpressaofacial;
    }

    public function getPontoDeArticulacao_idPontoDeArticulacao() {
        return $this->pontodearticulacao_idpontodearticulacao;
    }

    public function setPontoDeArticulacao_idPontoDeArticulacao($pontodearticulacao_idpontodearticulacao) {
        $this->pontodearticulacao_idpontodearticulacao = $pontodearticulacao_idpontodearticulacao;
    }

    public function getSinalDefinePesoInicial() {
        return $this->sinaldefinepesoinicial;
    }

    public function setSinalDefinePesoInicial($sinaldefinepesoinicial) {
        $this->sinaldefinepesoinicial = $sinaldefinepesoinicial;
    }

    public function getCategoria_id() {
        return $this->categoria_id;
    }

    public function setCategoria_id($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    public function getUtilizacaoDasMaos() {
        return $this->utilizacaodasmaos;
    }

    public function setUtilizacaoDasMaos($utilizacaodasmaos) {
        $this->utilizacaodasmaos = $utilizacaodasmaos;
    }

    public function getMaoPrincipal_id() {
        return $this->maoprincipal_id;
    }

    public function setMaoPrincipal_id($maoprincipal_id) {
        $this->maoprincipal_id = $maoprincipal_id;
    }

    public function getMaoSecundaria_id() {
        return $this->maosecundaria_id;
    }

    public function setMaoSecundaria_id($maosecundaria_id) {
        $this->maosecundaria_id = $maosecundaria_id;
    }

}
?>
