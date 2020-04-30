// AJUSTES

function mostrarModal(nombreModal) {
    sonidoError();
    vibrar(300);
    MicroModal.show(nombreModal);
}

function cerrarModal(nombreModal) {
    setTimeout(function() {
        MicroModal.close(nombreModal);
    }, 500);

}

function eliminarFavoritos() {
    fetch('/eliminarFavoritos', {
        method: 'DELETE'
    }).then(function(response) {
        if (response.status === 204) {
            vibrar(300);
            sonidoOK();
            mostrarModal("modal-fav-eliminados");
        } else if (response.status === 404) {
            sonidoError();
            vibrar(300);
            mostrarModal("modal-error");
        }
    })
}