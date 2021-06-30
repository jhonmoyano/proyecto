
<?php 
include ("conexion.php");
$Id =$_GET['id'];
$usuarios = " SELECT personas.Cod_Identificacion, tipo_rol.Nombre_Cargo,
tipo_identificacion.Descripcion, personas.Nombre, personas.Apellido, personas.Direccion,personas.Telefono,
personas.Grupo_sanguineo,personas.sexo, Usuarios.Cod_usuarios 
FROM
tipo_rol inner join personas inner join tipo_identificacion inner join usuarios on personas.Cod_Identificacion=usuarios.Cod_Identificacion_Persona and
tipo_rol.Cod_tipo_rol=personas.Cod_tipo_rol and tipo_identificacion.Cod_Tipo_Identificacion=personas.Cod_Tipo_Identificacion 
 where Cod_Identificacion ='$Id'";






?>


<!DOCTYPE html> 

<html lang="es">
    <head>
        <title>editar usuario </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <!--muestra el ancho de la pagina sea igual al ancho del dipositivo y que la escala que se muestre sea el 100%
             y que no achique ni a grande las cosas-->
             <meta http-equiv="x-ua-compatible" content="ie-edge">
             <link rel="stylesheet" href="css/update.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" href="css/P-Admon.css">
		<link rel="icon" href="imagenes/logo.png">
    
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
					<li class="Inicio"><a href="P-Admon-Llamado-Atencion-Generar.php">Inicio</a></li>
          <li class="Inicio"><a href="iniciarSesion.php">Cerrar Sesion</a></li>
          
				</ul>

			</nav>
		</div>
    </header>

<section class="section">

<div class="contenedor">
        <h1 align="center"  style="color:#00F6FE;">editar usuario</h1>
    
    <form action="procesar_actualizar.php " method="POST" >
        
        <div class="form-group">


        <?php $resultado =mysqli_query($conexion,$usuarios);
            while  ($row=mysqli_fetch_assoc($resultado)){?>

                
                <input type='text' value ="<?php echo $row['Cod_Identificacion']; ?> "name="Cod_Identificacion" class="input__text"> 
                <input type='text' value ="<?php echo $row['Nombre_Cargo']; ?>" name="Nombre_Cargo" class="input__text">
               

        </div>


        <div class="form-group">

                
        
        <input type='text' value ="<?php echo $row['Descripcion']; ?>"name="Descripcion" class="input__text"> 
        <input type='text' value ="<?php echo $row['Nombre']; ?>"name="Nombre" class="input__text"> 
              
        </div>

        <div class="form-group">
         <input type='text' value ="<?php echo $row['Apellido']; ?> "name="Apellido" class="input__text"> 
         <input type='text' value ="<?php echo $row['Direccion']; ?> "name="Direccion" class="input__text"> 
          
        </div>

        <div class="form-group">
        <input type='text' value ="<?php echo $row['Telefono']; ?>" name="Telefono" class="input__text">
        <input type='text' value ="<?php echo $row['Grupo_sanguineo']; ?>"  name="Grupo_sanguineo" class="input__text"> 
        <input type='text' value ="<?php echo $row['sexo']; ?>" name="sexo" class="input__text">
           
        </div>


        
        
        <div class="btn__group">
            <a href="P-Admon-Llamado-Atencion-Generar.php" class="btn btn__danger">Cancelar</a>
            <input type="submit" name="guardar" value="Actualizar" class="btn btn__primary">
        </div>
        
</div>
<?php }mysqli_free_result($resultado); ?>
</section>
</body>
</html>