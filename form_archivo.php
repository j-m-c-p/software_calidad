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
  	echo $obj_o->style('bootstrap');
   

    ?>
</head>
	<body>
		<div class='container-fluid'><br>

				<?php
					echo $obj_o->header();
				?>


				<br>
				
				<div class="container">
			  		<div class="row">
					      <div class="col-xs-12 col-md-4 ">
					      	<div class="panel panel-primary">
					            <div class="panel-heading">Registrar Archivo</div>
					            <div class="panel-body">
					                <form action="guardar_datos.php" method="get">


					                     <div class="form-group">
					                     	<input type="hidden" name="url" value="form_archivo.php">
					                     	<input type="hidden" class="form-control" name="dato1">
					                     </div>
					                     <div class="form-group">
					                     	<label for="exampleInputPassword1">  Nombre archivo</label>
					                     	<input type="text" class="form-control" name="dato2" required >
					                     </div>

					                     <div class="form-group">
					                     	<label for="exampleInputEmail1">Prototipo  </label>
					                     	<?php echo $obj_o->bring_information_list1( "dato3", "tb_prototipos", "id_prototipo", "nombre_prototipo"); ?>
					                     </div>
					                     <div class="form-group" >


					                          <label for="exampleInputEmail1">Tipo Archivo  </label>
					                          <?php echo $obj_o->bring_information_list1( "dato4", "tb_tipo_archivo", "id_tipo_archivo", "tipo_archivo"); ?>
					                      </div>
				     
					                      <input type="hidden" name="table" value="tb_archivo">
					                      <input type="hidden" name="total-campos" value="4">
					                      <input type="hidden" name="campos" value="id_archivo, nom_archivo, id_prototipo, id_tipo_archivo">
					                    
					                      
					                 
						                  <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
						                  <a href='form_archivo.php' class="btn btn-primary">Cancelar</a>
					                </form>
					          	</div>
					        </div>
					      </div>
				        <div class="col-xs-12 col-md-2 ">
				        	
				      	</div>
					    <div class="col-xs-12 col-md-5">
					       	<CENTER><H1>ARCHIVOS</H1></CENTER>
				        	<?php
									
					               
									echo $obj_o->bring_information5_1( "tb_archivo", 0,null, null, 'form_archivo.php' ); //Trae los datos.
									echo $obj_o->analytics('tb_analytics');

							?>
			         	</div>
			      	</div>
		    	</div>
		</div>
	


	</body>
</html>