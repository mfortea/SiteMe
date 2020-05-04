// SITIOS

// Variables globales de la sección sitios;
var map = null;
var arrayMarcadores = [];


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
            // Gestión de los resultados
            for (var i = 0; i < resultados.sitios.length; ++i) {
                // Creación de los marcadores a partir de los datos
                var marcador = L.marker([resultados.sitios[i].latitud, resultados.sitios[i].longitud], { icon: iconoFavoritos })
                    .bindPopup(
                        '<center>' +
                        '<img width="30px" src="' + resultados.sitios[i].icono + '"/>' +
                        '<p class="tituloPopup">' + resultados.sitios[i].nombre + '</p>' +
                        '<p class="detallePopup">' + resultados.sitios[i].direccion + '</p>' +
                        '<p class="distanciaPopup"><i class="fas fa-directions"></i> A ' + medirDistancia(lat, lng, resultados.sitios[i].latitud, resultados.sitios[i].longitud) + ' kilómetros</p>' +
                        '<button title="Quitar de favoritos" class="botonFavorito" onclick="eliminarFavorito(\'' + resultados.sitios[i].id + '\',\'sitios\')"><i class="far fa-2x fa-star"></i></button>' +
                        '</center>'

                    )
                    .addTo(map);
                arrayMarcadores.push(marcador);
            }
            // Adapta el zoom del mapa a todos los marcadores
            var grupoMarcadores = L.featureGroup(arrayMarcadores).addTo(map);
            setTimeout(function() {
                map.fitBounds(grupoMarcadores.getBounds());
            }, 500);

        })

}


function recargarMapa() {
    while (arrayMarcadores.length > 0)
        arrayMarcadores.pop();
    map.off();
    map.remove();
    obtenerCoordenadas("sitios");

}