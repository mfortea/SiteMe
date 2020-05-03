// CAMBIAR CLAVE

var clave1 = document.getElementById("cambiar_clave_clave_first").value;
var clave2 = document.getElementById("cambiar_clave_clave_second").value;

function comprobarClaves() {
    if (!clave1 === clave2) {
        document.getElementById('cambiar_clave_save').disabled = true;
        document.getElementsById("error").innerHTML = "Las claves no coinciden";
    } else {
        document.getElementById('cambiar_clave_save').disabled = false;
    }

}