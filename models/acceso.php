<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Length: 0');
header('Content-Type: application/json');
include 'conexion.php';
$op=$_POST['op'];
if($op===null)
{
    echo "Error";
}
else{
switch($op)
{
        case 'insertarReceta':
            header('Content-Type: application/json');
            $id=$_POST['ID_REC'];
            $titulo=$_POST['TIT_REC'];
            $ingredientes=$_POST['INGRE_REC'];
            $descripcion=$_POST['DESC_REC'];
            $sqlInsert="INSERT INTO recetas(ID_REC,TIT_REC,INGRE_REC,DESC_REC) VALUES ('$id','$titulo','$ingredientes','$descripcion','$telefono','$sexo')";
            if($mysqli->query($sqlInsert)===TRUE)
            {
            echo json_encode("Se guardo correctamente");
            echo $sqlInsert;
            }
            else
            {
            echo "Error:".$sqlInsert."<br>".$mysqli->error;
            echo  $sqlInsert;
            }
            $mysqli->close();
        break;
        
        
           
        case 'updateReceta':
            header('Content-Type: application/json');
            $id=$_POST['ID_REC'];
            $titulo=$_POST['TIT_REC'];
            $ingredientes=$_POST['INGRE_REC'];
            $descripcion=$_POST['DESC_REC'];
            $sqlUpdate="UPDATE recetas SET TIT_REC = '$titulo',
            INGRE_REC = '$ingredientes',
            DESC_REC = '$descripcion' WHERE ID_REC = $id";
            if($mysqli->query($sqlUpdate)===TRUE)
            {
            echo json_encode("Se actualizo correctamente");
            echo $sqlUpdate;
            }
            else
            {
            echo "Error:".$sqlUpdate."<br>".$mysqli->error;
            }
            $mysqli->close();
        break;

        case 'deleteReceta':
            header('Content-Type: application/json');
            $id=$_POST['ID_REC'];
            if(isset($id)){
            $sqlDelete="DELETE FROM recetas WHERE ID_REC = $id";
             $resultado= $mysqli->query($sqlDelete);
             echo json_encode(array("Receta borrada" => $resultado));
             $mysqli->close();
            }
            
        break;
}
}
?>