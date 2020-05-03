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
            document.getElementById("cuerpoModal").innerHTML = "Se han eliminado tus favoritos correctamente";
            document.getElementById("simboloModal").className = "fas fa-check-circle fa-3x";
            vibrar(300);
            sonidoOK();
            MicroModal.show('modal-estandar');

        } else if (response.status === 404) {
            sonidoError();
            vibrar(300);
            mostrarModal("modal-error");
        }
    })
}