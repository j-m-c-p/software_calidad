<!-- 
*  
* Autor: Jhonnatan Cubides
*Este archivo se encarga de recibir los parametros para eliminar, actualizar y eliminar los datos de las tablas.
* 
-->
<?php


    include( "class/BD.php" );                  
    

 
    $obj_o= new BD;

    include 'config.php';
    if (isset($_GET['table']) && isset($_GET['id']) && isset($_GET['url'])) 
    {
    
    
    $table=$_GET['table'];
    $id=$_GET['id'];
    $url=$_GET['url'];

    $key_primary_table =$obj_o-> return_date( "INFORMATION_SCHEMA.COLUMNS", "COLUMN_NAME", " TABLE_SCHEMA = '$bd' AND TABLE_NAME = '$table' AND COLUMN_KEY = 'PRI' " );
    $obj_o->delete( $table, " $key_primary_table = '$id' ", $url );
   
    }



    
 

  
    if( isset( $_GET[ 'table' ] ) && isset( $_GET[ 'total-campos' ] ) && isset( $_GET[ 'campos' ] ) && isset( $_GET[ 'url' ] ) )
    {
        $table              = $_GET[ 'table' ];
        $total_campos       = $_GET[ 'total-campos' ];
        $campos             = $_GET[ 'campos' ];
        $url                = $_GET['url'];
        $valores            = "";
        $caracter_separador = ", ";
        
        //echo $campos."<br>"; //Esta línea es para ver si están llegando los datos.
        
        //En este ciclo se preparan los diferentes elementos para el insert. Hay que recordar que los valores de los campos
        //deben venir en secuencia desde los formularios para que esto funcione. En sí, el formulario aportaría toda la información
        //necesaria para que este código funcione, sin hacerle cambios.
        for( $i = 1; $i <= $total_campos; $i ++ )
        {
            if( $i >= $total_campos ) $caracter_separador = ""; //Quitamos la coma porque el último dato no debe llevarla.
            //echo $_GET[ 'dato'.$i ]."<br>"; //Esta línea se puede habilitar si se requieren ver los datos que están llegando.
            $valores .= "'".utf8_decode($_GET[ 'dato'.$i ])."'".$caracter_separador;
        }
    
        //Aquí se ejecuta la inserción de la información. Este código está en el archivo BD.php
        echo $obj_o->save_information( $table, $campos, $valores, $url );
        echo $url;
       
        
    }else{
        echo "Error: no se puede guardar la informaci&oacute;n porque faltan datos por suministrar o programar en los formularios.";   
    }


    if (isset($_GET['conteo'])) {
        $conteo=$_GET['conteo'];
        $url=$_GET['url'];

        if ($conteo=='tb_archivo') {
         $id = $_GET['dato0'];
        
        $nom_archivo = utf8_decode($_GET['dato1']);
        $id_prototipo = $_GET['dato2'];
        $id_tipo_archivo = $_GET['dato3'];
        $sql = "UPDATE tb_archivo SET ";
        $sql .= "nom_archivo= '$nom_archivo', id_prototipo= '$id_prototipo', id_tipo_archivo= '$id_tipo_archivo'";
        $sql .= "WHERE id_archivo = '$id'";
        }
        if ($conteo=='tb_calidad') {
         $id = $_GET['dato0'];
        
        $id_archivo = $_GET['dato1'];
        $id_criterio = $_GET['dato2'];
        $valor = $_GET['dato3'];

        $sql = "UPDATE tb_calidad SET ";
        $sql .= "id_archivo= '$id_archivo', id_criterio= '$id_criterio', valor= '$valor'";
        $sql .= "WHERE id_calidad = '$id'";

        }
        if ($conteo=='tb_prototipos') {
         $id = $_GET['dato0'];
         
        $nombre_prototipo = utf8_decode($_GET['dato1']);
        $sql = "UPDATE tb_prototipos SET ";
        $sql .= "nombre_prototipo= '$nombre_prototipo'";
        $sql .= "WHERE id_prototipo = '$id'";

        }
        if ($conteo=='tb_tipo_archivo') {
         $id = $_GET['dato0'];
         
        $tipo_archivo = utf8_decode($_GET['dato1']);
        $peso_archivo = $_GET['dato2'];
        $sql = "UPDATE tb_tipo_archivo SET ";
        $sql .= "tipo_archivo= '$tipo_archivo', peso_archivo= '$peso_archivo'";
        $sql .= "WHERE id_tipo_archivo = '$id'";

        }

        if ($conteo=='tb_criterios') {
         $id = $_GET['dato0'];
         
        $criterio = utf8_decode($_GET['dato1']);
        $divi = $_GET['dato2'];
        $sql = "UPDATE tb_criterios SET ";
        $sql .= "criterio= '$criterio', divi= '$divi'";
        $sql .= "WHERE id_criterio = '$id'";

        }

        if ($conteo=='tb_analytics') {
         $id = $_GET['dato0'];
        
        $nombre = utf8_decode($_GET['dato1']);
      
        $sql = "UPDATE $conteo SET ";
        $sql .= "nombre= '$nombre'";
        $sql .= "WHERE id_analytics = '$id'";

        }

    }

     

    $connection = mysqli_connect($server, $usser, $key, $bd);
    $result = $connection -> query($sql);

    if ($connection->affected_rows>0) 
    {
          
        echo '<script type="text/javascript">
       window.location.assign("'.$url.'");alert("Actualización exitosa");
        </script>';
      
    }else{
        
       
        echo '<script type="text/javascript">
       window.location.assign("'.$url.'");alert("No se ha actualizado ningun dato");
        </script>';
    } 
     
?>

