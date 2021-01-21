<?php

$username="localhost";
    $user="root";
    $password="";
    $nameDataBase="masterchef";
    
    $connect=mysqli_connect($username,$user,$password,$nameDataBase);
    
    if(mysqli_connect_error()){
    echo("No se pudo conectar");
    }else{
        if(login()){
            header('Location:http://localhost/masterChefs/index.html');
        }else{
            echo("No se pudo encontrar");
        }
    }



function login(){
    
    $nombre_usuario=$_POST['txt_nombre_usuario'] ;
    $password_usuario=$_POST['txt_password_usuario'] ;
    
    $buscar="SELECT * FROM usuarios where NOM_USU='$nombre_usuario' AND PASS_USU='$password_usuario'";
    
    $conexion=mysqli_query($connect,$buscar);
    
    $cursor=mysqli_fetch_row($conexion);
    
    if($cursor=mysqli_fetch_row($conexion)){
    return false;
    }else{
    return true;
    }
}

?>
