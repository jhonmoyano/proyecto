<?php
	include_once 'Conexion.php';

	$sentencia_select=$con->prepare('SELECT personas.Cod_Identificacion, tipo_rol.Nombre_Cargo,
  tipo_identificacion.Descripcion, personas.Nombre, personas.Apellido, personas.Direccion,personas.Telefono,
  personas.Grupo_sanguineo,personas.sexo, Usuarios.Cod_usuarios 
  FROM
  tipo_rol inner join personas inner join tipo_identificacion inner join usuarios on personas.Cod_Identificacion=usuarios.Cod_Identificacion_Persona and
  tipo_rol.Cod_tipo_rol=personas.Cod_tipo_rol and tipo_identificacion.Cod_Tipo_Identificacion=personas.Cod_Tipo_Identificacion 
  ');


	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchALL();
  
  if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare('SELECT personas.Cod_Identificacion, tipo_rol.Nombre_Cargo,
    tipo_identificacion.Descripcion, personas.Nombre, personas.Apellido, personas.Direccion,personas.Telefono,
    personas.Grupo_sanguineo,personas.sexo, Usuarios.Cod_usuarios FROM
  tipo_rol inner join personas inner join tipo_identificacion inner join usuarios on personas.Cod_Identificacion=usuarios.Cod_Identificacion_Persona and
  tipo_rol.Cod_tipo_rol=personas.Cod_tipo_rol and tipo_identificacion.Cod_Tipo_Identificacion=personas.Cod_Tipo_Identificacion 
   WHERE Nombre LIKE :campo OR Apellido LIKE :campo;');
		$select_buscar->execute(array(':campo' =>"%".$buscar_text."%"));
		$resultado=$select_buscar->fetchAll();
	};

  

?>



  <style>

   body
   {
    margin:0;
    padding-top:100;
    background:linear-gradient(#3d8ef8,transparent,#3d8ef8);
    background-attachment: fixed;
    
    background-repeat: no-repeat;
    background-position: center;
    
    font-family: Georgia, 'Times New Roman', Times, serif;
  max-width:100% ;
    min-height: 100%;
    
   }
   .box
   {
    
    width:-1570px;
    padding:20px;
    background:linear-gradient(#0066ff,transparent,#ffffff);
    border:1px solid rgb(253, 255, 255);
    border-radius:5px;
    margin-top:25px;
    margin-left:25px;
    
   }
   
   
  </style>
 </head>
 
  
  

 
 

  <div class="container box">

 

   <h1 align="center"  style="color:#00F6FE;"> generar llamado de atencion</h1>
   <br />

<!DOCTYPE html>
<html lang="es">
<head>
<title>generar llamado de atencion </title> 
  
  <link rel="stylesheet" href="css/P-Admon-Llamado-Atencion-Generar.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1,maximum-scale=1,minimum-scale=1">
  <!--muestra el ancho de la pagina sea igual al ancho del dipositivo y que la escala que se muestre sea el 100%
     y que no achique ni a grande las cosas-->
     <meta http-equiv="content-type" content="text/html">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <meta http-equiv="x-ua-compatible" content="ie-edge">
     <link rel="icon" href="imagenes/logo.png">
    <link rel="stylesheet" type="text/css" href="css/estilo2.css">
    
</head>

<header class="header" style="color:#00F6FE;" >

    <div class="container1 logo-nav-container">

      <a href="index.html" class="P-Admon">
        <img src="imagenes/logo.png" alt="DEIRI logo" width="100" height="50" a>
      </a>

      <nav class="navegation">

        <ul>

          <li class="P-Admon"><a href="P-Admon.php">asisitencia de entrada</a></li>
          <li class="P-Admon"><a href="asistenciaSalida.php">asisitencia de salida</a></li>
          
          <li class="P-Admon"><a href="iniciarSesion.php">Cerrar Sesion</a></li>
        </ul>

      </nav>
    </div>
    </header>

<body>
    <div class="contenedor">
      
        <div class="barra__buscador">
            <form action="" class="formulario" method="POST">
                <input type="text" name="buscar" placeholder="Buscar Nombre o Apellido" class="input__text">
                <input type="submit" class="btn" name="btn_buscar" value="buscar">
               
                <a href="P-Admon-Llamado-Atencion-Llenar.php" class="btn" name="btn__nuevo">Generar Llamado De Atencion</a>
            </form>
        </div>
        <table>
            <tr class="encabezado">
                <td>usuario</td>
                <td>Identificación</td>
                <td>Tipo de rol</td>
                <td>Tipo de identificacion</td>
                <td>Nombre</td>
                <td>Apellidos</td>
                <td>Direccion</td>
                <td>Telefono</td>
                <td>Grupo sanguineo</td>
                <td>Sexo</td>
              
                <td colspan="2">Acción</td>
            </tr>
            <?php foreach ($resultado as $fila):?>
                <tr>
                    <td><?php echo  $fila ['Cod_usuarios']; ?></td>
                    <td><?php echo $fila['Cod_Identificacion']; ?></td>
                    <td><?php echo $fila['Nombre_Cargo']; ?></td>
                    <td><?php echo $fila['Descripcion']; ?></td>
                    <td><?php echo $fila['Nombre']; ?></td>
                    <td><?php echo $fila['Apellido']; ?></td>
                    <td><?php echo $fila['Direccion']; ?></td>
                    <td><?php echo $fila['Telefono']; ?></td>
                    <td><?php echo $fila['Grupo_sanguineo']; ?></td>
                    <td><?php echo $fila['sexo']; ?></td>
                   
                    
                    
                    <td><a href="actualizar.php?id=<?php echo $fila['Cod_Identificacion']; ?>" class="btn__update">Editar</a></td>
                    <td><a href="delete.php?Id=<?php echo $fila['Cod_Identificacion']; ?>" class="btn__delete">Eliminar</a></td>
                </tr>
                <?php endforeach ?>
                
        </table>
    </div>
    <script src="confirmacion.js"></script>
</body>
</html>


  


   








