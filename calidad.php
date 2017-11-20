
 <!-- 
*  
* Autores: Jhonnatan Cubides, Harley Santoyo
* 
-->
<html>
	<head>
		<title></title>
    <?php
    /* se incluye la clase BD la cual contiene las funciones para el funcionamiento del prototipo */
    include ('class/BD.php');

    /*Se nombra una variable para crear un nuevo objeto*/
    $obj_o= new BD;
    echo $obj_o->style('bootstrap');/*se trae el link de los estilos de bootstrap*/
   

    ?>
</head>
    <body>
      <div class='container-fluid'><br>

          <?php
            echo $obj_o->header();/* se imprime el encabezado */
          ?>



  	
          <center><h2>CALIFICA TU SOFTWARE</h2></center>
        
        
      
      		<div class="container">
        		<div class="row">
            
              <div class="col-xs-12 col-md-4 ">


                <div class="panel panel-primary">
                    <div class="panel-heading">Agregar Calificaci&oacute;n</div>
                    <div class="panel-body">
                          <form action="guardar_datos.php" method="get">


                                <div class="form-group">
                                  <input type="hidden" name="url" value="calidad.php">
                                  <input type="hidden" class="form-control" name="dato1">
                                </div>
                                
                                <div class="form-group" >
                                  <label for="exampleInputEmail1">Archivo  </label>
                                  <?php echo $obj_o->bring_information_list1( "dato2", "tb_archivo", "id_archivo", "nom_archivo"); ?>
                                </div>
                                  
                                
                                 
                                <div class="form-group">
                                  <label for="exampleInputPassword1"> Criterios</label>
                                  <?php echo $obj_o->bring_information_list1( "dato3", "tb_criterios", "id_criterio", "criterio"); ?>
                                </div>

                                <div class="form-group">
                                  <label for="exampleInputPassword1">  Valor</label>
                                  <input type="number" class="form-control" name="dato4" required >
                                </div>

                                <input type="hidden" name="table" value="tb_calidad">
                                <input type="hidden" name="total-campos" value="4">
                                <input type="hidden" name="campos" value="id_calidad, id_archivo, id_criterio, valor">
                                
                                  
                             
                                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                                <a href='calidad.php' class="btn btn-primary">Cancelar</a>
                          </form>
                    </div>
                </div>
              </div>
              <div class="col-xs-12 col-md-2 "></div>
              <div  class="col-xs-12 col-md-4 ">
                <div style="overflow-y: auto; height: 350px; width: 500px">
                  <?php
                  echo $obj_o->bring_information5_1( "tb_calidad", 0, null, null, 'calidad.php' ); //Trae los datos.
                  echo $obj_o->analytics('tb_analytics');
                  ?>
                </div>


              </div>
            </div>
        </div>
      </div>


		</body>

</html>