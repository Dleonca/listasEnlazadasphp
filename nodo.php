<?php
  Class nodo {
  //atributos
   private $info;
   private $sig;
  //constructor
  function __construct($i){
    $this->info =$i;
    $this->siguiente = null;
    
  }
  //gets & sets
  public function getInfo(){
    return $this->info;
  }
  public function setInfo($info){
    $this->info = $info; 
  }

  public function getSig(){
    return $this->sig;
  }
  public function setSig($sig){
    $this->sig = $sig;
  }

  }
?>