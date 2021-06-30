<?php
	include_once 'Conexion.php';
	$sentencia_select=$con->prepare('SELECT * FROM control_ingreso ORDER BY Cod_Dia_entrada ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchALL();

	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('SELECT * FROM control_ingreso WHERE Cod_Dia_entrada	 LIKE :campo OR Cod_usuarios	 LIKE :campo;');
		$select_buscar->execute(array(':campo' =>"%".$buscar_text."%"));
		$resultado=$select_buscar->fetchAll();
	};
?>




<!DOCTYPE html> 

<html lang="es">
    <head>
        <title>P-Admon</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0">
        <!--muestra el ancho de la pagina sea igual al ancho del dipositivo y que la escala que se muestre sea el 100%
             y que no achique ni a grande las cosas-->
             <meta http-equiv="x-ua-compatible" content="ie-edge">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
		<link rel="stylesheet" href="css/P-Admon.css">
		<link rel="icon" href="imagenes/logo.png">
		<link rel="stylesheet" type="text/css" href="css/estilo2.css">
    </head>

    
    
<body class="body">
    
    <header class="header">

		<div class="container1 logo-nav-container">

			<a href="index.html" class="Inicio">
				<img src="imagenes/logo.png" alt="DEIRI logo" width="100" height="50" a>
			</a>

			<nav class="navegation">

				<ul>

					<li class="Inicio"><a href="asistenciaestudiante.php">asisitencia de salida</a></li>
					
					
					<li class="Inicio"><a href="iniciarSesion.php">Cerrar Sesion</a></li>
				</ul>

			</nav>
		</div>
	</header>
	
<section class="section">	
<h1 align="center"  style="color:#00F6FE;"> Asistencia Entrada Estudiante </h1>
   <br />
	
		<div class="contenedor">
      
			<div class="barra__buscador">
				<form action="" class="formulario" method="POST">
					<input type="text" name="buscar" placeholder="Buscar por Codigo Dia o Codigo Usuario" class="input__text">
					<input type="submit" class="btn" name="btn_buscar" value="buscar">
					<a href="llamados_estudiantes.php" class="btn" name="btn__nuevo">ver llamados de atencion </a>
					<a href="verretardos_estudiantes.php" class="btn" name="btn__nuevo">ver retardos  </a>
					
				</form>
			</div>
			<table>
				<tr class="encabezado">
					<td>codigo del dia de la entrada </td>
					<td>Codigo del usuario</td>
					<td>fecha</td>
					<td>ingreso hora</td>
					<td>Descripcion</td>
					
					
				</tr>
				<?php foreach ($resultado as $fila):?>
					<tr>
						<td><?php echo $fila['Cod_Dia_entrada']; ?></td>
						<td><?php echo $fila['Cod_usuarios']; ?></td>
						<td><?php echo $fila['Fecha']; ?></td>
						<td><?php echo $fila['Ingreso_hora']; ?></td>
						<td><?php echo $fila['Descripcion']; ?></td>
					
					</tr>
					<?php endforeach ?>
					
			</table>
		</div>
</section>

</body>

</html>