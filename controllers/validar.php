<?php

$nombre_usuario=$_POST['txt_nombre_usuario'] ;
$password_usuario=$_POST['txt_password_usuario'] ;
$_SESSION['usuario']=$nombre_usuario;


$conexion=mysqli_connect("localhost","root","","masterchef");

$consulta="SELECT * FROM usuarios WHERE NOM_USU='$nombre_usuario' AND CLAVE_USU='$password_usuario'";

$resultado=mysqli_query($conexion,$consulta);


$filas=mysqli_fetch_array($resultado);

if(is_null($filas)){

    echo "<script>
               alert('Usuario o contraseña incorrecto');
               window.location= '../login.html'
   </script>";

?>
<?php

}else{
    session_start();
    $_SESSION['nombre'] = $filas['NOM_USU']; 

    header("location:../index.php");


}

mysqli_free_result($resultado);

mysqli_close($conexion);






