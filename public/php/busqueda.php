<?php
// Rescatamos el parámetro que nos llega mediante la url que invoca xmlhttp
$codigo=$_POST["codigo"];
if ($codigo) {
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "inventario");
    $result = mysqli_query($link,
        "SELECT idbien, nombre
            FROM tbien
            WHERE cod_patrimonial = '".$codigo."'  AND estado = 'FUNCIONAL'");
    $fila = mysqli_fetch_array($result);
    if($fila!=NULL)
        echo $fila["idbien"].",".$fila["nombre"];
    mysqli_close($link);
}
else {
    echo '';
}
?>