<?php   

include("../model/conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM productos WHERE ID = '$id'";

$query = mysqli_query($con,$sql);

if($query){
//Header('Location : principal.php');
header('Location: ../view/principal.php');
}else{
    header('Location: ../view/404/404.php');
}


?>
