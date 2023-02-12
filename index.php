<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <section>
        <h2>lista simple</h2>
        <?php 
           include("listaSimple.php");
           $listaDiasSemana = new ListaSimple();

           $Domingo = new nodo("Domingo");
           $Lunes = new nodo("Lunes");
           $Martes = new nodo("Martes");
           $Miercoles = new nodo("Miercoles");
           $Jueves = new nodo("Jueves");
           $Viernes = new nodo("Viernes");
           $Sabado = new nodo("Sabado");

           $listaDiasSemana-> AgregarNodoPrincipio($Domingo);
           $listaDiasSemana-> AgregarNodoPrincipio($Lunes);
           $listaDiasSemana-> AgregarNodoPrincipio($Martes);
           $listaDiasSemana-> AgregarNodoPrincipio($Miercoles);
           $listaDiasSemana-> AgregarNodoPrincipio($Jueves);
           $listaDiasSemana-> AgregarNodoPrincipio($Viernes);
           $listaDiasSemana-> AgregarNodoPrincipio($Sabado);
           echo $listaDiasSemana->VisualizarLista() ;
           $B = $listaDiasSemana-> NodoBuscar("Domingo");
           echo "<br/>";
           echo "buscar";
           echo $B->getInfo();

           $E = $listaDiasSemana-> Eliminar("Domingo");
           echo "<br/>";
           echo "eliminar";
           if ($E == TRUE ){
            echo " elemento elimindo : ";
            echo $E ;
           }
           
         ?>
    </section>
   
  </body>
</html>

