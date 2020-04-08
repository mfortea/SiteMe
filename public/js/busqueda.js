//var lat = 37.6867053;
//var lng = -5.1327931;

// Variables globales
var lat = 0;
var lng = 0;
var map = null;
var json_cache = "";
var estado_ubicacion = false;
var arrayMarcadores = [];

function obtenerCoordenadas() {
    if (navigator.geolocation) navigator.geolocation.getCurrentPosition(function(pos) {
        lat = pos.coords.latitude;
        lng = pos.coords.longitude;
        estado_ubicacion = true;
        document.getElementById("estado").innerHTML = "Ubicación activada";
        document.getElementById('boton-buscar').disabled = false;
        document.getElementById('input-busqueda').disabled = false;
        document.getElementById('cargando').style.display = "block";
        document.getElementById('map').style.display = "block";
        generarMapa();
    }, function(objPositionError) {
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


    inputTexto = document.getElementById("input-busqueda").value;
    //radio = document.getElementById("radio").value;
    var radio = "25000";

    var datos = { texto: inputTexto, radio: radio, lat: lat, lng: lng };

    // Obtención de los datos de la búsqueda
    fetch("/buscarLugares", {
            method: 'POST',
            body: JSON.stringify(datos),
            headers: {
                'Content-Type': 'application/json'
            }
        }).then(function(response) {
            return response.json();
        })
        .then(function(resultados) {
            // Gestión de los resultados
            json_cache = JSON.parse(resultados);

            for (var i = 0; i < json_cache.results.length; ++i) {
                // Creación de los marcadores a partir de los datos
                var marcador = L.marker([json_cache.results[i].geometry.location.lat, json_cache.results[i].geometry.location.lng], { icon: iconoUbBusqueda })
                    .bindPopup(
                        '<center>' +
                        '<img width="30px" src="' + json_cache.results[i].icon + '"/>' +
                        '<p class="tituloPopup">' + json_cache.results[i].name + '</h2>' +
                        '<p class="detallePopup">' + json_cache.results[i].vicinity + '</p>' +
                        '<button class="botonFavorito" onclick="nuevoFavorito(\'' + json_cache.results[i].id + '\', \'' + json_cache.results[i].name + '\')"><i class="fas fa-2x fa-star"></i></button>' +
                        '<button class="botonDetalles"><i class="fas fa-2x fa-info-circle"></i></button>' +
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

function generarMapa() {

    if (estado_ubicacion) {

        // Creación del mapa
        map = L.map('map').setView([lat, lng], 12);

        // Crear control de pantalla completa
        var fsControl = L.control.fullscreen();
        map.addControl(fsControl);


        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '',
            subdomains: ['a', 'b', 'c']
        }).addTo(map);

        var osmUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
        var osmAttribution = 'Datos del mapa <a href="http://openstreetmap' +
            '.org">&copy; OpenStreetMap</a>';
        var osm = new L.TileLayer(osmUrl, { maxZoom: 18, attribution: osmAttribution });

        var gUrl = 'http://mt0.google.com/vt/lyrs=s&x={x}&y={y}&z={z}';
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

function nuevoFavorito(id, nombre) {
    document.getElementById("cuerpoModal").innerHTML = nombre + " se ha añadido tus favoritos";
    document.getElementById("simboloModal").className = "fas fa-star fa-3x";
    vibrar(300);
    sonidoOK()
    MicroModal.show('modal');
}