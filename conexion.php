<?php

$conexion=mysqli_connect("localhost", "root", "" ,"deiriii");


$database ="deiriii";
$user='root';
$password='';

try {
	$con=new PDO('mysql:host=localhost;dbname='.$database,$user,$password,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8")
	);

}catch (PDOException $e){
	echo "error" .$e->getmessage();
}

?>