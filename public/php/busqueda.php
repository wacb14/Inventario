<?php
// Rescatamos el parámetro que nos llega mediante la url que invoca xmlhttp
$codigo=$_POST["codigo"];
if ($codigo) {
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "inventario");
    $result = mysqli_query($link,
        "SELECT nombre
            FROM tbien
            WHERE cod_patrimonial = '".$codigo."'");
    $fila = mysqli_fetch_array($result);
    // echo $fila["nombre"];
    if($fila!=NULL)
        echo $fila["nombre"];
    mysqli_close($link);
}
else {
    echo '';
}
?>