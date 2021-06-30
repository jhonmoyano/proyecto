<?php
    include_once 'conexion.php';
    if(isset($_POST['guardar'])){
        $Codigo_Llamado_Atencion=$_POST['Codigo_Llamado_Atencion'];
        $Descripcion=$_POST['Descripcion'];
        $Fecha=$_POST['Fecha'];
        $Usuario=$_POST['Usuario_Afectado'];
       
        if(!empty($Codigo_Llamado_Atencion) && !empty($Descripcion) && !empty($Fecha) && !empty($Usuario)){

            
                if(!filter_var($Codigo_Llamado_Atencion,FILTER_VALIDATE_INT)){
                    echo "<script> alert('Correo No Válido');</script>";
                }else{
        
            echo "<script> alert('Entrando');</script>";
                    $consulta_insert=$con->prepare('INSERT INTO llamados_atencion(Cod_llamados_Atencion,Descripcion,Fecha,Usuario_Afectado)
                    VALUES(:Cod_llamados_Atencion,:Descripcion,:Fecha,:Usuario_Afectado)');
                    $consulta_insert->execute(array(
                        ':Cod_llamados_Atencion' =>(int)$Codigo_Llamado_Atencion,
                        ':Descripcion' =>$Descripcion,
                        ':Fecha' =>$Fecha,
                        ':Usuario_Afectado' =>$Usuario
                        
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
        <link rel="icon" href="imagenes/logo.png">
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
        <h1 align="center"  style="color:#00F6FE;">Llenar Llamado De Atencion Estudiantes</h1></br>
    
    <form action="" method="POST" autocomplete="off">
        <div class="form-group">
            <input type="text" name="Codigo_Llamado_Atencion" placeholder="Codigo Llamado Atencion"  class="input__text">
            <input type="text" name="Descripcion" placeholder="Descripcion" class="input__text">
        </div>
        <div class="form-group">
            <input type="date" name="Fecha" placeholder="Fecha" class="input__text">
            <input type="text" name="Usuario_Afectado" placeholder="Usuario afectado" class="input__text">
        </div>
        
        <div class="btn__group">
            <a href="profesores.php" class="btn btn__danger">Cancelar</a>
            <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
        </div>
        
</div>
</section>
</body>
</html>