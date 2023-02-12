<?php
include("nodo.php");
    // Definicion de la clase LISTA SIMPLE
    Class ListaSimple
    {
        private $NodoInicial;
        private $Final;
        
        function __construct()
        {
            $this->NodoInicial = null;
            $this->Final = null;
        }

        function AgregarNodoPrincipio ($P)
        {

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
                
                while($P != null)
                {
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

    }
    
?>