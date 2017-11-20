<?php
	/*
	* 
	* Autor: Jhonnatan Cubides
	* 
	*/


	/**
	*Esta clase contiene todas la funciones.
	*/
	include('Graficos.php');/* se incluye el archivo Graficos.php el cual contiene la clase graficos.*/
	class BD extends Graficos
	{

		public $connection; //variable publica


		/**
		*
		*esta funcion es el constructor.						
		*
		*/
		function BD ()
		{
			$this->connection=$this->create_connection();
			//echo "nacio la clase BD";
		}
		
		/**
		*esta funcion se encarga de crear la connection con el server.			
		*@return    la connection a la base de datos.
		*/
		
		 function create_connection ()
		 {
		 	include('config.php');
		 	return mysqli_connect($server,$usser,$key,$bd);
		 }
		 




		/**
		*esta función sirve para mostrar el formulario el cual contiene un select que trae los datos de una table
		*@param 	texto  		parametro de entrada que contiene $name_list
		*@param 	texto 		parametro de entrada que contiene table
		*@param 	texto 		parametro de entrada que contiene primary_key_field
		*@param 	texto 		parametro de entrada que contiene $field_to_show
		*/


		

		function bring_information_list1( $name_list, $table, $primary_key_field, $field_to_show )
		{
			include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
			//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

			$exit = "";

			//------------SQL Se traen datos----------------------------------------------------
			$sql = "SELECT * FROM  $table ";
			
			

			$connection = mysqli_connect( $server, $usser, $key, $bd );
			$result = $connection->query( $sql );	

			$exit .= "<SELECT NAME='$name_list' class='form-control'>";
			$exit .= "<OPTION VALUE='-1'>Seleccionar</OPTION>";

			while( $row = mysqli_fetch_assoc( $result ) )
			{
				$exit .= "<OPTION VALUE='".$row[ $primary_key_field ]."'>".utf8_encode($row[ $field_to_show ])."</OPTION>";
			}

			$exit .= "</SELECT>";

			return $exit;	
		}


		
		
		/**
		*esta función sirve para guardar los datos en la base de datos.
		*@param 	texto  		parametro de entrada que contiene $table
		*@param 	texto 		parametro de entrada que contiene campos
		*@param 	texto 		parametro de entrada que contiene $datos
		*@return 	texto 		retorna todo lo que contiene la variable exit.
		*/


		function save_information( $table, $campos, $datos, $url )
		{
			include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
			//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

			$exit = "";

			//------------SQL para ingresar datos----------------------------------------------------
			$sql = "INSERT INTO  $table ( $campos ) VALUES( $datos )";

			//echo $sql;

			$connection = mysqli_connect( $server, $usser, $key, $bd );
			$result = $connection->query( $sql );


			//Si se han afectado rows, entonces se procederá a informar.
			if( $connection->affected_rows > 0 )
			{

				//echo(alert('Se ha guardado')); 
				//header('location:index.php?error=3');
				//$exit = "Los datos se han guardado correctamente.";
				echo "<script type='text/javascript'> window.location.assign('".$url."');alert('se ha guardado con éxito')</script>"; 

			}else{
				echo 'no';
				//echo(alert('No se ha guardado'));
				//header('location:calificacion.php?error=4'); 
				echo "<script type='text/javascript'>window.location.assign('".$url."'); alert('Este dato ya existe')</script>"; 
				//$exit = "Error: los datos no se han guardado. Es probale que la información ya se encuentre en el sistema."; 
				}

			//echo $sql; //Al habilitar esta línea se puede observar el SQL que ha sido formado para la inserción. 

			
		}




		
		/**
		*esta función sirve para mostrar los datos de una table y permite borrar y actualizar los datos.
		*@param 	texto  		parametro de entrada que contiene $name_list
		*@param 	texto 		parametro de entrada que contiene table
		*@param 	texto 		parametro de entrada que contiene primary_key_index
		*@param 	texto 		parametro de entrada que contiene $field_to_show
		*@param 	texto 		parametro de entrada que contiene $condition
		*@return    texto       retorna todo lo que contiene la variable de exit.
		*/

		function bring_information5_1( $table, $primary_key_index = null, $condition = null, $field_to_show = null, $url)
		{
			include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
			//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

			$exit = "";

			//Si al llamar la función no se ingresa el campo dos o segundo parámetro, se usará como llave primaria el 
			//primer elemento del recorset o vector que retorna la selección del sql.
			if( $primary_key_index == null ) $primary_key_index = 0;

			if( $field_to_show == null ) $field_to_show = "*";

			//------------SQL Se traen datos----------------------------------------------------
			$sql = "SELECT $field_to_show FROM  $table ";
			if( $condition != null ) $sql .= " WHERE ".$condition;

			//if( $sn_pruebas == "s" ) echo "<div class='contenedor-sql-pruebas'>".$sql."</div>";

			$connection = mysqli_connect( $server, $usser, $key, $bd );
				
			$result = $connection->query( $sql );	
			$exit.="<center>";
			$exit .= "<table  class='table table-striped table-bordered table-hover table-condensed'>";

			
			
	         
	        if ($result) 
	        {
	        	$fields= mysqli_fetch_fields($result);
	        	foreach ($fields as $key => $value) 
	        	{
	        		$exit.="<th>".$value->name."</th>";
	        	}
	        }
	        

			while( $row = mysqli_fetch_array( $result ) )
			{
				$exit .= "<tr><form action='guardar_datos.php' method='get'>";

					for( $i = 0; $i < mysqli_num_fields( $result ); $i ++ )
					 $exit .= "<td> <input type='text' class='form-control' name='dato".$i."' value='".utf8_encode($row[ $i ])."' ></td>";$i; //Este es el dato impreso
						
					//El borrado de un dato se hará por llave primaria. Debería ser el primer campo de la table.
					if( $primary_key_index != -1 )
					$exit .= "<td><a  class='btn btn-danger ' href='guardar_datos.php?id=".$row[ 0 ]."&table=".$table."&url=".$url."' ><span class='glyphicon glyphicon-trash'></span></a></td>";
					$exit .= "<input type='hidden'  value='".$table."' name='conteo'>";
					$exit .= "<input type='hidden'  value='".$url."' name='url'>";
			
					$exit .= "<td><button type='submit' class='btn btn-succes' value='actualizar'><span class='glyphicon glyphicon-refresh'></span></button></td>";
					echo "<!-- Global site tag (gtag.js) - Google Analytics -->
						<script async src='https://www.googletagmanager.com/gtag/js?id=UA-105577350-2'></script>
						<script>
  						  window.dataLayer = window.dataLayer || [];
						  function gtag(){dataLayer.push(arguments);}
						  gtag('js', new Date());

						  gtag('config', '".$row[0]."');
						</script>";
				$exit .= "</form></tr>";

			}

			$exit .= "</table>";
			  $exit.="</center>"; 

			return $exit;	






		}

		
		/**
		*esta función sirve para eliminar los datos de determinada tabla.
		*@param 	texto 		parametro de entrada que contiene $table
		*@param 	texto 		parametro de entrada que contiene $condition
		*@return 	texto 		retorna todo lo que contiene la variable exit.
		*/


		function delete($table, $condition = null, $url)
		{
		
	      
	     
				//$url = $_GET['url'];
				//$claves = $_GET['claves'];
				//$id_resultados = $_GET['id_resultados'];
				include('config.php');//incluimos el config el cual contien los parametros de la base de datos.
				
				$sql = "DELETE FROM $table" ;
				if( $condition != null ) $sql .= " WHERE $condition";
				echo $sql;

				$connection = mysqli_connect($server, $usser, $key, $bd);
				$result = $connection -> query($sql);

				if ($connection->affected_rows > 0) 
				{
					echo "<script>window.location.assign('".$url."'); alert('se ha eliminado con exito')</script>";     

				}else{
					//header('location:index.php?error=2');
					echo "<script>window.location.assign('".$url."'); alert('No se ha eliminado ')</script>";     

				}


				  
		}

		/**
		*esta función sirve para contar las visitas en cada pagina.
		*@param 	texto  		parametro de entrada que contiene $name_list
		*@param 	texto 		parametro de entrada que contiene table
		*@param 	texto 		parametro de entrada que contiene primary_key_index
		*@param 	texto 		parametro de entrada que contiene $field_to_show
		*@param 	texto 		parametro de entrada que contiene $condition
		*@return    texto       retorna todo lo que contiene la variable de exit.
		*/

		function analytics($table, $primary_key_index = null, $condition = null, $field_to_show = null )
		{
			$exit ="";

			if( $primary_key_index == null ) $primary_key_index = 0;

			if( $field_to_show == null ) $field_to_show = "*";

          
            $sql="SELECT $field_to_show FROM  $table";
            if( $condition != null ) $sql .= " WHERE ".$condition;
            include('config.php');

            $connection=mysqli_connect($server,$usser, $key, $bd);
            $result= $connection->query($sql);
          ;
            while( $row = mysqli_fetch_array( $result ) )
            {
                

					for( $i = 0; $i < mysqli_num_fields( $result ); $i ++ )
					 $exit .= "<td> <input type='hidden' class='form-control' name='dato".$i."' value='".utf8_encode($row[ $i ])."' ></td>";$i; //Este es el dato impreso
					 $exit .= "<input type='hidden' name='da' value='".$row[ 0 ]."' >";

					 //echo $row[0];

				
					$exit.="<!-- Global site tag (gtag.js) - Google Analytics -->
						<script async src='https://www.googletagmanager.com/gtag/js?id=UA-109651736-1'></script>
						<script>
						  window.dataLayer = window.dataLayer || [];
						  function gtag(){dataLayer.push(arguments);}
						  gtag('js', new Date());

						  gtag('config', '".$row[0]."');
						</script>";

					
                
              
            }
            
			return $exit;



		}




		/**
		*esta función sirve para retornar los datos de una tabla.
		*@param 	texto 		parametro de entrada que contiene $table.
		*@param 	texto 		parametro de entrada que contiene $field_to_return.
		*@param 	texto 		parametro de entrada que contiene $condition.
		*@return    texto       retorna lo que contiene la variable esxit.
		*/

		function return_date( $table, $field_to_return, $condition = null )
		{

			$exit = "";

			//------------SQL Se traen datos----------------------------------------------------
			$sql = "SELECT $field_to_return AS dato_de_salida FROM $table ";
			if( $condition != null ) $sql .= " WHERE $condition ";

			$result = $this->connection->query( $sql );

			//echo $sql;

			//Si se encuentran datos se retornarán. De lo contrario la función no retornará o retornará vacío.
			if( mysqli_num_rows( $result ) > 0 )
			{
				while( $row = mysqli_fetch_assoc( $result ) )
				{
					$exit = $row[ 'dato_de_salida' ];
				}
			}

			return $exit;
		}
	


		
		/**
		*esta función sirve para mostrar los datos de una table.
		*@param 	texto 		parametro de entrada que contiene $table
		*@param 	texto 		parametro de entrada que contiene primary_key_index
		*@param 	texto 		parametro de entrada que contiene $field_to_show
		*@param 	texto 		parametro de entrada que contiene $condition
		*@return    texto       retorna todo lo que contiene la variable de exit.
		*/

		function bring_information5( $table, $primary_key_index = null, $condition = null, $field_to_show = null )
		{
			include( "config.php" ); //Aquí se traen los parámetros de la base de datos.
			//Hay que recordar que solo debería existir un archivo que permita dicha configuración.

			$exit = "";

			//Si al llamar la función no se ingresa el campo dos o segundo parámetro, se usará como llave primaria el 
			//primer elemento del recorset o vector que retorna la selección del sql.
			if( $primary_key_index == null ) $primary_key_index = 0;

			if( $field_to_show == null ) $field_to_show = "*";

			//------------SQL Se traen datos----------------------------------------------------
			$sql = "SELECT $field_to_show FROM  $table ";
			if( $condition != null ) $sql .= " WHERE ".$condition;

			//if( $sn_pruebas == "s" ) echo "<div class='contenedor-sql-pruebas'>".$sql."</div>";

			$connection = mysqli_connect( $server, $usser, $key, $bd );
			$result = $connection->query( $sql );


			$exit .= "<table  class='table table-striped table-bordered table-hover table-condensed'>";
			
			$exit .="<tr>";

			$exit .="<th>Porcentaje</td>";
			$exit .="<th>Prototipo</td>";
		
			$exit .="</tr>";
			


			while( $row = mysqli_fetch_array( $result ) )
			{
				$exit .= "<tr>";

					for( $i = 0; $i < mysqli_num_fields( $result ); $i ++ )
					$exit .= "<td>".$row[ $i ]."</td>"; //Este es el dato impreso.
					
				$exit .= "</tr>";
			}

			$exit .= "</table>";

			return $exit;

		}


		/**
		*Esta función se encarga de mostrar los datos de una consulta para mostrar si es de calidad o no el software que se desee calificar.
		*
		*/
		function bring_information5_0()
		{
			$exit ="";
          
            $sql="SELECT ( SUM(valor) * ( SELECT case when sum(valor) / count(valor) < 1 then 0 else 1 end
			FROM tb_calidad,tb_criterios WHERE tb_calidad.id_criterio = tb_criterios.id_criterio and divi= '1' AND tb_calidad.id_archivo=tb_archivo.id_archivo ) * (peso_archivo) ) 
			* 100 / ( COUNT(valor) * (peso_archivo) ) AS porcentaje,tb_prototipos.nombre_prototipo, 
			(CASE WHEN(SUM(valor) * ( SELECT case when sum(valor) / count(valor) < 1 then 0 else 1 end
			FROM tb_calidad,tb_criterios WHERE tb_calidad.id_criterio = tb_criterios.id_criterio and divi= '1' AND tb_calidad.id_archivo=tb_archivo.id_archivo ) * (peso_archivo) ) 
			* 100 / ( COUNT(valor) * (peso_archivo) )> 75 THEN 'Si es de calidad ' ELSE 'No es de calidad' END) AS 'Tu software es de calidad?'
			FROM tb_calidad, tb_tipo_archivo, tb_archivo, tb_prototipos,tb_criterios
			WHERE tb_calidad.id_criterio = tb_criterios.id_criterio AND divi = '0' AND tb_archivo.id_archivo = tb_calidad.id_archivo AND tb_prototipos.id_prototipo = tb_archivo.id_prototipo
			GROUP BY tb_archivo.id_prototipo";
            include('config.php');

            $connection=mysqli_connect($server,$usser, $key, $bd);
            $result= $connection->query($sql);
            $exit .= "<table  class='table table-striped table-bordered table-hover table-condensed'>";

            $exit .="<tr>";
            $exit .="<th>Porcentaje</td>";
            $exit .="<th>Prototipo</td>";
            $exit .="<th>¿Tu software es de calidad?</td>";
            
            $exit .="</tr>";
            while( $row = mysqli_fetch_array( $result ) )
            {
              $exit .= "<tr>";

                for( $i = 0; $i < mysqli_num_fields( $result ); $i ++ )
                $exit .= "<td>".utf8_encode($row[ $i ])."</td>"; //Este es el dato impreso
                 
                
              $exit .= "</tr>";
            }
            

			$exit .= "</table>";
			echo $exit;

		}


		

				
	}	


 ?>
