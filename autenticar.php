<?php


include_once 'conexion.php';

$correo =$_POST['emailLogin'];
$contraseña  =$_POST['contraseñaLogin'];


$validar_login =mysqli_query($conexion, "SELECT * FROM usuarios where Email='$correo'
and Contraseña='$contraseña'");


if(mysqli_num_rows($validar_login) > 0){
        
        header("location:P-Admon-Llamado-Atencion-Generar.php");

exit;
}else {

    echo'
    
    <script>
    alert ("Usuario no existe ");
    window.location="iniciarSesion.php";
    </script>
    ';
exit;
}




?>
