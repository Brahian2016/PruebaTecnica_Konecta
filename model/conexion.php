<?php  

function conectar(){
    $host = "localhost";
    $user = "root";
    $pass = "";

    $dbName = "CafeteriaKONECTA";

    $con = mysqli_connect($host,$user,$pass);
    mysqli_select_db($con,$dbName);

    return($con);

}
?>