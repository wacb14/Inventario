function buscar() {
    var str = document.getElementById('cod_patrimonial').value;
    var xmlhttp;
    var recibido = new Array();
    var id='';
    var nombre='';
    var nombre_bien = document.getElementById('nombre_bien');
    var idbien = document.getElementById('idbien');

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            recibido = xmlhttp.responseText.split(",");
            id = recibido[0];
            nombre = recibido[1];
            nombre_bien.value = nombre==null?'':nombre;
            idbien.value=id==null?'':id;
        }
    }
    var cadenaParametros = 'codigo='+encodeURIComponent(str);
    xmlhttp.open('POST', '../../php/busqueda.php'); // Método post y url invocada
    xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); // Establecer cabeceras de petición
    xmlhttp.send(cadenaParametros); // Envio de parámetros usando POST
}

function nuevoResponsable(value){
    if(value==true){
        document.getElementById("idresponsable").disabled=false;
        document.getElementById("fecha_inicio").disabled=false;
    }
    else{
        document.getElementById("idresponsable").disabled=true;
        document.getElementById("fecha_inicio").disabled=true;
    }
}