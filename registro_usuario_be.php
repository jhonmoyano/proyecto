
<?php
   
   include_once 'conexion.php';
 
   $Cod_Identificacion = $_POST['Cod_Identificacion'];
   $Cod_tipo_rol = $_POST['tipo_rol'];
   $Nombres = $_POST['Nombres'];
   $Apellidos = $_POST['Apellidos'];
   $direccion = $_POST['direccion'];
   $Telefono = $_POST['Telefono'];
   $Grupo = $_POST['Grupo'];
   $sexo = $_POST['sexo'];
   $Horarios = $_POST['horarios'];
   $jornada = $_POST['Jornada'];
   $Tipo_identificacion = $_POST['tipo_identificacion'];
  
$querys ="INSERT INTO personas (Cod_Identificacion,Cod_tipo_rol,Nombre,Apellido,Direccion,Telefono,Grupo_sanguineo,sexo,Cod_Horario,Cod_Jornada,Cod_Tipo_Identificacion) 
VALUES ('$Cod_Identificacion','$Cod_tipo_rol','$Nombres',' $Apellidos','$direccion','$Telefono','$Grupo','$sexo','$Horarios','$jornada','$Tipo_identificacion')";
 

$verificarCodUsuario =mysqli_query($conexion, "SELECT * FROM personas WHERE Cod_Identificacion='$Cod_Identificacion' " );

if(mysqli_num_rows($verificarCodUsuario) > 0){
    echo'
    
    <script>
    alert("usuario ya registrado  ");
    window.location="iniciarSesion.php";
    </script>
    ';

    exit ();
}    

$ejecutars =mysqli_query($conexion,$querys);
  
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>iniciar Sesion</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <!--muestra el ancho de la pagina sea igual al ancho del dipositivo y que la escala que se muestre sea el 100%
             y que no achique ni a grande las cosas-->
             <meta http-equiv="x-ua-compatible" content="ie-edge">
             <link rel="stylesheet" href="css/datospersona.css">   
                 
     
        <link rel="icon" href="imagenes/logo.png">
       




</head>
<body class="body">
<!--menu de navegacion-->
    <header class="header">

		<div class="container1 logo-nav-container">

			<a href="index.php" class="Inicio">
				<img src="imagenes/logo.png" alt="DEIRI logo" width="100" height="50" a>
			</a>

			<nav class="navegation">

				<ul>

					<li class="Inicio"><a href="inicio.php">volver</a></li>
					
				</ul>

			</nav>
		</div>
    </header>

    <!--muestra la caja trasera-->
    <main class="main">
        <div class="contenedorUsuario">

            <div class="cajaTrasera">
            
                 
            </div>
<!-- formulario de usuario y registrarse--> 
<!--usuario-->

                <div class="formulario_registrarse_usuario">
                    
                <form  action="registrarsePersona.php" method="POST"  class="formulario_registro" id="formulario" > <!--sirve para cuando quiera envia los datos retorna la variable con sus condiciones -->
                        <h2>registrate</h2>

                        
                            <input type="text" placeholder="Email" id="Email"   name="Email" >
                            <input type="password" placeholder="contraseña"    id="Contraseña" name="Contraseña">
                                
                            <input class="botones" type="submit" name="guardar" value="registrarse" >

                    </form>
                </div>

        </div>

    
    </main>
   



</body>



</html>