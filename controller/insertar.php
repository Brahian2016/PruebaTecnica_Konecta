<?php   

include("../model/conexion.php");
$con = conectar();

if (empty($_POST['NombreProducto']) || empty($_POST['Referencia']) || empty($_POST['Precio']) || empty($_POST['Peso']) || empty($_POST['Categoria']) || empty($_POST['Stock'])) {
    header('Location: ../view/principal.php?validar=false');
    exit();
}else{
    $nombreProducto = $_POST['NombreProducto'];
    $referencia = $_POST['Referencia'];
    $precio = $_POST['Precio'];
    $peso = $_POST['Peso'];
    $categoria = $_POST['Categoria'];
    $stock = $_POST['Stock'];
    $fechaCreacion = date('Y-m-d H:i:s');

    $sql = "INSERT INTO productos (NombreProducto, Referencia, Precio, Peso, Categoria, Stock, FechaCreacion) VALUES ('$nombreProducto','$referencia','$precio','$peso','$categoria','$stock','$fechaCreacion')";
    $query = mysqli_query($con,$sql);

    if($query){
        //Header('Location : principal.php');
        header('Location: ../view/principal.php?validar=true');
        exit();
        }else{
            header('Location: ../view/404/404.php');
        }
}







?>
