<?php

$username="localhost";
$user="root";
$password="";
$nameDataBase="masterchef";

$connect=mysqli_connect($username,$user,$password,$nameDataBase);

if(mysqli_connect_error()){
echo("No se pudo conectar");
}

?>