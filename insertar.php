<?php
    include_once 'conexion.php';
    if(isset($_POST['guardar'])){
        $identificacion=$_POST['Cod_Identificacion'];
        $nombre=$_POST['Cod_tipo_usuario'];
        $apellido=$_POST['Apellido'];
        $direccion=$_POST['Direccion'];
        $ciudad=$_POST['Ciudad'];
        $correo=$_POST['Correo'];
        if(!empty($identificacion) && !empty($nombre) && !empty($apellido) && !empty($telefono) && !empty($ciudad) && !empty($correo)){
            if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
                echo "<script> alert('Correo No Válido');</script>";
            }else{
                    echo "<script> alert('Entrando');</script>";
                    $consulta_insert=$con->prepare('INSERT INTO persona(Id,Nombre,Apellido,Telefono,Ciudad,Correo)
                    VALUES(:Id,:Nombre,:Apellido,:Telefono,:Ciudad,:Correo)');
                    $consulta_insert->execute(array(
                        ':Id' =>(int)$identificacion,
                        ':Nombre' =>$nombre,
                        ':Apellido' =>$apellido,
                        ':Telefono' =>$telefono,
                        ':Ciudad' =>$ciudad,
                        'Correo' =>$correo
                    ));
                    header('Location: index.php');
        }
        }else{
            echo "<script> alert('Campos Vacios');</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro de Estudiante</title>
    <link rel="stylesheet" type="text/css" href="css/estilo2.css">
</head>
<body>
    <div class="contenedor">
        <h2>llenar llamado de atencion</h2>
        <form action="" method="POST" autocomplete="off">
            
            <div class="form-group">
                <input type="text" name="Cod_Identificacion" placeholder="Cod_Identificacion"  class="input__text">
                <input type="text" name="Cod_tipo_usuario" placeholder="Cod_tipo_usuario" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="Nombre" placeholder="Nombre" class="input__text">
                <input type="text" name="Apellido" placeholder="Apellido" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="Direccion" placeholder="Direccion" class="input__text">
                <input type="text" name="Correo" placeholder="Correo Electrónico" class="input__text">
            </div>
            <div class="btn__group">
                <a href="P-Admon-Llamado-Atencion-Generar.php" class="btn btn__danger">Cancelar</a>
                <input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
            </div>
            
    </div>
    
</body>
</html>