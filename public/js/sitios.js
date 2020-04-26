// SITIOS

// Variables globales de la sección sitios;
var map = null;
var arrayMarcadores = [];


function obtenerFavoritos() {

    // Icono de los marcadores
    var iconoUbBusqueda = L.icon({
        iconUrl: 'imagenes/marcador_azul.png',
        iconSize: [50, 50]
    });

    // Obtención de los sitios favoritos del usuario
    fetch("/obtenerFavoritos", {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function (response) {
        return response.json();
    })
        .then(function (resultados) {
            // Gestión de los resultados
            for (var i = 0; i < resultados.sitios.length; ++i) {
                // Creación de los marcadores a partir de los datos
                var marcador = L.marker([resultados.sitios[i].latitud, resultados.sitios[i].longitud], { icon: iconoUbBusqueda })
                    .bindPopup(
                        '<center>' +
                        '<img width="30px" src="' + resultados.sitios[i].icono + '"/>' +
                        '<p class="tituloPopup">' + resultados.sitios[i].nombre + '</p>' +
                        '<p class="detallePopup">' + resultados.sitios[i].direccion + '</p>' +
                        '<p class="distanciaPopup"><i class="fas fa-directions"></i> A ' + medirDistancia(lat, lng, resultados.sitios[i].latitud, resultados.sitios[i].longitud) + ' kilómetros</p>' +
                        '<button class="botonEliminar" onclick="eliminarFavorito(\'' + resultados.sitios[i].id + '\')"><i class="fas fa-2x fa-trash-alt"></i></button>' +
                        '</center>'

                    )
                    .addTo(map);
                arrayMarcadores.push(marcador);
            }

            // Adapta el zoom del mapa a todos los marcadores
            var grupoMarcadores = L.featureGroup(arrayMarcadores).addTo(map);
            setTimeout(function () {
                map.fitBounds(grupoMarcadores.getBounds());
            }, 500);

        })

}


function eliminarFavorito(id) {

    fetch('/eliminarFavorito/' + id, {
        method: 'DELETE'
    }).then(function (response) {
        if (response.status === 204) {
            document.getElementById("cuerpoModal").innerHTML = "Se ha eliminado correctamente";
            document.getElementById("simboloModal").className = "fas fa-trash-alt fa-3x";
            vibrar(300);
            sonidoOK()
            MicroModal.show('modal');
            recargarMapa();
        } else if (response.status === 404) {
            document.getElementById("cuerpoModal").innerHTML = "No se ha podido eliminar el sitio";
            document.getElementById("simboloModal").className = "fas fa-times fa-3x";
            sonidoError();
            vibrar(300);
            MicroModal.show('modal');
        }
    })
}

function recargarMapa(){
    while(arrayMarcadores.length > 0)
    arrayMarcadores.pop(); 
    map.off();
    map.remove();
    obtenerCoordenadas("sitios");

}