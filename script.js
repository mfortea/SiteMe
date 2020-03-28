//var lat = 37.6867053;
//var lng = -5.1327931;

// Variables globales
var lat = 0;
var lng = 0;

var json_cache = "";
var estado_ubicacion = false;

function obtenerCoordenadas() {
    if (navigator.geolocation) navigator.geolocation.getCurrentPosition(function(pos) {
        lat = pos.coords.latitude;
        lng = pos.coords.longitude;
        estado_ubicacion = true;
        document.getElementById("estado").innerHTML = "🟢 Ubicación activada";
        document.getElementById("estado").style.color = "rgb(0, 164, 0)";
    }, function(objPositionError) {
        // Cacheo de errores relacionados con la ubicación
        switch (objPositionError.code) {
            case objPositionError.PERMISSION_DENIED:
                alert("Debe permitir la ubicación para continuar");
                break;
            case objPositionError.POSITION_UNAVAILABLE:
                alert("No se ha podido acceder a la información de su posición.");
                break;
            case objPositionError.TIMEOUT:
                alert("El servicio ha tardado demasiado tiempo en responder.");
                break;
            default:
                alert("Error desconocido.");
        }
    }, {
        maximumAge: 75000,
        timeout: 15000
    });
}

function generarMapa() {

    if (estado_ubicacion) {

        document.getElementById('map').style.display = 'block';

        // Creación del mapa
        var map = L.map('map').setView([lat, lng], 12);

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
            'Mapa': osm,
            'Satélite': googlesat
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

        // Icono de los marcadores de la búsqueda
        var iconoUbBusqueda = L.icon({
            iconUrl: 'imagenes/marcador_azul.png',
            iconSize: [50, 50]
        });

        var arrayMarcadores = [];

        // Marcador de la ubicación actual
        var marcadorUbActual = L.marker([lat, lng], { icon: iconoUbActual }).bindPopup('<center><h2>Tu ubicación</h2></center>').addTo(map);
        arrayMarcadores.push(marcadorUbActual);

        inputTexto = document.getElementById("inputBusqueda").value;
        radio = document.getElementById("radio").value;

        // Obtención de los datos de la búsqueda
        fetch("servicioAPI.php?inputTexto=" + inputTexto + "&radio=" + radio + "&lat=" + lat + "&lng=" + lng)
            .then(function(response) {
                return response.json();
            })
            .then(function(resultados) {

                // Gestión de los resultados
                json_cache = resultados;

                for (var i = 0; i < json_cache.results.length; ++i) {
                    // Creación de los marcadores a partir de los datos
                    var marcador = L.marker([json_cache.results[i].geometry.location.lat, json_cache.results[i].geometry.location.lng], { icon: iconoUbBusqueda })
                        .bindPopup(
                            '<center>' +
                            '<img width="30px" src="' + json_cache.results[i].icon + '"/>' +
                            '<h2>' + json_cache.results[i].name + '</h2>' +
                            '<p>' + json_cache.results[i].formatted_address + '</p>' +
                            '<button class="botonMarcador" onclick="nuevoFavorito(\'' + json_cache.results[i].id + '\')">⭐️</button>' +
                            '<button class="botonMarcador">👁</button>' +
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
    } else {
        alert("No se ha podido determinar su ubicación");
    }
}

function nuevoFavorito(id) {
    alert("El id del sitio es " + id);
}

function mostrarSelectRadio() {
    document.getElementById('radio').style.display = 'inline';
}