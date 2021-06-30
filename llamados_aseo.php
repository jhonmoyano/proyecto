<?php
	include_once 'Conexion.php';

	$sentencia_select=$con->prepare('SELECT * FROM llamados_atencion ORDER BY Cod_llamados_Atencion ASC
   ');

	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchALL();
  
  if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$con->prepare(' SELECT * FROM llamados_atencion ORDER BY Cod_llamados_Atencion 
   WHERE Cod_llamados_Atencion LIKE :campo;');
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
  <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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

          <li class="P-Admon"><a href="p_aseo.php">asisitencia de entrada</a></li>
          <li class="P-Admon"><a href="asistenciaaseo.php">asisitencia de salida</a></li>
          
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
               
               
        </div>
        <table>
            <tr class="encabezado">
                <td> llamados Atencion</td>
                <td>Descripcion	</td>
                <td>Fecha</td>
                <td>usuario </td>
                
              
                
            </tr>
            <?php foreach ($resultado as $fila):?>
                <tr>
                    <td><?php echo  $fila ['Cod_llamados_Atencion']; ?></td>
                    <td><?php echo $fila['Descripcion']; ?></td>
                    <td><?php echo $fila['Fecha']; ?></td>
                    <td><?php echo $fila['Usuario_Afectado']; ?></td>
                   

                </tr>
                <?php endforeach ?>
                
        </table>
    </div>
</body>
</html>


  
