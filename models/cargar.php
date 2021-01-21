<?php
include "conexion.php";
$query="SELECT * FROM recetas";
if(isset($_POST['ID_REC'])!= ""){
    $q=$conn->real_escape_string($_POST['ID_REC']);
    $query="SELECT * FROM recetas WHERE ID_REC LIKE '%".$q."%'";
}
$buscarRecetas=$conn->query($query);
$result=array();
if($buscarRecetas->num_rows > 0){
    while ($filaReceta=$buscarRecetas->fetch_assoc()) {
        array_push($result,$filaReceta);
    }
}else{
    $result="No se encontraron recetas";
}

echo json_encode($result);
?>