// function mostrarSugerencia() {
//     var str = document.getElementById('cod_patrimonial').nodeValue;
//     var xmlhttp;
//     var recibido = '';
//     var element_resultado = document.getElementById('nombre_bien');

//     xmlhttp = new XMLHttpRequest();
//     xmlhttp.onreadystatechange = function() {
//         if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//             recibido = xmlhttp.responseText;
//             element_resultado.innerHTML = recibido;
//         }
//     }
//     var cadenaParametros = 'codigo='+encodeURIComponent(str);
//     xmlhttp.open('POST', '../php/busqueda.php'); // Método post y url invocada
//     xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); // Establecer cabeceras de petición
//     xmlhttp.send(cadenaParametros); // Envio de parámetros usando POST
// }
function escribir(){
    var str = document.getElementById('cod_patrimonial').innerHTML;
    document.getElementById('cod_patrimonial').innerHTML='';
    // var xmlhttp;
    // var recibido = '';
    var element_resultado = document.getElementById('nombre_bien');
    element_resultado.innerHTML=str;

}