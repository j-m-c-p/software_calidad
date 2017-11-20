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


        		<br>
        	
        		<div class="container">
            		  <div class="row">
                    <div class="col-xs-12 col-md-3">
                   
                    </div>
                    <div class="col-xs-12 col-md-6 ">
                       <CENTER><H1> Calificaci&oacute;n </H1></CENTER>
                       <br>
                       <?php
                           //echo $obj_o->bring_information5("prueba",0); //Trae los datos.
                           echo $obj_o->bring_information5_0(); //Trae los datos.
                           echo $obj_o->analytics('tb_analytics');
                       ?>
                    </div>
                    <div class="col-xs-12 col-md-4 ">
                

                    </div>
                  </div>
            </div>
          </div>



    </body>
</html>