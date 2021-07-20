<?php
// Rescatamos el parámetro que nos llega mediante la url que invoca xmlhttp
$codigo=$_POST["codigo"];
$resultadoConsulta = '';
if ($codigo) {
    $link = mysqli_connect("localhost", "root", "");
    mysqli_select_db($link, "inventario");
    $tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes correctamente
    $result = mysqli_query($link,
        "SELECT nombre
            FROM tbien
            WHERE cod_patrimonial = '".$codigo."'");
    //Devolvemmos la cadena de respuesta
    $fila = mysqli_fetch_array($result)
    $result = $fila['nombre'];
    echo $result;
    mysqli_free_result($result);
    mysqli_close($link);
}
else {
    echo 'No se han recibido datos';
}
?>