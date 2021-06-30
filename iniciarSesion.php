
<!DOCTYPE html>
<html lang="es">
<head>
    <title>iniciar Sesion</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <!--muestra el ancho de la pagina sea igual al ancho del dipositivo y que la escala que se muestre sea el 100%
             y que no achique ni a grande las cosas-->
             <meta http-equiv="x-ua-compatible" content="ie-edge">
             <link rel="stylesheet" href="css/iniciarSesion.css">           
        <link rel="stylesheet" type="text/css" href="css/styles.css">
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

					<li class="Inicio"><a href="inicio.php">Inicio</a></li>
					<li class="Inicio"><a href="index.php">Sobre nosotros </a></li>

					<li class="Inicio"><a href="Nueva carpeta (2)/inicio.html">Proyecto San Cayetano  </a></li>

					

					<li class="Inicio"><a href="iniciarSesion.php">Iniciar Sesiòn</a></li>



					<li class="buscar"><input type="search" class="buscar_texto" placeholder="search">
						<a href="" class="botton"><i class="icon-buscar"></i> </a> </li>

				</ul>

			</nav>
		</div>
    </header>

    <!--muestra la caja trasera de usuario y registro-->
    <main class="main">
        <div class="contenedorUsuario">

            <div class="cajaTrasera">

                <div class="caja_Usuario">
                    <h3>¿YA TIENES UNA CUENTA?</h3>
                    <P>Inicia sesion para ingresar</P>
                    <button id="iniciarSesion">Iniciar Sesion</button>
                </div>

                <div class="caja_registro">
                    <h3>¿NO TIENES UNA CUENTA?</h3>
                    <P>registrate para iniciar sesion</P>
                    <button id="registrarse">Registrarse</button>
                </div>

            </div>
<!-- formulario de usuario y registrarse--> 
<!--login-->
                <div class="formulario_registrarse_usuario">
                    
                    <form action="autenticar.php" class="formulario_usuario" method="post" >
                        <h2>Iniciar sesion</h2>
        
                       
                        <input type="text" placeholder="Email" id="emailUsuario"   name="emailLogin" >
                        <input type="password" placeholder="contraseña"    id="contraseña" name="contraseñaLogin">
                         
                        <button>Entrar</button>
                    

                    </form

    
 <!--registro-->           <!--registro de los input-->       
 <form  action="registro_usuario_be.php" method="POST"  class="formulario_registro" id="formulario" onsubmit="return validar()"> <!--sirve para cuando quiera envia los datos retorna la variable con sus condiciones -->
        <h2>llenar datos de identificacion</h2>


                <select class="usuario" name="tipo_identificacion">
                            
                            <?php
                           include_once 'conexion.php';
                           $sentencia_select =$con->prepare('select * from tipo_identificacion');
                           $sentencia_select->execute();
                           $resultado = $sentencia_select->fetchALL();
                           ?>
           
                           <?php foreach ($resultado as $OPCIONES):?> 
           
                           <option VALUE="<?php   echo $OPCIONES['Cod_Tipo_Identificacion'];?>">   <?php echo  $OPCIONES['Descripcion']; ?></option>
           
                           <?php endforeach ?>
           
                           </select> 





            <input type="text" placeholder="N. De Documento" id="Cod_Identificacion" name="Cod_Identificacion"  >    

            <select class="usuario" name="tipo_rol"  >
                            
             <?php
                include_once 'conexion.php';
                $sentencia_select =$con->prepare('select * from tipo_rol');
                $sentencia_select->execute();
                $resultado = $sentencia_select->fetchALL();
                ?>

                <?php foreach ($resultado as $OPCIONES):?> 

                <option VALUE="<?php   echo $OPCIONES['Cod_tipo_rol'];?>">   <?php echo  $OPCIONES['Nombre_Cargo']; ?></option>

                <?php endforeach ?>

                </select>

                           
                <select class="usuario" name="Jornada">
                            
                <?php
                include_once 'conexion.php';
                $sentencia_select =$con->prepare('select * from Jornada');
                $sentencia_select->execute();
                $resultado = $sentencia_select->fetchALL();
                ?>

                <?php foreach ($resultado as $OPCIONES):?> 

                <option VALUE="<?php   echo $OPCIONES['Cod_Jornada'];?>">   <?php echo  $OPCIONES['Descripcion']; ?></option>

                <?php endforeach ?>

                </select>
                          
                      
                            
                <select class="usuario" name="horarios">

                <?php
                include_once 'conexion.php';
                $sentencia_select =$con->prepare('select * from horarios');
                $sentencia_select->execute();
                $resultado = $sentencia_select->fetchALL();
                ?>

                <?php foreach ($resultado as $OPCIONES):?> 

                <option VALUE="<?php   echo $OPCIONES['Cod_Horario'];?>">   <?php echo  $OPCIONES['Descripcion']; ?></option>
                            
                <?php endforeach ?>

                </select>       
                            
                            
                <input type="text" placeholder="Nombres" id="Nombres"    name="Nombres" >
                <input type="text" placeholder="apellidos" id="apellidos"  name="Apellidos" >
                <input type="text" placeholder="direccion" id="direccion"  name="direccion" >
                <input type="text" placeholder="Telefono" id="Telefono"  name="Telefono"  >           
                <input type="text" placeholder="grupo sanguineo" id="Grupo"   name="Grupo" >
                <input type="text" placeholder="sexo" id="sexo"   name="sexo" >
                <input class="botones" type="submit" name="guardar" value="Registrate">

                    </form>
                   
                   
                </div>

        </div>

    
    </main>
    <script src="java/java.js"></script>



</body>



</html>