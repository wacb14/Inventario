function buscar() {
    var str = document.getElementById('cod_patrimonial').value;
    var xmlhttp;
    var recibido = '';
    var element_resultado = document.getElementById('nombre_bien');

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            recibido = xmlhttp.responseText;
            element_resultado.value = recibido;
        }
    }
    var cadenaParametros = 'codigo='+encodeURIComponent(str);
    xmlhttp.open('POST', '../php/busqueda.php'); // Método post y url invocada
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); // Establecer cabeceras de petición
    xmlhttp.send(cadenaParametros); // Envio de parámetros usando POST
}