<?php   

include("../model/conexion.php");
$con = conectar();


if (empty($_POST['NombreProducto']) || empty($_POST['Referencia']) || empty($_POST['Precio']) || empty($_POST['Peso']) || empty($_POST['Categoria']) || empty($_POST['Stock'])) {
    header('Location: ../view/principal.php?validar=false');
    exit();
}else{
    $id = $_POST['ID'];
    $nombreProducto = $_POST['NombreProducto'];
    $referencia = $_POST['Referencia'];
    $precio = $_POST['Precio'];
    $peso = $_POST['Peso'];
    $categoria = $_POST['Categoria'];
    $stock = $_POST['Stock'];
    $fechaCreacion = date('Y-m-d H:i:s');

    $sql = "UPDATE productos SET NombreProducto = '$nombreProducto' , Referencia = '$referencia', Precio = '$precio', Peso = '$peso', Categoria = '$categoria', Stock = '$stock' WHERE ID = '$id'";
    $query = mysqli_query($con,$sql);

if($query){
    header('Location: ../view/principal.php?validar=true');
    exit();
    }else{
        header('Location: ../view/404/404.php');
    }
}



?>