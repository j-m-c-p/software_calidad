<!-- 
*  
* Autor: Jhonnatan Cubides
* 
-->
<html>

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
					      <div class="col-xs-12 col-md-4 ">
					      	<div class="panel panel-primary">
					            <div class="panel-heading">Agregar Criterio</div>
					            <div class="panel-body">
					                <form action="guardar_datos.php" method="get">


					                    <div class="form-group">
					                     	<input type="hidden" name="url" value="form_criterio.php">
					                    	<input type="hidden" class="form-control" name="dato1">
					                    </div>
					                    <div class="form-group">
					                    	<label for="exampleInputPassword1">  Criterio </label>
					                    	<input type="text" class="form-control" name="dato2" required >
					                    </div>
					                    <div class="form-group">
					                    	<label for="exampleInputPassword1">  Sn_Multiplo</label>
					                    	<input type="number" class="form-control" name="dato3" required >
					                    </div>

					                 
				     
					                    <input type="hidden" name="table" value="tb_criterios">
					                    <input type="hidden" name="total-campos" value="3">
					                    <input type="hidden" name="campos" value="id_criterio, criterio, divi">
					                    
					                      
					                 
						                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-refresh"></span> Guardar</button>
						                <a href='form_criterio.php' class="btn btn-primary">Cancelar</a>
					                </form>
					          </div>
					        </div>
					    </div>
			        
			      
				        <div class="col-xs-12 col-md-2 ">
				        	
				      	</div>
				      	<div class="col-xs-12 col-md-6">
					      	<CENTER><H1>CRITERIOS</H1></CENTER>
					  		<?php
								echo $obj_o->bring_information5_1( "tb_criterios", 0, null , null, 'form_criterio.php'); //Trae los datos.
								echo $obj_o->analytics("tb_analytics");
							?>
					
				      	</div>
			      	</div>
			    </div>
			</div>
			


	</body>
</html>