//var lat = 37.6867053;
//var lng = -5.1327931;

// Variables globales
var lat = 0;
var lng = 0;
var map = null;
var rutas = null;
var json_cache = "";
var estado_ubicacion = false;
var arrayMarcadores = [];

function obtenerCoordenadas() {
    if (navigator.geolocation) navigator.geolocation.getCurrentPosition(function (pos) {
        lat = pos.coords.latitude;
        lng = pos.coords.longitude;
        estado_ubicacion = true;
        document.getElementById("estado").innerHTML = "Ubicación activada";
        document.getElementById('boton-buscar').disabled = false;
        document.getElementById('input-busqueda').disabled = false;
        document.getElementById('cargando').style.display = "block";
        document.getElementById('map').style.display = "block";
        generarMapa();
    }, function (objPositionError) {
        // Cacheo de errores relacionados con la ubicación
        switch (objPositionError.code) {
            case objPositionError.PERMISSION_DENIED:
                document.getElementById("cuerpoModal").innerHTML = "Debe permitir la ubicación para continuar";
                document.getElementById("simboloModal").className = "fas fa-location-arrow fa-3x";
                sonidoError();
                MicroModal.show('modal');
                break;
            case objPositionError.POSITION_UNAVAILABLE:
                document.getElementById("cuerpoModal").innerHTML = "No se ha podido acceder a la información de su posición.";
                document.getElementById("simboloModal").className = "fas fa-location-arrow fa-3x";
                sonidoError();
                vibrar(300);
                MicroModal.show('modal');
                break;
            case objPositionError.TIMEOUT:
                document.getElementById("cuerpoModal").innerHTML = "El servicio ha tardado demasiado tiempo en responder.";
                document.getElementById("simboloModal").className = "fas fa-clock fa-3x";
                sonidoError();
                vibrar(300);
                MicroModal.show('modal');
                break;
            default:
                document.getElementById("cuerpoModal").innerHTML = "Error desconocido";
                document.getElementById("simboloModal").className = "fas fa-question-circle fa-3x";
                sonidoError();
                vibrar(300);
                MicroModal.show('modal');
        }
    }, {
        maximumAge: 75000,
        timeout: 15000
    });
}

function buscar() {
    vibrar(50);

    if (map != undefined) {
        map.off();
        map.remove();
        console.log("Mapa eliminado");
        generarMapa();
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

function generarMapa() {

    if (estado_ubicacion) {

        // Creación del mapa
        map = L.map('map').setView([lat, lng], 12);

        // Crear control de pantalla completa
        var fsControl = L.control.fullscreen();
        map.addControl(fsControl);


        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '',
            subdomains: ['a', 'b', 'c']
        }).addTo(map);

        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttribution = 'Datos del mapa <a href="http://openstreetmap' +
            '.org">&copy; OpenStreetMap</a>';
        var osm = new L.TileLayer(osmUrl, { maxZoom: 18, attribution: osmAttribution });

        var gUrl = 'https://mt0.google.com/vt/lyrs=s&x={x}&y={y}&z={z}';
        var gAttribution = '&copy; Google Maps';
        var googlesat = new L.TileLayer(gUrl, { maxZoom: 18, attribution: gAttribution });

        var baseLayers = {
            '<i class="fas fa-map-marked-alt"></i> Callejero': osm,
            '<i class="fas fa-globe-europe"></i> Satélite': googlesat
        }

        L.control.layers(baseLayers, {}).addTo(map);

        // Círculo de la ubicación actual
        var circle = L.circle([lat, lng], {
            color: 'red',
            fillColor: '#f03',
            fillOpacity: 0.2,
            radius: 700
        }).addTo(map);

        // Icono de la ubicación actual
        var iconoUbActual = L.icon({
            iconUrl: 'imagenes/marcador_rojo.png',
            iconSize: [50, 50]
        });

        // Marcador de la ubicación actual
        var marcadorUbActual = L.marker([lat, lng], { icon: iconoUbActual }).bindPopup('<p class="tituloPopup">Tu ubicación</h2>').addTo(map);
        arrayMarcadores.push(marcadorUbActual);

    } else {
        document.getElementById("cuerpoModal").innerHTML = "No se ha podido determinar su ubicación";
        document.getElementById("simboloModal").className = "fas fa-location-arrow fa-3x";
        MicroModal.show('modal');
    }
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

function medirDistancia(lat1, lon1, lat2, lon2) {
    rad = function (x) { return x * Math.PI / 180; }
    var R = 6378.137; //Radio de la tierra en km
    var dLat = rad(lat2 - lat1);
    var dLong = rad(lon2 - lon1);
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) + Math.cos(rad(lat1)) * Math.cos(rad(lat2)) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c;
    return d.toFixed(2);
}


/*
function calcularRuta(latDestino, lngDestino) {

    if (rutas != null) {
        rutas.remove();
        console.log("Ruta anterior eliminada");
    }

    map.closePopup();

    rutas = L.Routing.control({
        waypoints: [
            L.latLng(lat, lng),
            L.latLng(latDestino, lngDestino)
        ],
        language: 'es',
        routeWhileDragging: true,
        fitSelectedRoutes: 'smart',
        router: new L.Routing.OSRMv1({
            serviceUrl: url_to_your_service
        })
    })

    rutas.addTo(map);
}

*/