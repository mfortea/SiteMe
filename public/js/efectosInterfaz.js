function vibrar(milisegundos) {
    navigator.vibrate =
        navigator.vibrate ||
        navigator.webkitVibrate ||
        navigator.mozVibrate ||
        navigator.msVibrate;
    if (navigator.vibrate) {
        navigator.vibrate(milisegundos);
    }
}

function sonidoOK() {
    var sonidoOK = new Audio("sonidos/sonidook.mp3");
    sonidoOK.play();
}

function sonidoError() {
    var sonidoOK = new Audio("sonidos/sonidoerror.mp3");
    sonidoOK.play();
}

function sonidoEliminado() {
    var sonidoOK = new Audio("sonidos/sonidoeliminado.mp3");
    sonidoOK.play();
}