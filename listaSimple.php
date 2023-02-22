<?php
include("nodo.php");
    // Definicion de la clase LISTA SIMPLE
    Class ListaSimple
    {
      private $NodoInicial;
      private $Final;
        
      function __construct(){
        $this->NodoInicial = null;
        $this->Final = null;
      }
      function ListaVacia(){
         if($this->NodoInicial == null){
           return true;
        }else{
           return false;
        }
      }
      function longitud(){
        $P = $this->NodoInicial;
        $contador = 0;
        while ($P != null){
          $contador = $contador + 1 ;
          $P = $P->getSig();
        }
        return $contador ;
      }
      function AgregarNodoPrincipio ($P){
        if($this->NodoInicial == null){
            $this->Final = $P;
        }else{
          $P->setSig($this->NodoInicial);
        }
        $this->NodoInicial = $P;
      }
      function VisualizarLista(){
        $P =  $this->NodoInicial;
        $Mensaje = "";
        if($P == null){
          return "Lista Vacia";
        }else{
          while($P != null){
            $Mensaje = $Mensaje." <br>-".$P->getInfo();
            $P = $P->getSig();
          }
        }
        return "La lista es: $Mensaje";
      }
      function AgregarNodoFinal($P){
        if ($this->NodoInicial == null){
          $this->NodoInicial = $P;
        }else{
          $this->Final->setSig($P);
        }
        $this->Final = $P;
      }
      function NodoBuscar($C){
        $P = $this->NodoInicial;
        $Encontrado = False;
        while ($P != null && !$Encontrado){
          if ($P->getInfo() == $C){
            $Encontrado = true;
          }else{
            $P = $P->getSig();
          }
        }
        return $P;
      }
    //funcion que busca el mayor
    function NodoBuscarMayor(){
      $P = $this->NodoInicial;
      $temporal = $P;
      while ($P != null){
        if ($P->getInfo() > $temporal->getInfo()){
          $temporal = $P;
        }
        $P = $P->getSig();
      }
      return $temporal;
    } 
    //funcion eliminacion al inicio
    function EliminarInicio(){
      if($this->ListaVacia()){
        return "Lista Vacia";
      }else{
        $P = $this->NodoInicial;
        $this->NodoInicial = $this->NodoInicial->getSig();
        return $P->getInfo() ;
      }
    }
    //funcion eliminacion al final
    function EliminarFinal(){
      if($this->ListaVacia()){
        return "Lista Vacia";
      }else{
        $P = $this->NodoInicial;
        while ($P->getSig() != Null){
          $Previo = $P ;
          $P = $P->getSig();
        }
        $eliminado = $P->getInfo();
        $this->Final = $Previo;
        $Previo->setSig(null);
        return $eliminado;
      }
    }
    //funcion de 
    //funcion de eliminacion por dato
    function Eliminar($C){
      $P = $this->NodoInicial;
      $Ant = $P;
      $Encontrado = false;
      $Eliminado = false;
      while($P != null && !$Encontrado ){
        if($P->getInfo() == $C){
          $Encontrado = true;
        }else{
          $Ant = $P;
          $P = $P->getSig();
        }
      }
      if($P == null){
        $Eliminado = false;
      }else{
        if($P == $this->NodoInicial){
          $this->NodoInicial = $this->NodoInicial->getSig();
          if ($P == $this->Final){
            $this->Final = null;
          }
        }else{
          $Ant->setSig($P->getSig());
          if ($P == $this->Final){
            $this->Final = $Ant;
          }
        }
        $P = null;
        $Eliminado = true;
      }
      return $Eliminado;
    }
    //funcion que intercambia el primer nodo con el ultimo nodo
    function IntercambioNodos(){
      $P = $this->NodoInicial;
      $inicio = $P->getInfo();
      $ultimo = $P;
      while ($P != null){
        $ultimo = $P->getInfo();
        $P = $P->getSig();
      }
      $this->EliminarInicio();
      $ni = new nodo ($ultimo);
      $this->AgregarNodoPrincipio($ni);
      $this->EliminarFinal();
      $nf = new nodo ($inicio);
      $this->AgregarNodoFinal($nf);
    }
    //mover elementos
    function moverElemento($posInicial, $posFinal){
      if ($posInicial < 0 || $posFinal < 0){
        //"La posición debe ser mayor o igual a cero!"
        return False;
      }
      if ($posInicial == $posFinal){
        //"La posición iguales!"
        return False;
      }else{
        $contador = 0 ;
        $previo = $this->NodoInicial;
        $P = $this->NodoInicial;
        $temporal = null ;
        if($posInicial == 0){
          $temporal = $P ;
        }else{
          while ($contador < $posInicial){
            $contador = $contador + 1 ;
            $previo = $P;
            if($contador == $posInicial){
              $temporal = $P->getSig();
            }
            $P = $P->getSig();
          }
        }
        if($posInicial == 0){
           $this->EliminarInicio();
        }else{
          $previo->setSig($P->getSig());
        }
        $contador = 0;
        $previo = $this->NodoInicial;
        $P = $this->NodoInicial;
        while($contador < $posFinal){
          $contador = $contador + 1 ;
          $previo = $P;
          $P = $P->getSig();
        }
        if($posFinal == 0){
          $temporal->setSig($this->NodoInicial);
          $this->NodoInicial = $temporal ;
        }else{
          $previo->setSig($temporal);
          $temporal->setSig($P);
        }
      }
    }

    // ordenamiento 
    /*
    function ordenAscendenteLista(){
      $contador = $this->longitud();
      while ($contador > 0){
        $previo = $this->NodoInicial;
        $P = $this->NodoInicial;
        $contador = 0;
        for ($i = 1; $i <= $this->longitud(); $i++) {
          $previo = $actual ;
          $P = $P->getSig();
          if ($previo->getInfo() > $P->getInfo() ){
            $this->moverElemento(i, i+1);
            $contador = $contador + 1 ;
          }
        }
      }
    }*/
  } 
?>