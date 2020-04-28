// AJUSTES

function mostrarModal(nombreModal){
    sonidoError();
    vibrar(300);
    MicroModal.show(nombreModal);
}

function cerrarModal(nombreModal){
    setTimeout(function () {
        MicroModal.close(nombreModal);
    }, 500);
    
}
