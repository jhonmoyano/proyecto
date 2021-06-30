

<?php
   
   include 'conexion.php';
   $Id =$_GET['id'];
   $Cod_Identificacion = $_POST['Cod_Identificacion'];
   $Cod_tipo_rol = $_POST['Nombre_Cargo'];
   $Cod_Tipo_Identificacion = $_POST['Descripcion'];
   $Nombre = $_POST['Nombre'];
   $Apellido = $_POST['Apellido'];
   $Direccion = $_POST['Direccion'];
   $Telefono = $_POST['Telefono'];
   $Grupo_sanguineo = $_POST['Grupo_sanguineo'];
   $sexo = $_POST['sexo'];
   
   
  
$ACTUALIZAR ="UPDATE personas SET Cod_Identificacion='$Cod_Identificacion', Cod_tipo_rol='$Cod_tipo_rol', Cod_Tipo_Identificacion='$Cod_Tipo_Identificacion',
Nombre='$Nombre', Apellido='$Apellido', Direccion='$Direccion',Telefono='$Telefono' ,Grupo_sanguineo='$Grupo_sanguineo', Sexo='$sexo' where Cod_Identificacion ='$Id'";


$resul =mysqli_query($conexion,$ACTUALIZAR);

if($resul){

    echo"<script>alert('se han guardado los cambios correctamente');
     window.location='P-Admon-Llamado-Atencion-Generar.php'</script>";
    
    }else {
    
        echo"<script>alert('no se pudo actualizar ');
     window.location='P-Admon-Llamado-Atencion-Generar.php'</script>";
    }
    
?>