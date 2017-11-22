<?php

class Usuario{
    private $id;
    private $nome;
    private $email;
    private $perfil;
    private $usuario;
    private $senha;
    private $sinais_aprendidos;
    private $imagem;
    private $url;

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

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    public function getusuario() {
        return $this->usuario;
    }

    public function setusuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getPontuacao() {
        return $this->sinais_aprendidos;
    }

    public function setPontuacao($sinais_aprendidos) {
        $this->sinais_aprendidos = $sinais_aprendidos;
    }

    public function getImagem() {
        return $this->imagem;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

}
?>
