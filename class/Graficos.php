<?php 
	/*
	* 
	* Autores: Jhonnatan Cubides
	*
	*/
	
	/**
	*Esta clase contiene las funciones de la parte del diseño del software.  
	*/
	
	class Graficos

	{
			/**
			*esta función contiene el link de la libreria de bootstrap. 
			*@return 		caracteres 		retorna estilos de bootstrap.
			*/
			function style($carpeta=null)
			{
				$exit="";
				$exit="
    			<link rel='stylesheet'  href='css/bootstrap/css/bootstrap.min.css'>
    			<script src='css/bootstrap/js/jquerymin.js'></script>
    			<script src='css/bootstrap/js/bootstrap.min.js'></script>";
						 
				return $exit;		 
			}
/**
			*esta función contiene el encabezado de la página. 
			*@return 		caracteres 		retorna el encabezado.
			*/
			function header()
			{	
				
				$exit="";
	

				$exit .="<img class='img img-responsive' src='img/Imagen1.png'>
		        <nav class='navbar navbar-default' role='navigation'>
		          <!-- El logotipo y el icono que despliega el menú se agrupan
		               para mostrarlos mejor en los dispositivos móviles -->
		          <div class='navbar-header'>
		            <button type='button' class='navbar-toggle' data-toggle='collapse'
		                    data-target='.navbar-ex1-collapse'>
		              <span class='sr-only'>Desplegar navegación</span>
		              <span class='icon-bar'></span>
		              <span class='icon-bar'></span>
		              <span class='icon-bar'></span>
		            </button>
		           
		          </div>
		         
		          <!-- Agrupar los enlaces de navegación, los formularios y cualquier
		               otro elemento que se pueda ocultar al minimizar la barra -->
		          <div class='collapse navbar-collapse navbar-ex1-collapse'>
		            <center>
		            <ul class='nav navbar-nav  '>
		              
		              
		              <li><a  href='calificacion.php'  >Calificaci&oacute;n</a></li>
		               <li ><a href='calidad.php' style='#00BFFF'>Agregar calificaci&oacute;n</a></li>
		               <li ><a href='form_prototipo.php'>Agregar Prototipo</a></li>
		               <li ><a href='form_archivo.php'>Agregar Archivo</a></li>
		               <li ><a href='form_tipo_archivo.php'>Agregar Tipo Archivo</a></li>
		               <li ><a href='form_criterio.php'>Agregar Criterio</a></li>
		               <li ><a href='form_agregar_id.php'>Agregar Id </a></li>



		  
		            </ul>
		  
		          </div>
		          </center>
		        </nav>
		      </div>";
			
				return $exit;
			}
			

	}
?>
