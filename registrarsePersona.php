<?php


include_once 'conexion.php';
 
$Email = $_POST['Email'];
$Contraseña = $_POST['Contraseña'];

//encriptamiento de contraseña 
$Contraseña=hash('sha512',$Contraseña);  
$query ="INSERT INTO usuarios (Email,Contraseña) VALUES ('$Email','$Contraseña')";



//verificar que el correo y los datos no se repitan en la base de datos 


$verificaremail=mysqli_query($conexion, "SELECT * FROM usuarios WHERE Email='$Email' " );

if(mysqli_num_rows($verificaremail) > 0){
    echo'
    
    <script>
    alert("usuario ya registrado  ");
    window.location="iniciarSesion.php.";
    </script>
    ';

    exit ();
}

$ejecutar =mysqli_query($conexion,$query);



if($ejecutar){
       echo '
        <script>
            alert ("ususario almacenado  exitosamente");
            window.location="iniciarSesion.php";
        </script>       
       ';
   }else{
    echo '
        <script>
            alert (" intentalo nuevamente usuario no almacenado  ");
            window.location="iniciarSesion.php";
        </script>       
       ';     
   } 
?>
