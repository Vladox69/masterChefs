<?php
$username="localhost";
$user="root";
$password="";
$nameDataBase="masterChef";

$connect=mysqli_connect($username,$user,$password,$nameDataBase);

if(mysqli_connect_error()){
echo("No se pudo conectar");
}

$nombre_usuario=$_POST["txt_nombre_usuario"] ;
$correo_usuario=$_POST["txt_correo_usuario"] ;
$password_usuario=$_POST["txt_password_usuario"] ;

$insertar="INSERT INTO usuarios (NOM_USU,EMAIL_USU, CLAVE_USU) VALUES('$nombre_usuario','$correo_usuario','$password_usuario');";

$conexion=mysqli_query($connect,$insertar);

if($conexion==false){
echo("no se pudo insertar");
}else{
    echo("insertado");
    header('Location:http://localhost/masterChefs/login.html');
}
 

?>