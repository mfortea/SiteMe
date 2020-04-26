// BÚSQUEDA

// Variables globales de la sección búsqueda;
var map = null;
var json_cache = "";
var arrayMarcadores = [];


function buscar() {
    vibrar(50);

    if (map != undefined) {
        map.off();
        map.remove();
        console.log("Mapa eliminado");
        generarMapa("busqueda");
    }

    // Icono de los marcadores de la búsqueda
    var iconoUbBusqueda = L.icon({
        iconUrl: 'imagenes/marcador_azul.png',
        iconSize: [50, 50]
    });


    var busqueda = document.getElementById("input-busqueda").value;
    //radio = document.getElementById("radio").value;
    var radio = "25000";

    var datos = { busqueda: busqueda, radio: radio, lat: lat, lng: lng };
    var json = JSON.stringify(datos);

    // Obtención de los datos de la búsqueda
    fetch("/buscarLugares", {
        method: 'POST',
        body: json,
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function (response) {
        return response.json();
    })
        .then(function (resultados) {
            // Gestión de los resultados
            json_cache = resultados;

            for (var i = 0; i < json_cache.sitios.length; ++i) {
                // Creación de los marcadores a partir de los datos
                var marcador = L.marker([json_cache.sitios[i].latitud, json_cache.sitios[i].longitud], { icon: iconoUbBusqueda })
                    .bindPopup(
                        '<center>' +
                        '<img width="30px" src="' + json_cache.sitios[i].icono + '"/>' +
                        '<p class="tituloPopup">' + json_cache.sitios[i].nombre + '</p>' +
                        '<p class="detallePopup">' + json_cache.sitios[i].direccion + '</p>' +
                        '<p class="distanciaPopup"><i class="fas fa-directions"></i> A ' + medirDistancia(lat, lng, json_cache.sitios[i].latitud, json_cache.sitios[i].longitud) + ' kilómetros</p>' +
                        '<button class="botonFavorito" onclick="nuevoFavorito(\'' + i + '\')"><i class="fas fa-2x fa-star"></i></button>' +
                        // '<button class="botonRuta" onclick="calcularRuta(\'' + json_cache.sitios[i].latitud + '\', \'' + json_cache.sitios[i].longitud + '\')"><i class="fas fa-2x fa-directions"></i></button>' +
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


function nuevoFavorito(posicion) {
    var id = json_cache.sitios[posicion].id;
    var nombre = json_cache.sitios[posicion].nombre;
    var latitud = json_cache.sitios[posicion].latitud;
    var longitud = json_cache.sitios[posicion].longitud;
    var icono = json_cache.sitios[posicion].icono;
    var direccion = json_cache.sitios[posicion].direccion;
    var favorito = { id: id, nombre: nombre, latitud: latitud, longitud: longitud, icono: icono, direccion: direccion };
    var json = JSON.stringify(favorito);

    fetch("/nuevoFavorito", {
        method: 'POST',
        body: json,
        headers: {
            'Content-Type': 'application/json'
        }
    }).then(function (response) {
        if (response.status === 409) {
            document.getElementById("cuerpoModal").innerHTML = nombre + " ya está en tus favoritos";
            document.getElementById("simboloModal").className = "fas fa-exclamation-circle fa-3x";
            vibrar(300);
            sonidoError()
            MicroModal.show('modal');
        } else if (response.status === 200) {
            document.getElementById("cuerpoModal").innerHTML = nombre + " se ha añadido tus favoritos";
            document.getElementById("simboloModal").className = "fas fa-star fa-3x";
            vibrar(300);
            sonidoOK()
            MicroModal.show('modal');
        }
    })

}



