<?php
    include_once 'conexion.php';
    if(isset($_POST['guardar'])){
        $CodRetardos=$_POST['CodRetardos'];
        $Descripcion_retardos=$_POST['Descripcion_retardos'];
        $Fecha_retardos=$_POST['Fecha_retardos'];
        $Usuario_retardos=$_POST['Usuario_retardos'];
       
        if(!empty($CodRetardos) && !empty($Descripcion_retardos) && !empty($Fecha_retardos) && !empty($Usuario_retardos)){

            
                if(!filter_var($CodRetardos,FILTER_VALIDATE_INT)){
                    echo "<script> alert('Correo No Válido');</script>";
                }else{
        
            echo "<script> alert('Entrando');</script>";
            $consultainsert=$con->prepare('INSERT INTO retardos(Cod_Retardos,Descripcion,Fecha,Usuario_Afectado)
            VALUES(:Cod_Retardos,:Descripcion,:Fecha,:Usuario_Afectado)');
            $consultainsert->execute(array(
                ':Cod_Retardos' =>(int)$CodRetardos,
                ':Descripcion' =>$Descripcion_retardos,
                ':Fecha' =>$Fecha_retardos,
                ':Usuario_Afectado' =>$Usuario_retardos
                        
                    ));
                    header('Location: P-Admon-Llamado-Atencion-Generar.php');
    }
        }else{
            echo "<script> alert('Campos Vacios');</script>";
        }
    
    }
?>







<!DOCTYPE html> 

<html lang="es">
    <head>
        <title>P-Admon-Llamado-Atencion-Generar</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <!--muestra el ancho de la pagina sea igual al ancho del dipositivo y que la escala que se muestre sea el 100%
             y que no achique ni a grande las cosas-->
             <meta http-equiv="x-ua-compatible" content="ie-edge">
        
        <link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" href="css/P-Admon.css">
		<link rel="icon" href="imagenes/logo.png">
        <link rel="stylesheet" type="text/css" href="css/estilo2.css">
    </head>

    
    
<body class="body">
    
    <header class="header">

		<div class="container1 logo-nav-container">

			<a href="P-Admon-Llamado-Atencion-Llenar.php" class="Inicio">
				<img src="imagenes/logo.png" alt="DEIRI logo" width="100" height="50" a>
			</a>

			<nav class="navegation">

				<ul>
					<li class="Inicio"><a href="P-Admon-Llamado-Atencion-Llenar.php">Inicio</a></li>
          <li class="Inicio"><a href="iniciarSesion.php">Cerrar Sesion</a></li>
          
				</ul>

			</nav>
		</div>
    </header>
<section class="section">

	<div class="contenedor">
        <h1 align="center"  style="color:#00F6FE;">Llenar Retardos</h1></br>
    
    <form action="" method="POST" autocomplete="off">
        <div class="form-group">
            <input type="text" name="CodRetardos" placeholder="codigo de los retardos "  class="input__text">
            <input type="text" name="Descripcion_retardos" placeholder="Descripcion" class="input__text">
        </div>
        <div class="form-group">
            <input type="date" name="Fecha_retardos" placeholder="Fecha" class="input__text">
            <input type="text" name="Usuario_retardos" placeholder="Usuario afectado" class="input__text">
        </div>
        
        <div class="btn__group">
            <a href="profesores.php" class="btn btn__danger">Cancelar</a>
            <input type="submit"   name="guardar" value="Guardar" class="btn btn__primary">
        </div>
        
</div>
</section>
</body>
</html>