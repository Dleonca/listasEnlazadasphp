<?php 
  include("listaSimple.php");
  session_start(); //variable de session cookies
  if (isset($_SESSION["lista"]) == false){
    $_SESSION["lista"] = new listaSimple();
    //echo"lista creada";
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas Enlazadas</title>
</head>
<body>
    <h1>Listas Enlanzadas Simples</h1>

    <h2>Agregar Item al Inicio:</h2>
    <form action="index.php" method ="post">
        <input type="text" name="agregarinicio">
        <input type="submit" value= Agregar >
    </form>
    <?php
      //solo imprime si existe
      if (isset($_POST["agregarinicio"])){
        $n = new nodo ($_POST["agregarinicio"]);
        $_SESSION["lista"]-> AgregarNodoPrincipio($n);
      }
    ?>
      <br> <hr>
     <h2>Agregar Item al Final:</h2>
    <form action="index.php" method ="post">
        <input type="text" name="agregarfinal">
        <input type="submit" value= Agregar >
    </form>
    <?php
      //solo imprime si existe
      if (isset($_POST["agregarfinal"])){
        $n = new nodo ($_POST["agregarfinal"]);
        $_SESSION["lista"]-> AgregarNodoFinal($n);
      }
    ?>
     <br> <hr>
    <h2>Buscar elemento en una lista:</h2>
    <form action="index.php" method ="post">
        <input type="text" name="buscar">
        <input type="submit" value= "Buscar" >
    </form>
    <?php
      //solo imprime si existe
      if (isset($_POST["buscar"])){
       $B = $_SESSION["lista"]-> NodoBuscar($_POST["buscar"]);
       if ($B != null){
         echo "se encontro elemento" ;
       }else{
         echo "no se encontro elemento";
       }
      }

    ?>
     <br> <hr>
    <h2>Buscar elemento MAYOR en una lista:</h2>
   <form action="index.php" method ="post">
        <input type="submit" name="BuscarMayor" value= "Elemento Mayor" >
    </form>
    <?php
      //solo imprime si existe
      if (isset($_POST["BuscarMayor"])){
      if ($_SESSION["lista"]->ListaVacia() == false){
        $Bm = $_SESSION["lista"]->NodoBuscarMayor();
         echo "El elemento mayor es:".$Bm->getInfo() ;
       }else{
         echo "lista vacia";
       }
      }
    ?>
     <br> <hr>
    <h2>Eliminar elemento en una lista:</h2>
    <form action="index.php" method ="post">
        <input type="text" name="eliminar">
        <input type="submit" value= "Eliminar" >
    </form>
    <?php
      //solo imprime si existe
      if (isset($_POST["eliminar"])){
       $E = $_SESSION["lista"]-> Eliminar($_POST["eliminar"]);
       if ($E ){
         echo "Elemento eliminado" ;
       }else{
         echo "no se encontro elemento";
       }
      }
    ?>
  <br> <hr>
  <h2>Eliminar elemento Inicial de una lista:</h2>
    <form action="index.php" method ="post">
        <input type="submit" name="eliminarInicio" value= "Eliminar" >
    </form>
    <?php
      //solo imprime si existe
      if (isset($_POST["eliminarInicio"])){
       $EI = $_SESSION["lista"]-> EliminarInicio();
       if ($EI ){
         echo "Elemento eliminado" ;
       }else{
         echo "no se encontro elemento";
       }
      }
    ?>
   <br> <hr>
  <h2>Eliminar elemento Final de una lista:</h2>
    <form action="index.php" method ="post">
        <input type="submit" name="eliminarFinal" value= "Eliminar" >
    </form>
    <?php
      //solo imprime si existe
      if (isset($_POST["eliminarFinal"])){
       $EF = $_SESSION["lista"]-> EliminarFinal();
       if ($EF ){
         echo "Elemento eliminado" ;
       }else{
         echo "no se encontro elemento";
       }
      }
    ?>
    

  <br> <hr>
  <h2>Intercambio de nodo inicial y final</h2>
  <form action="index.php" method ="post">
        <input type="submit" name="Intercambio" value= "intercambio" >
    </form>
  <?php 
     $longitud = $_SESSION["lista"]->longitud() ;
     echo "Longitud: ".$longitud ;  
     echo  "<br>" ;
    if (isset($_POST["Intercambio"])){
      if ($_SESSION["lista"]->ListaVacia() == false && $longitud > 2){
        $Bm = $_SESSION["lista"]->IntercambioNodos();
       }
      if ($longitud <= 2){
        echo "longitud menor o igual a 2";
      }else{
         echo "lista vacia";
       }
    }
  ?> 
  <br> <hr>
  <h2>ordenamiento ascendente de una lista</h2>
  <form action="index.php" method ="post">
    <input type="submit" name="ordenarAS" value= "ordenar Lista" >
  </form>
  <?php 
    if (isset($_POST["ordenarAS"])){
      if ($_SESSION["lista"]->ListaVacia() == false && $longitud > 1){
        $Bm = $_SESSION["lista"]->ordenAscendenteLista();
       }
      if ($longitud < 2){
        echo "longitud menor a 2";
      }else{
         echo "lista vacia";
       }
    }
  ?> 
  <br> <hr>
    <?php
      echo  $_SESSION["lista"]-> VisualizarLista();
    ?>
</body>
</html>