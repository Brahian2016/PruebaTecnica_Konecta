<?php

include ("../model/conexion.php");
$con = conectar();


    $id = $_POST['IDProducto'];
    $Cantidad = $_POST['CantidadVendida'];
    echo $_POST['IDProducto'];
    if (empty($_POST['CantidadVendida'])) {
       header ("Location: ../view/venta.php?validar=false"); 
    }else if($_POST['IDProducto'] == "-1"){
        header ("Location: ../view/venta.php?validar=false"); 
    } else {
        $sql = "SELECT Stock FROM productos WHERE ID = '$id'";
        $query = mysqli_query($con,$sql);
        $rs = mysqli_fetch_array($query);
        $cantidadStockDB = intval($rs['Stock']);
        $cantidadSolicitud = intval($Cantidad);
        
        if ($cantidadSolicitud <= $cantidadStockDB) {
            $restaStock = $cantidadStockDB - $cantidadSolicitud;
            //echo "Cantidad BD: ".$rs['Stock']." Cantidad formulario: ".$Cantidad;
            $sql1 = "INSERT INTO ventas (IDProducto, CantidadVendida) VALUES ('$id','$Cantidad')";
            $sql2 = "UPDATE productos SET Stock = '$restaStock' WHERE ID = '$id'";

            $query = mysqli_query($con,$sql1);
            $query = mysqli_query($con,$sql2);
            header("Location: ../view/venta.php?venta=true");
        } else {
            header("Location: ../view/venta.php?venta=false");
        }

    }

    
    
    

?>