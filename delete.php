<?php

include ("conexion.php");
$Id =$_GET['Id'];


$Eliminar = " DELETE FROM personas where Cod_Identificacion ='$Id'";
$resultadoEliminar = mysqli_query($conexion,$Eliminar);


if($resultadoEliminar){

echo"<script>alert('se han guardado los cambios correctamente');
 window.location='P-Admon-Llamado-Atencion-Generar.php'</script>";

}else {

    echo"<script>alert('no se pudo actualizar ');
 window.location='P-Admon-Llamado-Atencion-Generar.php'</script>";
}

