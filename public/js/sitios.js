// SITIOS

// Variables globales de la sección sitios;
var map = null;
var arrayMarcadores = [];
var json_cache = "";


function obtenerFavoritos() {

    // Icono de los marcadores favoritos
    var iconoFavoritos = L.icon({
        iconUrl: 'imagenes/marcador_amarillo.png',
        iconSize: [50, 50]
    });

    // Obtención de los sitios favoritos del usuario
    fetch("/obtenerFavoritos", {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function(response) {
            return response.json();
        })
        .then(function(resultados) {
            json_cache = resultados;
            // Gestión de los resultados
            for (var i = 0; i < json_cache.sitios.length; ++i) {
                // Creación de los marcadores a partir de los datos
                var marcador = L.marker([json_cache.sitios[i].latitud, json_cache.sitios[i].longitud], { icon: iconoFavoritos })
                    .bindPopup(
                        '<center>' +
                        '<img width="30px" src="' + json_cache.sitios[i].icono + '"/>' +
                        '<p class="tituloPopup">' + json_cache.sitios[i].nombre + '</p>' +
                        '<p class="detallePopup">' + json_cache.sitios[i].direccion + '</p>' +
                        '<p class="distanciaPopup"><i class="fas fa-directions"></i> A ' + medirDistancia(lat, lng, json_cache.sitios[i].latitud, json_cache.sitios[i].longitud) + ' kilómetros</p>' +
                        '<button title="Quitar de favoritos" class="botonFavorito" onclick="eliminarFavorito(\'' + i + '\')"><i class="fas fa-2x fa-star"></i></button>' +
                        '</center>'

                    )

                arrayMarcadores.push(marcador);
            }
            // Adapta el zoom del mapa a todos los marcadores
            var grupoMarcadores = L.featureGroup(arrayMarcadores).addTo(map);
            setTimeout(function() {
                map.fitBounds(grupoMarcadores.getBounds());
            }, 500);

        })

}


function eliminarFavorito(posicion) {
    var id = json_cache.sitios[posicion].id;
    var posicionMarcador = parseInt(posicion) + 1;

    fetch('/eliminarFavorito/' + id, {
        method: 'DELETE'
    }).then(function(response) {
        if (response.status === 204) {
            vibrar(300);
            sonidoEliminado();
            arrayMarcadores[posicionMarcador].remove();

        } else if (response.status === 404) {
            document.getElementById("cuerpoModal").innerHTML = "No se ha podido eliminar el sitio";
            document.getElementById("simboloModal").className = "fas fa-times fa-3x";
            sonidoError();
            vibrar(300);
            MicroModal.show('modal');
        }
    })
}