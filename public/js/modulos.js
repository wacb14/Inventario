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
    if(value == true){
        document.getElementById("idresponsable").disabled=false;
        document.getElementById("fecha_inicio").disabled=false;
    }
    else{
        document.getElementById("idresponsable").disabled=true;
        document.getElementById("fecha_inicio").disabled=true;
    }
}

function ColorearFila(i){
    if(document.getElementById("chkbox-"+(i)).checked){
        document.getElementById("fila-"+(i)).style.backgroundColor="#18EF0D";
    }
    else{
        document.getElementById("fila-"+(i)).style.backgroundColor="#FFFFFF";
    }    
}

function marcarBien(){
    // Comprobamos si no esta vacio
    if(document.getElementById("valor_busqueda").value.trim()!=""){
        // Cambiamos el valor del check si el codigo coincide
        var tabla = document.getElementById("tabla_verif");
        for (var i = 0, row; row = tabla.rows[i]; i++) {
            var codigo = row.cells[2];
            if(codigo.innerText == document.getElementById("valor_busqueda").value.trim()){
                document.getElementById("chkbox-"+(i-1)).checked = true;
                document.getElementById("fila-"+(i-1)).style.backgroundColor="#18EF0D";      
            }
        }
        //Limpiamos la caja de texto
        document.getElementById("valor_busqueda").value="";
        document.getElementById("valor_busqueda").focus();
    }
}
/* Evento de la tecla enter para el cuadro de busqueda de la comprobacion de items */
var valor_busqueda = document.getElementById("valor_busqueda");
valor_busqueda.addEventListener("keydown", function (e) {
    if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
        marcarBien();
    }
});

