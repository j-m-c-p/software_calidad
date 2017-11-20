<!-- 
*  
* Autor: Jhonnatan Cubides
-->
<html>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
				            <div class="panel-heading">Registrar Prototipos</div>
				            <div class="panel-body">
				                <form action="guardar_datos.php" method="get">


				                    <div class="form-group">
				                     	<input type="hidden" name="url" value="form_prototipo.php">
				                    	<input type="hidden" class="form-control" name="dato1">
				                    </div>
				                    <div class="form-group">
				                    	<label for="exampleInputPassword1">  Nombre Prototipo</label>
				                    	<input type="text" class="form-control" name="dato2" required >
				                    </div>
				                     

				                 
			     
				                    <input type="hidden" name="table" value="tb_prototipos">
				                    <input type="hidden" name="total-campos" value="2">
				                    <input type="hidden" name="campos" value="id_prototipo, nombre_prototipo">
				                    
				                      
				                 
				                  	<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
				                  	<a href='form_prototipo.php' class="btn btn-primary">Cancelar</a>
				                </form>
				          	</div>
				        </div>
				    </div>
			        
			      
			        <div class="col-xs-12 col-md-2 ">
			        	
			      	</div>
			      	<div class="col-xs-12 col-md-5">
			       		<CENTER><H1>PROTOTIPOS</H1></CENTER>
			        	<?php
								echo $obj_o->bring_information5_1( "tb_prototipos", 0, null , null, 'form_prototipo.php'); //Trae los datos.
								echo $obj_o->analytics('tb_analytics');
						?>
			        </div>
		      	</div>
		    </div>
		</div>
		


	</body>
</html>