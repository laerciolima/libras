<?php
  class PagesController {
    public function home() {
      $first_name = 'Jon';
      $last_name  = 'Snow';
      require_once('views/pages/home.php');
    }

    public function error() {
      require_once('views/pages/error.php');
    }
    
    
    public function avaliar(){
        require 'views/pages/avaliar.php';
    }
    
    public function amigos(){
        require 'views/estudante/amigos.php';
    }
    public function gravar(){
        require 'views/pages/gravar.php';
    }
  }
?>